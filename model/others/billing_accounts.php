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

$billing_account = $_REQUEST['billing_account'];
$category = $_REQUEST['category'];
$sender_id = $_REQUEST['sender_id'];
$return_id = $_REQUEST['return_id'];
$note = $_REQUEST['note'];

$sql1="INSERT INTO `billing_account`(
`billing_account_id`, 
`billing_account`, 
`category`, 
`note`, 
`flag`, 
`sender_id`, 
`return_id`, 
`user_id`, 
`col_1`, 
`date`
)
VALUES(
    NULL,
    '$billing_account',
    '$category',
    '$note',
    '1',
    '$sender_id',
    '$return_id',
    '$user_id',
    '',
    NOW());
";

$result2=mysqli_query($con, $sql1) or die( 'Couldnot execute query'. mysqli_error($con));

// if($result2){
    //print("<script>window.alert('Staff information added successfully');</script>");    
// } 

print("<script>window.location='../superadmin/billing_accounts.php'</script>");

?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>