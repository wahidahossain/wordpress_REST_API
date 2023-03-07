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
$url = 'https://sandbox-smart4i.dicom.com/v1/rate/shipment/'.$id;

$username = "wahida@jrponline.com";
$password = "Dicom.123";

//Initiate cURL.
$ch = curl_init($url);
 
//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  

//Tell cURL to return the output as a string instead
//of dumping it to the browser.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
            $sql1="UPDATE `trackingnumber` SET `rate` = '$rate' WHERE `trackingnumber`.`id` = '$id'; ";
            $result1=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

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
            $result2=mysqli_query($con, $sql2) or die( 'Couldnot execute query'. mysql_error());

            if($result2){
              print("<script>window.alert('Shippment Information Added!');</script>");
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
  $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

  print("<script>window.alert('Shipment Add Unsuccessful, Please Try again!!');</script>");
  print("<script>window.location='add_new_parcel.php?jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>");
  //echo $code = http_response_code();
}
// 20221124120202
// http://localhost/api_test/api_test/gls_api/get_rate.php?id=1566822


/*
{
    "rates": [
      {
        "accountType": "NEG",
        "rateType": "GRD",
        "cubicWeight": 5.0,
        "basicCharge": 5.77,
        "weightCharge": 0.19,
        "surcharges": [
          {
            "type": "DGG",
            "amount": 42.95
          }
        ],
        "otherCharge": 42.95,
        "subTotal": 48.91,
        "taxesDetails": [
          {
            "type": "TPS",
            "amount": 3.3
          },
          {
            "type": "TVQ",
            "amount": 6.58
          }
        ],
        "taxes": 9.88,
        "fuelCharge": 17.07,
        "zoneCharge": 0.0,
        "total": 75.86
      },
      {
        "accountType": "GEN",
        "rateType": "GRD",
        "cubicWeight": 5.0,
        "basicCharge": 14.5,
        "weightCharge": 4.57,
        "surcharges": [
          {
            "type": "DGG",
            "amount": 42.95
          }
        ],
        "otherCharge": 42.95,
        "subTotal": 62.02,
        "taxesDetails": [
          {
            "type": "TPS",
            "amount": 4.11
          },
          {
            "type": "TVQ",
            "amount": 8.2
          }
        ],
        "taxes": 12.31,
        "fuelCharge": 20.16,
        "zoneCharge": 0.0,
        "total": 94.49
      },
      {
        "accountType": "VOL",
        "rateType": "GRD",
        "cubicWeight": 5.0,
        "basicCharge": 6.52,
        "weightCharge": 2.05,
        "surcharges": [
          {
            "type": "DGG",
            "amount": 42.95
          }
        ],
        "otherCharge": 42.95,
        "subTotal": 51.52,
        "taxesDetails": [
          {
            "type": "TPS",
            "amount": 3.41
          },
          {
            "type": "TVQ",
            "amount": 6.81
          }
        ],
        "taxes": 10.22,
        "fuelCharge": 16.74,
        "zoneCharge": 0.0,
        "total": 78.48
      }
    ],
    "delay": 0
  }

*/
?>

<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>