<?php
include ("../model/connect.php");
$id = $_REQUEST['id'];
$new_shipment_id = $_REQUEST['new_shipment_id'];
$consignee_id = $_REQUEST['consignee_id'];
//delete shipment from BV ===============================================================================
$url = 'https://sandbox-smart4i.dicom.com/v1/shipment/'.$id;  // NEED TO Change -------------------------
//$url = 'https://smart4i.dicom.com/v1/shipment/list';

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
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
//Execute the cURL request.
echo $response = curl_exec($ch); 
//Check for errors.
if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}
//$json_resp = json_decode($response, false);
//end of delete shipment from BV ========================================================================


//delete shipment from mysql =======================================
$sql1_del_shipment ="DELETE FROM `new_shipment` WHERE `new_shipment`.`new_shipment_id` = '$new_shipment_id'; ";
$result2_del_shipment = mysqli_query($con, $sql1_del_shipment) or die( 'Couldnot execute query'. mysql_error());


$sql1_del_tracking ="DELETE FROM `trackingnumber` WHERE `trackingnumber`.`id` = '$id'; ";
$result2_del_tracking = mysqli_query($con, $sql1_del_tracking) or die( 'Couldnot execute query'. mysql_error());

$sql1_del_consignee ="DELETE FROM `consignee` WHERE `consignee`.`consignee_id` = '$consignee_id'; ";
$result2_del_consignee = mysqli_query($con, $sql1_del_consignee) or die( 'Couldnot execute query'. mysql_error());
//end of delete shipment from mysql =======================================

if($result2_del_shipment && $result2_del_tracking && $result2_del_consignee){
    //print("<script>window.alert('Account activation successful, reset account password please!!!');</script>");
    print("<script>window.location='../superadmin/shipping_list.php'</script>");
}

?>
