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

error_reporting(0);

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$username = $_REQUEST['username'];
$password = MD5($_REQUEST['password']);
$email = $_REQUEST['email'];
$account_status = '0';
$logcount = '0';
$ip = $_SERVER['REMOTE_ADDR'];
$account_type = "staff";
$user_excol1 = 'unblock';
$user_excol2 = '';
$user_excol3 = '';
$user_excol4 = '';
$timezone_offset = +6; // BD central time (gmt+6) for me
$create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);





$sql_email=mysqli_query($con, "SELECT COUNT(email) as email FROM `user` WHERE `email` = '$email'");
$row_email = mysqli_fetch_array($sql_email);
$exist_email = $row_email['email'];

$sql_username=mysqli_query($con,"SELECT COUNT(username) as username FROM `user` WHERE `username` = '$username'");
$row_username = mysqli_fetch_array($sql_username);
$exist_username = $row_username['username'];

// if($exist_email=='1'){
//     print("<script>window.alert('Sorry e-mail address already used, try new e-mail.');</script>");
//     print("<script>window.location='../superadmin/dashboard.php'</script>");
// }
// else if 
// ($exist_username=='1'){
//     print("<script>window.alert('Sorry Username address already used, try new Username.');</script>");
//     print("<script>window.location='../superadmin/dashboard.php'</script>");
// }
// else{
//------------------------------------------ Insert Into Mysql------------------------------------------------------------

if($exist_email=='1'){

    print("<script>window.alert('Sorry e-mail address already used, try new e-mail!!!');</script>");
    
}
else if($exist_username=='1')
{
    print("<script>window.alert('Sorry Username address already used, try a new Username!!!');</script>");
}

else{  
$sql1="INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `email`, `account_status`, `logcount`, 
`last_login`, `ip`, `account_type`, `user_excol1`, `user_excol2`, `user_excol3`, `user_excol4`) 
VALUES (NULL, '$first_name', '$last_name', '$username', '$password', '$email', '$account_status', '$logcount', 
CURRENT_TIMESTAMP, '$ip', '$account_type', '$user_excol1', '$user_excol2', '$user_excol3', '$user_excol4');
";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());
include ("notify.php");
// if($result2){
    //print("<script>window.alert('Staff information added successfully');</script>");    
// } 
}
print("<script>window.location='../superadmin/add_new_staff.php'</script>");
?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>