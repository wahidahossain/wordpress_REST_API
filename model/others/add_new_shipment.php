<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

        if($login=="superadmin" || $login=="staff" || $login=="dev")
        {
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("connect.php");

error_reporting(0);

$billing_account_id = $_REQUEST['billing_account_id'];
$sender_id = $_REQUEST['sender_id'];
//$consignee_id = $_REQUEST['consignee_id'];
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
if($category=='Parcel'){
  $requestReturnLabel = $_REQUEST['requestReturnLabel'];
      if ($requestReturnLabel == 'true') {
        $returnWaybill = $_REQUEST['returnWaybill'];
      }
  $references_type = $_REQUEST['references_type'];
  $references_code = $_REQUEST['references_code'];
}
if($category=='Freight'){
  $appointment_type = $_REQUEST['appointment_type'];
  $app_phone = $_REQUEST['app_phone'];
  $date = $_REQUEST['date'];
  $time = $_REQUEST['time'];
}
//$surcharges_type = $_REQUEST['surcharges_type'];
$surcharges_value = $_REQUEST['surcharges_value'];
$promoCodes_status = $_REQUEST['promoCodes_status'];
$promoCodes = $_REQUEST['promoCodes'];
$deliveryType = $_REQUEST['deliveryType'];

$return_id = $_REQUEST['return_id'];

// Data for consignee table :: 
$addressLine1 = $_REQUEST['addressline1'];
$addressLine2 = $_REQUEST['addressline2'];
$province = $_REQUEST['province'];
$city = $_REQUEST['city'];
$postalCode = $_REQUEST['postalCode'];
$countryCode = $_REQUEST['countryCode'];
$customerName = $_REQUEST['customerName'];
$fullName = $_REQUEST['fullName'];
$email = $_REQUEST['email'];
$department = $_REQUEST['department'];
$telephone = $_REQUEST['telephone'];
$jrp_acc_no = $_REQUEST['jrp_acc_no'];
$OrderNumber = $_REQUEST['OrderNumber'];
//counting maximum characters for customer name field ===
$customerName_length = strlen($customerName);
if($customerName_length > '40'){
  print("<script>window.alert('Sorry Customer Name can not be more than 40 Characters.');</script>");
  if($category=='Freight') {
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
  }
  if($category=='Parcel') {
    print("<script>window.location='../superadmin/add_new_parcel.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
    }
}
//END counting maximum characters for customer name field



if($surcharges_type == 'DGG' && $hazmat == 'no' && $category=='Freight')
{
  print("<script>window.alert('If you selected the “DGG : dangerous goods” surcharge, you must include at least one parcel with at least one Hazmat');</script>");
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
}

if($hazmat == 'yes' && $surcharges_type != 'DGG')
{
  print("<script>window.alert('If you selected the “Hazmat : Yes”, you must select “Surcharge Type : DGG”');</script>");
  if($category=='Freight'){
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
  }
  if($category=='Parcel'){
    print("<script>window.location='../superadmin/add_new_parcel.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
    }
}

/*
if($hazmat == 'no' && $surcharges_type == 'DGG')
{
  print("<script>window.alert('If you selected the “Surcharge Type : DGG”, you must set “Hazmat : Yes”');</script>");
  if($category=='Freight'){
  print("<script>window.location='../superadmin/add_new_freight.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
  }
  if($category=='Parcel'){
    print("<script>window.location='../superadmin/add_new_parcel.php?OrderNumber=$OrderNumber&jrp_account_no=$jrp_acc_no'</script>");
    }
}
*/
else{
//insert data into consignee table ========================================
$sql1="INSERT INTO `consignee` (`consignee_id`, `addressLine1`, `addressLine2`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `jrp_acc_no`, `col_2`, `date`) 
       VALUES (NULL, '$addressLine1', '$addressLine2', '$province', '$city', '$postalCode', '$countryCode', '$customerName', '$fullName', '$email', '$department', '$telephone', '$jrp_acc_no', '', NOW());";
$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
$consignee_id = mysqli_insert_id($con);
//end consignee table ======================================================



//insert data into new_shipment table =======================================
if($category=='Parcel'){
$sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
`parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
`h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
`createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES (NULL, '$billing_account_id', '$sender_id', '$consignee_id', 
'$division', '$category', '$paymentType', '$note', '$unitOfMeasurement', '$parcelType', $quantity, $weight, $length, $depth, $width, '$hazmat', '$h_phone', 
'$h_erapReference', '$h_number', '$h_shippingName', '$h_primaryClass', '$h_subsidiaryClass', '$h_toxicByInhalation', '$h_packingGroup', '$h_description', '$h_hazmatType', '$requestReturnLabel', 
'$returnWaybill', '$surcharges_type', '$surcharges_value', '$promoCodes_status', '$promoCodes', NOW(), '$deliveryType', '$references_type', '$references_code', '$return_id', 
'', '', '','', '', '', '', '');";
}

if($category=='Freight'){
  $sql1="INSERT INTO `new_shipment` (`new_shipment_id`, `billing_account_id`, `sender_id`, `consignee_id`, `division`, `category`, `paymentType`, `note`, `unitOfMeasurement`, 
  `parcelType`, `quantity`, `weight`, `length`, `depth`, `width`, `hazmat`, `h_phone`, `h_erapReference`, `h_number`, `h_shippingName`, `h_primaryClass`, `h_subsidiaryClass`, 
  `h_toxicByInhalation`, `h_packingGroup`, `h_description`, `h_hazmatType`, `requestReturnLabel`, `returnWaybill`, `surcharges_type`, `surcharges_value`, `promoCodes_status`, `promoCodes`, 
  `createDate`, `deliveryType`, `references_type`, `references_code`, `return_id`, `col_1`, `col_2`, `col_3`, `col_4`, `col_5`, `col_6`, `col_7`, `col_8`) VALUES (NULL, '$billing_account_id', '$sender_id', '$consignee_id', 
  '$division', '$category', '$paymentType', '$note', '$unitOfMeasurement', '$parcelType', $quantity, $weight, $length, $depth, $width, '$hazmat', '$h_phone', 
  '$h_erapReference', '$h_number', '$h_shippingName', '$h_primaryClass', '$h_subsidiaryClass', '$h_toxicByInhalation', '$h_packingGroup', '$h_description', '$h_hazmatType', '', 
  '', '$surcharges_type', '$surcharges_value', '$promoCodes_status', '$promoCodes', NOW(), '$deliveryType', '', '', '$return_id', 
  '$app_phone', '$appointment_type', '$date','$time', '', '', '', '');";
  }
$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
$last_id = mysqli_insert_id($con);
//end new_shipment table =====================================================




if($category=='Freight')
{
print("<script>window.location='../superadmin/new_shipment_freight_json.php?new_shipment_id=$last_id&jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>"); //===freight
}
if($category=='Parcel')
{
print("<script>window.location='../superadmin/new_shipment_json.php?new_shipment_id=$last_id&jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>"); //===parcel
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