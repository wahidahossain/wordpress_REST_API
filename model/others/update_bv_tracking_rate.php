<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

if($login=="superadmin" || $login=="staff"){
//  $account_type=$_SESSION['account_type'];
//         $first_name=$_SESSION['first_name'];
//         $user_id=$_SESSION['user_id'];
    ?>
<?php
include ("../model/connect.php");
$trackingNumber = $_REQUEST['trackingNumber'];
$OrderNumber = $_REQUEST['OrderNumber'];
$bv_rate = $_REQUEST['rate1'];

//Get tracking number ==============================
/*
$query_trackingNumber="SELECT `trackingNumber` FROM `trackingnumber` WHERE `order_number`='$OrderNumber'";
$result_trackingNumber=mysqli_query($con, $query_trackingNumber);
$row_trackingNumber=mysqli_fetch_array($result_trackingNumber);
$trackingNumber=$row_trackingNumber['trackingNumber'];
*/

//MySQL rate update ======================================
$cost_update="UPDATE `trackingnumber` SET `col_3` = '$bv_rate' WHERE `trackingnumber`.`trackingNumber` = '$trackingNumber'; ";
$cost_update_result=mysqli_query($con, $cost_update) or die( 'Couldnot execute query'. mysql_error());

//BV rate & tracking update ======================================
include_once '../model/config.php'; 
//$update_bv="UPDATE SALES_ORDER_HEADER SET PO_NO='$tracking', BVSHIPPING='$new_sub_total' WHERE NUMBER='$invoice'";
$update_bv="UPDATE SALES_ORDER_HEADER SET PO_NO='$trackingNumber', BVSHIPPING = '$bv_rate' WHERE NUMBER = '$OrderNumber'";
$update_bv_result = odbc_exec($connection,$update_bv);


if($update_bv_result && $login=="superadmin" || $login=="dev"){
    print("<script>window.alert('Shipping cost updated successfully');</script>");
    //print("<script>window.location='../superadmin/gls_tracking_import_step2.php?step3=0'</script>");
    print("<script>window.location='../superadmin/shipping_list.php'</script>");
}

if($update_bv_result && $login=="staff"){
    print("<script>window.alert('Shipping cost updated successfully');</script>");
    //print("<script>window.location='../staff/gls_tracking_import_step2.php?step3=0'</script>");
    print("<script>window.location='../staff/shipping_list.php'</script>");
}

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>