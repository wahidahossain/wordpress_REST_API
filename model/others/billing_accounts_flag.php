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

$billing_account_id = $_REQUEST['billing_account_id'];
$flag = $_REQUEST['flag'];

    if($flag =='1'){
        $sql1="UPDATE `billing_account` SET `flag` = '0' WHERE `billing_account`.`billing_account_id` = '$billing_account_id'; ";
        }

    if($flag =='0'){
        $sql1="UPDATE `billing_account` SET `flag` = '1' WHERE `billing_account`.`billing_account_id` = '$billing_account_id'; ";
        }   

        $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

    if($result2){
        //print("<script>window.alert('Staff account access changed successfully');</script>");
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