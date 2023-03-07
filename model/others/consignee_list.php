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
$addressLine2 = $_REQUEST['addressline2'];
$province = $_REQUEST['province'];
$city = $_REQUEST['city'];
$postalCode = $_REQUEST['postalCode'];
$countryCode = $_REQUEST['countryCode'];
$customerName = $_REQUEST['customerName'];
$fullName = $_REQUEST['fullName'];
$email = $_REQUEST['email'];
$department = $_REQUEST['department'];
$telephone = $_REQUEST['telephone'];
$jrp_acc_no = $_REQUEST['jrp_acc_no'];

$sql_jrp_acc_no_match=mysqli_query($con, "SELECT COUNT(*) AS 'jrp_acc_no_match' FROM `consignee` WHERE `jrp_acc_no` = '$jrp_acc_no'");
$row_jrp_acc_no_match = mysqli_fetch_array($sql_jrp_acc_no_match);
    $jrp_acc_no_match = $row_jrp_acc_no_match['jrp_acc_no_match'];

    if($jrp_acc_no_match=='0'){


$sql1="INSERT INTO `consignee` (`consignee_id`, `addressLine1`, `addressLine2`, `province`, `city`, `postalCode`, `countryCode`, `customerName`, `fullName`, `email`, `department`, `telephone`, `jrp_acc_no`, `col_2`, `date`) 
       VALUES (NULL, '$addressLine1', '$addressLine2', '$province', '$city', '$postalCode', '$countryCode', '$customerName', '$fullName', '$email', '$department', '$telephone', '$jrp_acc_no', '', NOW());";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));
print("<script>window.location='../superadmin/consignee_list.php'</script>");
    }
    else{
        print("<script>window.alert('Consignee Information already exist, please add a new one!');</script>");
        print("<script>window.location='../superadmin/consignee_list.php'</script>"); 
    }
?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>