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
header('Content-Encoding: UTF-8');
header('Content-type: application/csv');
header('Content-Type: text/html; charset=UTF-8');
 echo "\xEF\xBB\xBF"; // UTF-8 BOM
 error_reporting(0);
 ini_set('display_errors', 0);
ob_end_clean();

    $order = "SALES_ORDER_HEADER";
    $address = "ORDER_ADDRESS";
    
    $result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
    $address.NAME AS Company,
    $address.BVCOCONTACT1NAME AS Contact, 
    $address.BVADDRTELNO1 AS Phone, 
    $address.BVADDREMAIL AS Email,
    $address.BVADDR1 AS Add1,    
    replace($address.BVADDR1, ',','') AS Add1,
    $address.BVADDR2 AS Add2,    
    replace($address.BVADDR2, ',','') AS Add2,
    $address.BVCITY AS City,
    $address.BVPOSTALCODE AS Zip,
    replace($address .BVPOSTALCODE , ' ','') AS Zip,
    replace($address .BVCOUNTRYCODE , 'CDN','CA') AS Country,
    $address .BVPROVSTATE AS State
    FROM $order $order LEFT OUTER JOIN 
    $address $address ON $order .BVADDR_CEV_NO_2 = $address .CEV_NO
    WHERE $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S' AND $order.BVADDR_CEV_NO_2 NOT LIKE 'Q%' AND ORDER_ADDRESS .BVCOUNTRYCODE = 'CDN'"); 

$filename = 'glsfeed.csv';
$f = fopen('../reports/glsfeed.csv' , 'w');
if ($f === false) {
   // echo"test";
	die('Error opening the file ' . $filename);    
}
$delimiter = ",";
$fields = array('OrderNumber', 'CustomerName', 'Address1', 'Address2', 'City', 'Province', 'PostalCode', 'Contact', 'Phone', 'Email'); 
fputcsv($f, $fields, $delimiter); 
while($row = @odbc_fetch_array($result)){
 
 
 
 
    //$CustomerName = iconv("utf-8", "ISO-8859-1//TRANSLIT//IGNORE", $row['Company']); 
 //iconv("utf-8", "ascii//TRANSLIT//IGNORE", $input)
 $CustomerName = mb_convert_encoding($row['Company'], "UTF-8", "iso-8859-1");
 $Address1 = mb_convert_encoding($row['Add1'], "UTF-8", "iso-8859-1");
 $Address2 = mb_convert_encoding($row['Add2'], "UTF-8", "iso-8859-1");
 $City = mb_convert_encoding($row['City'], "UTF-8", "iso-8859-1");
 $Contact = mb_convert_encoding($row['Contact'], "UTF-8", "iso-8859-1");
 $Email01 = mb_convert_encoding($row['Email'], "UTF-8", "iso-8859-1");
 
 




//eliminate extra e-mails, keeps only first one------------------
$email = $Email01;
$keywords = preg_split('/[;]/', $email,-1, PREG_SPLIT_NO_EMPTY);
$final = $keywords[0];
//end of eliminate extra e-mails, keeps only first one-----------

                           



    $lineData = array($row['OrderNumber'],$CustomerName, $Address1, $Address2, $City, $row['State'], $row['Zip'], $Contact, $row['Phone'], $keywords[0]);   
    $lineData1 = str_replace(";","",$lineData);
       
    // $str = trim("$lineData", "  ");
    // fputcsv($f, $str,',',chr(0));
    $string = preg_replace('/\s[\s]+/',' ', $lineData1);
    //$array = str_replace('"', '', $string);
    $lineData3 = fputcsv($f, $string,',',' ');
    //fwrite($f, str_replace('"','',json_encode($string))."\n");

    
    // $string1 = str_replace('  ','',str_replace('"','',str_replace('[','',str_replace(']','',json_encode($lineData3)))));
    // $string2 = stripslashes($string1); // removes "\"
    // $string3 = chop($string2,";"); // removes last ";"
    
    
    
  // fwrite($f, $string1."\n");
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