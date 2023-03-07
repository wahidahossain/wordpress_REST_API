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
include ("../model/connect.php");
$minimum_cost = $_REQUEST['minimum_cost'];
$minimum_cost_update="UPDATE `minimum_shipping_cost` SET `minimum_cost`='$minimum_cost';";
$minimum_cost_update_result=mysqli_query($con, $minimum_cost_update) or die( 'Couldnot execute query'. mysqli_error($con));
if($minimum_cost_update_result){
    print("<script>window.alert('Minimum shipping cost updated successfully');</script>");
    print("<script>window.location='../superadmin/billing_accounts.php'</script>");
}
?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>