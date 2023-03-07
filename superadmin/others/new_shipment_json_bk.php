<?php
include ("../model/connect.php");
//$result = mysqli_query($con, "SELECT JSON_ARRAYAGG(JSON_OBJECT(billing_account_id, sender_id, consignee_id, division, category, paymentType)) FROM `new_shipment` limit 1");
$result = mysqli_query($con, "SELECT * FROM `new_shipment` ORDER BY `new_shipment`.`new_shipment_id` DESC limit 1");

while ($row = mysqli_fetch_array($result))
{   
$billing_account_id = $row['billing_account_id'];
$result_billing_account = mysqli_query($con, "SELECT `billing_account` FROM `billing_account` WHERE `billing_account_id`='$billing_account_id'");
$row_billing_account = mysqli_fetch_array($result_billing_account);
$billing_account = $row_billing_account['billing_account'];

//==================================================================================================== SENDER
$sender_id = $row['sender_id'];
$result_sender = mysqli_query($con, "SELECT * FROM `sender` WHERE `sender_id`='$sender_id'");
$row_sender = mysqli_fetch_array($result_sender);
$sender_addressLine1 = $row_sender['addressline1'];
$sender_province = $row_sender['province'];
$sender_city = $row_sender['city'];
$sender_postalCode = $row_sender['postalCode'];
$sender_countryCode = $row_sender['countryCode'];
$sender_customerName = $row_sender['customerName'];
$sender_fullName = $row_sender['fullName'];
$sender_email = $row_sender['email'];
$sender_department = $row_sender['department'];
$sender_telephone = $row_sender['telephone'];

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
$requestReturnLabel = (boolean)$row['requestReturnLabel'];
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



//var_dump(json_encode($row));
//echo json_decode($row);


//ref: https://stackoverflow.com/questions/42900877/convert-mysql-database-to-json
//========================Working codes========================
/*
if ($result->num_rows > 0) {
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($rows);
    //echo $rows['division'];
} else {
    echo "no results found";
}
*/

// ====================================== API setup ==========================================
//echo $billing_account_id = $row['billing_account_id'];
$billing_account_id = $row['billing_account_id'];
$url = "https://sandbox-smart4i.dicom.com/v1/shipment/";    // NEED TO Change -------------------------
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

$data = 
[   
    'division'=> $division,
    'category'=> $category,
    'paymentType'=> $paymentType,
    'billingAccount'=> $billing_account,
    'note'=> $note,
        'sender'=> [
           
            'addressLine1 '=> $sender_addressLine1,
         'city '=> $sender_city,
         'provinceCode '=> $sender_province,
         'postalCode '=> $sender_postalCode,
         'countryCode '=> $sender_countryCode,
         'customerName '=> $sender_customerName,
            'contact'=>[            
                'fullName '=> $sender_fullName,
                'language '=>  'EN',
                'email '=> $sender_email,
                'department '=> $sender_department,
                'telephone '=> $sender_telephone,
            ]
        ],
        'consignee'=> [       
            'addressLine1 '=> $consignee_addressLine1,
         'city '=> $consignee_city,
         'provinceCode '=> $consignee_province,
         'postalCode '=> $consignee_postalCode,
         'countryCode '=> $consignee_countryCode,
         'customerName '=> $consignee_customerName,
            'contact'=> [                            
                
                'fullName '=> $consignee_fullName,
             'language '=>  'EN',
             'email '=> $consignee_email,
             'department '=> $consignee_department,
             'telephone '=> $consignee_telephone,
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
                'type '=> $references_type,
             'code '=> $references_code,
            ]
        ]
    
    ];
    var_dump($data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));


//echo $row['billing_account_id'];
}


$resp = curl_exec($curl);
if(curl_errno($curl)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($curl));
}
// ======================================== END ==============================================


$json_resp = (array) json_decode($resp, false);

    echo $set1_id = $json_resp['ID'];
    $set1_trackingNumber = $json_resp['trackingNumber'];
    echo "<a href='get_rate.php?id=".$set1_id."' target='_blank'>".$set1_trackingNumber."</a>";

if (is_array($json_resp) || is_object($json_resp))
{   
   
//include('connect.php');
$sql1="INSERT INTO `trackingnumber` (`trackingNumber_id`, `id`, `trackingNumber`, `rate`, `col_1`, `col_2`, `col_3`, `date`) 
VALUES (NULL, '$set1_id', '$set1_trackingNumber', '', '', '', '', NOW());
";
$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

}
else{
    echo "<br />Not working";
}







?>