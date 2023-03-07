<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

//  if($login=="superadmin"){
//  $account_type=$_SESSION['account_type'];
//         $first_name=$_SESSION['first_name'];
//         $user_id=$_SESSION['user_id'];
    ?>

<?php

include_once 'config.php';

ob_end_clean();

    $order = "SALES_ORDER_HEADER";
    $address = "ORDER_ADDRESS";
    
    $result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
    $address.NAME AS Company,
    $address.BVCOCONTACT1NAME AS Contact, 
    $address.BVADDRTELNO1 AS Phone, 
    $address.BVADDREMAIL AS Email,
    $address.BVADDR1 AS Add1,
    $address.BVADDR2 AS Add2,
    $address.BVCITY AS City,
    $address.BVPOSTALCODE AS Zip,
    replace($address .BVPOSTALCODE , ' ','') AS Zip,
    replace($address .BVCOUNTRYCODE , 'CDN','CA') AS Country,
    $address .BVPROVSTATE AS State
    FROM $order $order LEFT OUTER JOIN 
    $address $address ON $order .BVADDR_CEV_NO_2 = $address .CEV_NO
    WHERE $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S' AND $order.BVADDR_CEV_NO_2 NOT LIKE 'Q%' AND ORDER_ADDRESS .BVCOUNTRYCODE = 'CDN'"); 

$filename = 'glsfeed.csv';
//$f = fopen('//db/gls/glsfeed.csv' , 'w+'); ///=============OK
//$f = fopen('//192.168.0.12/gls/glsfeed.csv' , 'w+'); //================= OK
$f = fopen('../reports/glsfeed.csv' , 'w');

//$f = fopen('\\db\gls\glsfeed.csv' , 'w');
//$f = fopen('C:/Shipping/GLS/glsfeed.csv' , 'w');
if ($f === false) {
   // echo"test";
	die('Error opening the file ' . $filename);    
}
$delimiter = ",";
$fields = array('OrderNumber', 'CustomerName', 'Address1', 'Address2', 'City', 'Province', 'PostalCode', 'Contact', 'Phone', 'Email'); 
fputcsv($f, $fields, $delimiter); 

while($row = @odbc_fetch_array($result)){ 
    $lineData = array($row['OrderNumber'], $row['Company'], $row['Add1'], $row['Add2'], $row['City'], $row['State'], $row['Zip'], $row['Contact'], $row['Phone'], $row['Email']);   
    $lineData1 = str_replace("  ","",$lineData);
    //===============================================try=====================================

    
    // $str = trim("$lineData", "  ");
    // fputcsv($f, $str,',',chr(0));
    //$string = preg_replace('/\s+/',' ', $lineData);
    //fputcsv($f, $string,',',chr(0));

    //========================================================ok=================================
    $string = preg_replace('/\s[\s]+\W\Z/',' ', $lineData1);     
    $string1 = str_replace('"','',str_replace('[','',str_replace(']','',json_encode($string))));
    fwrite($f, $string1."\n");
    //fwrite($f, "\n");       
    //========================================================ok================================== 
} 
fclose($f);
?>
<?php
print("<script>window.alert('Successfully Exported Data');</script>");
if($login=="superadmin"){
print("<script>window.location='../superadmin/gls_shipping.php'</script>");
}
if($login=="staff"){
    //print("<script>window.alert('Successfully Exported Data');</script>");
print("<script>window.location='../staff/gls_shipping.php'</script>");
}
?>

<?php
// }
// else{
//     print("<script>window.alert('Sorry Your are not Logged in');</script>");
//     print("<script>window.location='../index.php'</script>");
// }
?>