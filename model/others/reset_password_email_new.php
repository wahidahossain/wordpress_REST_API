
<?php
include ("../model/connect.php");

$email = $_REQUEST['email'];
$password = MD5($_REQUEST['password']);
$sql1="UPDATE `user` SET `password` = '$password' WHERE `user`.`email` = '$email'";
$result2=$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Password updated successfully, account is ready to login!!!');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>