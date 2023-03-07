<?php
// session_start();
//         $login=$_SESSION['login'];
//         $account_type=$_SESSION['account_type'];
//         $first_name=$_SESSION['first_name'];
//         $user_id=$_SESSION['user_id'];

//  if($login=="superadmin"){
//  $account_type=$_SESSION['account_type'];
//         $first_name=$_SESSION['first_name'];
//         $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("connect.php");

error_reporting(0);

$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);
$result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
                                $address.NAME AS CustomerName,
                                $address.BVADDR1 AS Address1,
                                $address.BVADDR2 AS Address2,
                                $address.BVCITY AS City,
                                $address .BVPROVSTATE AS Province,
                                $address.BVPOSTALCODE AS PostalCode,
                                $address.BVCOCONTACT1NAME AS Contact, 
                                $address.BVADDRTELNO1 AS Phone, 
                                $address.BVADDREMAIL AS Email,
                                replace($address .BVPOSTALCODE , ' ','') AS PostalCode
                                FROM $order $order LEFT OUTER JOIN 
                                $address $address ON $order .BVADDR_CEV_NO_2 = $address .CEV_NO
                                WHERE $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S' AND $order.BVADDR_CEV_NO_2 NOT LIKE 'Q%' AND ORDER_ADDRESS .BVCOUNTRYCODE = 'CDN'");
                                $counter=0;
                                $row_bv = @odbc_fetch_array($result);
                                $exist_email = $row_bv['email'];


$sql1="INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `account_status`, `logcount`, 
`last_login`, `ip`, `account_type`, `user_excol1`, `user_excol2`, `user_excol3`, `user_excol4`) 
VALUES (NULL, '$first_name', '$last_name', '$username', '$password', '$email', '$account_status', '$logcount', 
CURRENT_TIMESTAMP, '$ip', '$account_type', '$user_excol1', '$user_excol2', '$user_excol3', '$user_excol4');
";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());
print("<script>window.location='../superadmin/dashboard.php'</script>");

?>
<?php
// }
// else{
//     print("<script>window.alert('Sorry Your are not Logged in');</script>");
//     print("<script>window.location='../index.php'</script>");
// }
?>