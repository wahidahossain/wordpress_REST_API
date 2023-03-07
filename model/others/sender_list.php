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

$addressLine1 = $_REQUEST['addressline1'];
$province = $_REQUEST['province'];
$city = $_REQUEST['city'];
$postalCode = $_REQUEST['postalCode'];
$countryCode = $_REQUEST['countryCode'];
$customerName = $_REQUEST['customerName'];
$fullName = $_REQUEST['fullName'];
$email = $_REQUEST['email'];
$department = $_REQUEST['department'];
$telephone = $_REQUEST['telephone'];

$sql1="INSERT INTO `sender` (`sender_id`, `addressline1`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `col_1`, `col_2`, `date`) 
       VALUES (NULL, '$addressLine1', '$province', '$city', '$postalCode', '$countryCode', '$customerName', '$fullName', '$email', '$department', '$telephone', '', '', NOW());";

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