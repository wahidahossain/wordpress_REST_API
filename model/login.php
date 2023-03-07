<?php
session_start();

include('connect.php');
$name=$_REQUEST['username'];
$pass=MD5($_REQUEST['password']);
if($name!="" or $pass!=""){

$query="select count(*) as cnt FROM `user` WHERE `username`='$name' and `password`='$pass'";
$result=mysqli_query($con, $query);
$row=mysqli_fetch_array($result);
$count=$row['cnt'];

//====================================Write action to txt log
$log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "User: ".$name.PHP_EOL.
        "-------------------------".PHP_EOL;
//-
file_put_contents('./log_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
//===========================Log files ========================

    if($count>0){
       
        $query="select * FROM `user` WHERE `username`='$name' and `password`='$pass'";
        $result=mysqli_query($con, $query);
        $row=mysqli_fetch_array($result) ;      
        $user_id=$row['user_id'];
        $username=$row['username'];
        $password=$row['password'];
        $account_status=$row['account_status'];
        $account_type=$row['account_type'];
        $last_login = $row['last_login'];
        $first_name = $row['first_name'];
        $user_excol1 = $row['user_excol1'];
        $logcount = $row['logcount'];
        //$user_id11 = $row['user_id'];

        $logcount1 = $logcount+1;
        $timezone_offset = +6; // BD central time (gmt+6) for me
        $create_date = gmdate('d-m-Y', time()+$timezone_offset*60*60);
        $ip1=$_SERVER['REMOTE_ADDR'];
       
        
        
//------------------------- Block/Unblock ------------------------------------
if($user_excol1 == "block"){
    print("<script>window.alert('Sorry your account is currently on hold, please contact with the administrator.');</script>");
    print("<script>window.location='../index.php'</script>");
}
else{
//-------------------------- superadmin ---------------------------------------
        if($account_type == "superadmin" || $account_type == "staff" || $account_type == "dev" && $account_status == "1"){

        $login="superadmin";
        $_SESSION['login']=$login;
        $_SESSION['account_type']=$account_type;
        $_SESSION['first_name']=$first_name;
        $_SESSION['user_id']=$user_id;

        $sql1="UPDATE `user` SET `logcount` = '$logcount1', `last_login` = NOW(), `ip` = '$ip1' WHERE `user`.`user_id` = '$user_id';";
        $result2=mysqli_query($con, $sql1);
        if($account_type == "superadmin" || $account_type == "dev"){
            print("<script>window.location='../superadmin/dashboard.php'</script>");
        }
        if($account_type == "staff"){
            print("<script>window.location='../superadmin/gls_record_view.php'</script>");
        }

        }
        if($account_type=="superadmin" || $account_type == "staff" || $account_type == "dev" && $account_status=="0")
        {
            print("<script>window.alert('Sorry Your Account is Disabled!');</script>");
            print("<script>window.location='../index.php'</script>");
        }

//-------------------------- staff ---------------------------------------
 /*       if($account_type == "staff" && $account_status == "1"){            

            $login1="staff";
            $ip=$_SERVER['REMOTE_ADDR'];
            $_SESSION['user_id']=$user_id;
            $_SESSION['login']=$login1;
            $_SESSION['first_name']=$first_name;
            $_SESSION['account_type']=$account_type;
            //$ip=$_SERVER['REMOTE_ADDR'];                      

            print("<script>window.location='../staff/dashboard.php'</script>");
        }
        if($account_type=="staff" && $account_status=="0")
        {
            print("<script>window.alert('Sorry Your Account is Disabled!');</script>");
            print("<script>window.location='../index.php'</script>");
        }
*/


    }//until count > 0 ------------------------        
///////////////////////////////////////////////////////////////////
    
    if($count==0){

        print("<script>window.alert('Wrong UserId/Password.Please try again...');</script>");
        print("<script>window.location='../index.php'</script>");
    }
  //
}
}
print("<script>window.alert('Sorry incorrect login information provided, plesae use correct username and password!!');</script>");
print("<script>window.location='../index.php'</script>");

?>