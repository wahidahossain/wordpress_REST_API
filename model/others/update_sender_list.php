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
include ("connect.php");

//error_reporting(0);
$sender_id = $_REQUEST['sender_id'];
$addressLine1 = $_REQUEST['addressLine1'];
$province = $_REQUEST['province'];
$city = $_REQUEST['city'];
$postalCode = $_REQUEST['postalCode'];
$countryCode = $_REQUEST['countryCode'];
$customerName = $_REQUEST['customerName'];
$fullName = $_REQUEST['fullName'];
$email = $_REQUEST['email'];
$department = $_REQUEST['department'];
$telephone = $_REQUEST['telephone'];

$sql1="UPDATE `sender` SET `addressLine1` = '$addressLine1', `province` = '$province', `city` = '$city', `postalCode` = '$postalCode', `countryCode` = '$countryCode', `customerName` = '$customerName', `fullName` = '$fullName', `email` = '$email', `department` = '$department', `telephone` = '$telephone', `date` = NOW() WHERE `sender`.`sender_id` = '$sender_id'; ";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
print("<script>window.location='../superadmin/sender_list.php'</script>");

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>