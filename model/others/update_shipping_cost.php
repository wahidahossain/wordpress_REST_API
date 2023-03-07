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
$tracking_table = $_REQUEST['tracking_table'];
$invoice = $_REQUEST['invoice'];
$sub_total = $_REQUEST['sub_total'];

$cost_update="UPDATE `gls_tracking` SET `sub_total`='$sub_total' WHERE `invoice`='$invoice';";
$cost_update_result=mysqli_query($con, $cost_update) or die( 'Couldnot execute query'. mysql_error());

if($cost_update_result && $login=="superadmin"){
    print("<script>window.alert('Shipping cost updated successfully');</script>");
    //print("<script>window.location='../superadmin/gls_tracking_import_step2.php?step3=0'</script>");
    print("<script>window.location='../superadmin/gls_tracking_import_step3.php?invoice=".$invoice."&sub_total=".$sub_total."&tracking_table=".$tracking_table."'</script>");
}

if($cost_update_result && $login=="staff"){
    print("<script>window.alert('Shipping cost updated successfully');</script>");
    //print("<script>window.location='../staff/gls_tracking_import_step2.php?step3=0'</script>");
    print("<script>window.location='../staff/gls_tracking_import_step3.php?invoice=".$invoice."&sub_total=".$sub_total."&tracking_table=".$tracking_table."'</script>");
}

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>