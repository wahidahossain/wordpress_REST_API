
<?php
include ("../model/connect.php");

$username = $_REQUEST['username'];
$email = $_REQUEST['email'];

$sql1="UPDATE `user` SET `account_status` = '1' WHERE `user`.`username` = '$username' AND `user`.`email` = '$email'";
$result2=$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

if($result2){
    print("<script>window.alert('Account activation successful, reset account password please!!!');</script>");
    print("<script>window.location='http://localhost/jrpinsights/server_version/staff/force_reset_password.php?username=".$username."'</script>");
}

?>
