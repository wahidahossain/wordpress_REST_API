<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

 if($login=="staff")
 {
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
?>

    <?php
    include ("../model/connect.php");
    $user_id1 = $_REQUEST['user_id1'];
    $password = MD5($_REQUEST['password']);
    $sql1="UPDATE `user` SET `password` = '$password' WHERE `user`.`user_id` = '$user_id1'";
    $result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());
    if($result2)
    {
        print("<script>window.alert('Password reset successful');</script>");
        print("<script>window.location='../staff/dashboard.php'</script>");
    }
    ?>
<?php
}
else
{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>