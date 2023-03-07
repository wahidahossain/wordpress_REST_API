<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

 if($login=="superadmin"){
 $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>

<?php
$id = $_REQUEST['id'];
$type = $_REQUEST['type'];
$jrp_acc_no = $_REQUEST['jrp_acc_no'];
$OrderNumber = $_REQUEST['OrderNumber'];
$trackingNumber = $_REQUEST['trackingNumber'];
$new_shipment_id = $_REQUEST['new_shipment_id'];
//The URL of the resource that is protected by Basic HTTP Authentication.
$url = 'https://sandbox-smart4i.dicom.com/v1/rate/shipment/'.$id;    // NEED TO Change -------------------------
//$url = 'https://smart4i.dicom.com/v1/rate/shipment/'.$id;

$username = "wahida@jrponline.com";
$password = "Dicom.123";

//Initiate cURL.
$ch = curl_init($url);
 
//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  

//Tell cURL to return the output as a string instead
//of dumping it to the browser.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//SSL verify disabled
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//Execute the cURL request.
$response = curl_exec($ch);
 
//Check for errors.
if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}

//Print out the response.
//echo $response;

//var_dump(http_response_code());
//echo $code = http_response_code();

$json_resp = json_decode($response, false);
//var_dump ($json_resp);
if(!empty($_REQUEST['id'])){
    include('../model/connect.php');
    

      // for parcel ===============================
      if($type == 'parcel'){
        foreach ($json_resp->rates as $type) {
        if ($type->accountType == "NEG") {
            //$rate = $type->surcharges['0']->total;
            $rate = $type->total;
            $sql1="UPDATE `trackingnumber` SET `rate` = '$rate' WHERE `trackingnumber`.`id` = '$id' && `trackingnumber`.`trackingNumber` = '$trackingNumber'; ";
            $result1=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

            if($result1){
              print("<script>window.alert('Shippment Information Added!');</script>");
              //print("<script>window.location='shipping_list.php'</script>");
              print("<script>window.location='update_bv_tracking_rate.php?rate=".$rate."&trackingNumber=".$trackingNumber."&OrderNumber=".$OrderNumber."'</script>");
            }
        }
      }
      }
      // for freight =============================
      //else{
        if($type == 'freight'){
       // if ($type->accountType == "NEG") {
            //$rate = $type->surcharges['0']->total;
            foreach ($json_resp->rates as $type) {
            $rate = $type->total;
            $sql2="UPDATE `trackingnumber` SET `rate` = '$rate' WHERE `trackingnumber`.`id` = '$id'; ";
            $result2=mysqli_query($con, $sql2) or die( 'Couldnot execute query'. mysqli_error($con));

            if($result2){
              //print("<script>window.alert('Shippment Information Added!');</script>");
              //print("<script>window.location='shipping_list.php'</script>");
              print("<script>window.location='update_bv_tracking_rate.php?rate=".$rate."&trackingNumber=".$trackingNumber."&OrderNumber=".$OrderNumber."'</script>");
            }
       // }
          }
      }   
}
else {
  include('../model/connect.php');
  $sql1="DELETE FROM `new_shipment` WHERE `new_shipment`.`new_shipment_id` = '$new_shipment_id'; ";
  $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

  print("<script>window.alert('Shipment Add Unsuccessful, Please Try again!!');</script>");
  print("<script>window.location='add_new_parcel.php?jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>");
  //echo $code = http_response_code();
}
?>

<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>