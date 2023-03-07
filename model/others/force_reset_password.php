<?php
include ("../model/connect.php");

$username = $_REQUEST['username'];
$password = MD5($_REQUEST['password']);

$sql1="UPDATE `user` SET `password` = '$password' WHERE `user`.`username` = '$username'";


$result2=$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());
//http://localhost/jrpdatapoint/client_application/model/activate_email.php?user_excol2=HCMOT&email=&logcount=0
if($result2>0){
    print("<script>window.alert('Password reset successfully, account is ready to be logged in!!!');</script>");
    print("<script>window.location='../index.php'</script>");
}
else{
    print("<script>window.alert('Password reset not successful, Try again!');</script>");
    print("<script>window.location='../customer/force_reset_password.php?username=".$username."'</script>");
}
?>