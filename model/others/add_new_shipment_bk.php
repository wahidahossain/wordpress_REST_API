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
include ("connect.php");

//error_reporting(0);

$billing_account_id = $_REQUEST['billing_account_id'];
$sender_id = $_REQUEST['sender_id'];
$consignee_id = $_REQUEST['consignee_id'];
$division = $_REQUEST['division'];
$category = $_REQUEST['category'];
if($category=='Freight')
{
  $parcelType = $_POST['parcelTypeFreight'];
  $surcharges_type = $_POST['surcharges_type_freight'];
}
if($category=='Parcel')
{
  $parcelType = $_POST['parcelTypeParcelCanada'];
  $surcharges_type = $_POST['surcharges_type_parcel'];
}

$paymentType = $_REQUEST['paymentType'];
$note = $_REQUEST['note'];
$unitOfMeasurement = $_REQUEST['unitOfMeasurement'];


// if(isSet($_POST['parcelTypeFreight']))
// {
//   $parcelType = $_POST['parcelTypeFreight'];
// }
// else{
//   $parcelType = $_POST['parcelTypeParcelCanada'];
//   }

//if (!isset($parcelType)) {
  // echo  $parcelType1 = $_REQUEST['parcelTypeParcelCanada'];
  // }
  // else{
  // echo  $parcelType1 = $_REQUEST['parcelTypeFreight'];
  // }
  // $parcelType = $parcelType1;


// if (isset($_POST["email"] != "")){
//     $parcelType = $_REQUEST['parcelTypeFreight'];
// }
// else{
//     $parcelType = $_REQUEST['parcelTypeParcelCanada'];
// }

$quantity = $_REQUEST['quantity'];
$weight = $_REQUEST['weight'];
$length = $_REQUEST['length'];
$depth = $_REQUEST['depth'];
$width = $_REQUEST['width'];
$hazmat = $_REQUEST['hazmat'];
$h_phone = $_REQUEST['h_phone'];
$h_erapReference = $_REQUEST['h_erapReference'];
$h_number = $_REQUEST['h_number'];
$h_shippingName = $_REQUEST['h_shippingName'];
$h_primaryClass = $_REQUEST['h_primaryClass'];
$h_subsidiaryClass = $_REQUEST['h_subsidiaryClass'];
$h_toxicByInhalation = $_REQUEST['h_toxicByInhalation'];
$h_packingGroup = $_REQUEST['h_packingGroup'];
$h_description = $_REQUEST['h_description'];
$h_hazmatType = $_REQUEST['h_hazmatType'];
$requestReturnLabel = $_REQUEST['requestReturnLabel'];
$returnWaybill = $_REQUEST['returnWaybill'];
//$surcharges_type = $_REQUEST['surcharges_type'];
$surcharges_value = $_REQUEST['surcharges_value'];
$promoCodes_status = $_REQUEST['promoCodes_status'];
$promoCodes = $_REQUEST['promoCodes'];
$deliveryType = $_REQUEST['deliveryType'];
$references_type = $_REQUEST['references_type'];
$references_code = $_REQUEST['references_code'];
$return_id = $_REQUEST['return_id'];

if($surcharges_type == 'DGG' && $hazmat == 'no' && $category=='Freight')
{
  print("<script>window.alert('If you selected the “DGG : dangerous goods” surcharge, you must include at least one parcel with at least one Hazmat');</script>");
  print("<script>window.location='../superadmin/add_new_freight.php'</script>");

}
else{

$sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
`parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
`h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
`createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`) VALUES (NULL, '$billing_account_id', '$sender_id', '$consignee_id', 
'$division', '$category', '$paymentType', '$note', '$unitOfMeasurement', '$parcelType', $quantity, $weight, $length, $depth, $width, '$hazmat', '$h_phone', 
'$h_erapReference', '$h_number', '$h_shippingName', '$h_primaryClass', '$h_subsidiaryClass', '$h_toxicByInhalation', '$h_packingGroup', '$h_description', '$h_hazmatType', '$requestReturnLabel', 
'$returnWaybill', '$surcharges_type', '$surcharges_value', '$promoCodes_status', '$promoCodes', NOW(), '$deliveryType', '$references_type', '$references_code', '$return_id', 
'', '', '');";



$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
$last_id = mysqli_insert_id($con);
if($category=='Freight')
{
print("<script>window.location='../superadmin/new_shipment_freight_json.php?new_shipment_id=$last_id'</script>"); //===freight
}
if($category=='Parcel')
{
print("<script>window.location='../superadmin/new_shipment_json.php?new_shipment_id=$last_id'</script>"); //===parcel
}
}

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>