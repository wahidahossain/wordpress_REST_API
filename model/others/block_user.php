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

$user_id1 = $_REQUEST['user_id1'];
$user_excol1 = $_REQUEST['user_excol1'];

    if($user_excol1=='block'){
        $sql1="UPDATE `user` SET `user_excol1` = 'unblock' WHERE `user`.`user_id` = '$user_id1'";
        }

    if($user_excol1=='unblock'){
        $sql1="UPDATE `user` SET `user_excol1` = 'block' WHERE `user`.`user_id` = '$user_id1'";
        }   

        $result2=$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysql_error());

    if($result2){
        print("<script>window.alert('Staff account access changed successfully');</script>");
        print("<script>window.location='../superadmin/dashboard.php'</script>");
    }
?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>