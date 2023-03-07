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
    <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JRP Insight| Dashboard</title>
  <?php
  include("includes/css.php");
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
include ("../model/connect.php");
error_reporting(0);
$new_shipment_id = $_REQUEST['new_shipment_id'];
$OrderNumber = $_REQUEST['OrderNumber'];
$jrp_acc_no = $_REQUEST['jrp_acc_no'];

//$result = mysqli_query($con, "SELECT JSON_ARRAYAGG(JSON_OBJECT(billing_account_id, sender_id, consignee_id, division, category, paymentType)) FROM `new_shipment` limit 1");
$result = mysqli_query($con, "SELECT * FROM `new_shipment` WHERE `new_shipment_id`='$new_shipment_id'");

while ($row = mysqli_fetch_array($result))
{   
$billing_account_id = $row['billing_account_id'];
$result_billing_account = mysqli_query($con, "SELECT `billing_account` FROM `billing_account` WHERE `billing_account_id`='$billing_account_id'");
$row_billing_account = mysqli_fetch_array($result_billing_account);
$billing_account = (string) $row_billing_account['billing_account'];

//==================================================================================================== SENDER
$sender_id = $row['sender_id'];
$result_sender = mysqli_query($con, "SELECT * FROM `sender` WHERE `sender_id`='$sender_id'");
$row_sender = mysqli_fetch_array($result_sender);
$sender_addressLine1 = (string)$row_sender['addressline1'];
$sender_province = (string)$row_sender['province'];
$sender_city = (string)$row_sender['city'];
$sender_postalCode = (string)$row_sender['postalCode'];
$sender_countryCode = (string)$row_sender['countryCode'];
$sender_customerName = (string)$row_sender['customerName'];
$sender_fullName = (string)$row_sender['fullName'];
$sender_email = (string)$row_sender['email'];
$sender_department = (string)$row_sender['department'];
$sender_telephone = (string)$row_sender['telephone'];

//==================================================================================================== CONSIGNEE
$consignee_id = $row['consignee_id'];
$result_consignee = mysqli_query($con, "SELECT * FROM `consignee` WHERE `consignee_id`='$consignee_id'");
$row_consignee = mysqli_fetch_array($result_consignee);
$consignee_addressLine1 = $row_consignee['addressLine1'];
$consignee_province = $row_consignee['province'];
$consignee_city = $row_consignee['city'];
$consignee_postalCode = $row_consignee['postalCode'];
$consignee_countryCode = $row_consignee['countryCode'];
$consignee_customerName = $row_consignee['customerName'];
$consignee_fullName = $row_consignee['fullName'];
$consignee_email = $row_consignee['email'];
$consignee_department = $row_consignee['department'];
$consignee_telephone = $row_consignee['telephone'];



$division = $row['division'];
$category = $row['category'];
$paymentType = $row['paymentType'];
$note = $row['note'];
$unitOfMeasurement = $row['unitOfMeasurement'];
$parcelType = $row['parcelType'];
$quantity = (int)$row['quantity'];
$weight = (float)$row['weight'];
$length = (float)$row['length'];
$depth = (float)$row['depth'];
$width = (float)$row['width'];
$hazmat = $row['hazmat'];
$h_phone = $row['h_phone'];
$h_erapReference = $row['h_erapReference'];
$h_number = $row['h_number'];
$h_shippingName = $row['h_shippingName'];
$h_primaryClass = $row['h_primaryClass'];
$h_subsidiaryClass = $row['h_subsidiaryClass'];
$h_toxicByInhalation = $row['h_toxicByInhalation'];
$h_packingGroup = $row['h_packingGroup'];
$h_hazmatType = $row['h_hazmatType'];
$h_description = $row['h_description'];
$requestReturnLabel = $row['requestReturnLabel'];
$returnWaybill = $row['returnWaybill'];
$surcharges_type = $row['surcharges_type'];
$surcharges_value = $row['surcharges_value'];
$promoCodes_status = $row['promoCodes_status'];
$promoCodes = $row['promoCodes'];
$deliveryType = $row['deliveryType'];
$references_type = $row['references_type'];
$references_code = $row['references_code'];
//$createDate = DATE_FORMAT($row['date'], "Y/m/d H:i:s");
$createDate = $row['createDate'];

//==================================================================================================== RETURN
$return_id = $row['return_id'];
$result_return = mysqli_query($con, "SELECT * FROM `return` WHERE `return_id`='$return_id'");
$row_return = mysqli_fetch_array($result_return);
$return_addressLine1 = $row_return['addressLine1'];
$return_province = $row_return['province'];
$return_city = $row_return['city'];
$return_postalCode = $row_return['postalCode'];
$return_countryCode = $row_return['countryCode'];
$return_customerName = $row_return['customerName'];
$return_fullName = $row_return['fullName'];
$return_email = $row_return['email'];
$return_department = $row_return['department'];
$return_telephone = $row_return['telephone'];


if($division == 'Express'){
    $waybill = array('requestReturnLabel'=> $requestReturnLabel, 'returnWaybill'=> $returnWaybill);
}
//array( "id" => "0", "nilai" => "0" )
else
{
    $waybill = '';
}


// ====================================== API setup ==========================================
$billing_account_id = $row['billing_account_id'];

$url = "https://sandbox-smart4i.dicom.com/v1/shipment/";     // NEED TO Change -------------------------
//$url = "https://smart4i.dicom.com/v1/shipment/";
$username = 'wahida@jrponline.com';
$password = 'Dicom.123';

//Initiate cURL.
$curl = curl_init($url);

 
//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

//$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//SSL verify disabled
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);


//==================================================== WITH HAZMAT
$data = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
           
         'addressLine1'=> $sender_addressLine1,
         'city'=> $sender_city,
         'provinceCode'=> $sender_province,
         'postalCode'=> $sender_postalCode,
         'countryCode'=> $sender_countryCode,
         'customerName'=> $sender_customerName,
         'contact'=>[            
                'fullName'=> $sender_fullName,
                'language'=>  'EN',
                'email'=> $sender_email,
                'department'=> $sender_department,
                'telephone'=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
         'addressLine1'=> $consignee_addressLine1,
         'city'=> $consignee_city,
         'provinceCode'=> $consignee_province,
         'postalCode'=> $consignee_postalCode,
         'countryCode'=> $consignee_countryCode,
         'customerName'=> $consignee_customerName,
         'contact'=> [                                
             'fullName'=> $consignee_fullName,
             'language'=>  'EN',
             'email'=> $consignee_email,
             'department'=> $consignee_department,
             'telephone'=> $consignee_telephone,
            ]
        ],
        'unitOfMeasurement'=> $unitOfMeasurement,         
        'parcels'=> [
            [               
                'parcelType'=> $parcelType,
                'quantity'=> $quantity,
                'weight'=> $weight,
                'length'=> $length,
                'depth'=> $depth,
                'width'=> $width,
                'hazmat'=> [
                    'phone'=> $h_phone,
                    'erapReference'=> $h_erapReference,
                    'number'=> $h_number,
                    'shippingName'=> $h_shippingName,
                    'primaryClass'=> $h_primaryClass,
                    'subsidiaryClass'=> $h_subsidiaryClass,
                    'toxicByInhalation'=> $h_toxicByInhalation,
                    'packingGroup'=> $h_packingGroup,
                    'hazmatType'=> $h_hazmatType,
                ],
                'groupId'=> 1,
                'requestReturnLabel'=> $requestReturnLabel, 
                'returnWaybill'=> $returnWaybill                
            ]
        ],
        'surcharges'=> [
            [
                'type'=> $surcharges_type,
		        'value'=> $surcharges_value
            ]
        ],
        'createDate'=> $createDate,
        'deliveryType'=> $deliveryType,
        'references'=> [
            [
             'type'=> $references_type,
             'code'=> $references_code,
            ]
        ]    
    ];


        include ("includes/hazmat.php"); //========================================================== ALL Hazmat Data File
        //var_dump($data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        if($hazmat=='yes' && $h_hazmatType=='Regulated'){
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

            //=====print a json file
            $path = 'file.json';
            $jsonString = json_encode($data, JSON_PRETTY_PRINT);
            // Write in the file
            $fp = fopen($path, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
        }

        if($hazmat == 'yes' && $h_hazmatType == 'NonRegulated'){
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_hazmat_nonregulated_parcel));
    
                //=====print a json file
                $path = 'file.json';
                $jsonString = json_encode($data_hazmat_nonregulated_parcel, JSON_PRETTY_PRINT);
                // Write in the file
                $fp = fopen($path, 'w');
                fwrite($fp, $jsonString);
                fclose($fp);
            }

        if($hazmat=='no'){
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_without_hazmat_parcel));
            //=====print a json file
            $path = 'file.json';
            $jsonString = json_encode($data_without_hazmat_parcel, JSON_PRETTY_PRINT);
            // Write in the file
            $fp = fopen($path, 'w');
            fwrite($fp, $jsonString);
            fclose($fp);
        }


}


$resp = curl_exec($curl);

if(curl_errno($curl)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($curl));
}
// ======================================== END ==============================================


$json_resp = (array) json_decode($resp, false);

    $set1_id = $json_resp['ID'];
    $set1_trackingNumber = $json_resp['trackingNumber'];
    //multiple tracking number if quantity is more than 1 ====================================
    include('multiple_tracking.php');
   //End multiple tracking number if quantity is more than 1 ================================ 

   // echo "<a href='get_rate.php?id=".$set1_id."' target='_blank'>".$set1_trackingNumber."</a>";


if (is_array($json_resp) || is_object($json_resp))
{     
    if(isSet($set1_id)){ 
        $sql1="INSERT INTO `trackingnumber` (`trackingNumber_id`, `id`, `trackingNumber`, `rate`, `new_shipment_id`, `order_number`,`col_1`,`col_2`, `col_3`, `date`) 
        VALUES (NULL, '$set1_id', '$set1_trackingNumber', '', '$new_shipment_id', '$OrderNumber', '','$user_id', '', NOW());";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
print("<script>window.location='get_rate.php?id=".$set1_id."&trackingNumber=".$set1_trackingNumber."&new_shipment_id=".$new_shipment_id."&type=parcel&jrp_acc_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>");
    }
    else{
        // If data not inserted into `trackingnumber` : delete shiping information from the new shipment table.==============

        $sql1_del_shipment ="DELETE FROM `new_shipment` WHERE `new_shipment`.`new_shipment_id` = '$new_shipment_id'; ";
        $result2_del_shipment = mysqli_query($con, $sql1_del_shipment) or die( 'Couldnot execute query'. mysqli_error($con));
         //delete consignee================================
         $sql1_del_consignee ="DELETE FROM `consignee` WHERE `consignee`.`consignee_id` = '$consignee_id'; ";
         $result2_del_consignee = mysqli_query($con, $sql1_del_consignee) or die( 'Couldnot execute query'. mysqli_error($con));
         
        $json2 = json_encode(json_decode($resp), JSON_PRETTY_PRINT);
        echo '<pre>' . $json2 . '</pre>';

        //print("<script>window.alert('Shipment Add Unsuccessful, Data missing or wrong information added, Please Try again!!');</script>");
        //print("<script>window.location='add_new_parcel.php?jrp_account_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>");
    
        ?>
        <button class='btn btn-primary submit-button' onclick="location.href='add_new_parcel.php?jrp_account_no=<?php echo $jrp_acc_no;?>&OrderNumber=<?php echo $OrderNumber;?>'" type="button">
                 Process Again</button>
            <?php
    }

//echo $code = http_response_code();
//print("<script>window.location='get_rate.php?id=".$set1_id."'</script>");
}

else{
    $json2 = json_encode(json_decode($resp), JSON_PRETTY_PRINT);
        echo '<pre>' . $json2 . '</pre>';

    //delete shipment ================================
    $sql1="DELETE FROM `new_shipment` WHERE `new_shipment`.`new_shipment_id` = '$new_shipment_id'; ";
    $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

    //delete consignee================================
    $sql1_del_consignee ="DELETE FROM `consignee` WHERE `consignee`.`consignee_id` = '$consignee_id'; ";
    $result2_del_consignee = mysqli_query($con, $sql1_del_consignee) or die( 'Couldnot execute query'. mysqli_error($con));

    //echo "<br />Not working";
    //print("<script>window.alert('Shipment form was not filled up correctly, try again!!');</script>");
    //print("<script>window.location='add_new_parcel.php?jrp_account_no=$jrp_acc_no&OrderNumber=$OrderNumber'</script>");
    ?>
    <button class='btn btn-primary submit-button' onclick="location.href='add_new_parcel.php?jrp_account_no=<?php echo $jrp_acc_no;?>&OrderNumber=<?php echo $OrderNumber;?>'" type="button">
             Process Again</button>
        <?php
}
//header("Location: get_rate.php?id='.$set1_id.'");
//print("<script>window.location='<a href='get_rate.php?id=".$set1_id."' target='_blank'>".$set1_trackingNumber."</a>'</script>");

?>
</div>
</body>
</html>

<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>