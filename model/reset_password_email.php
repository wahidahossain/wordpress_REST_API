<?php
include ("../model/connect.php");

$email = $_REQUEST['email'];


$sql1=mysqli_query($con, "SELECT COUNT(*) as 'matched' FROM `user` WHERE `email`= '$email'");
$row = mysqli_fetch_array($sql1);
    $matched = $row['matched'];
    
    if($matched == FALSE){
        print("<script>window.alert('Sorry provided information does not match with our records, try again!!!');</script>"); 
        print("<script>window.location='../staff/reset_password_email.php'</script>");
    }
    else if($matched >'0'){

        //----------- name -----------------
        $sql2=mysqli_query($con, "SELECT * FROM `user` WHERE `email`='$email'");
        $row2 = mysqli_fetch_array($sql2);
        $first_name = $row2['first_name'];
        $last_name = $row2['last_name'];
        $username = $row2['username'];
        //------------ End of name --------------




        ini_set('SMTP', "exchange.jrponline.com");
        // ini_set('smtp_port', "587");
        ini_set('sendmail_from', "info@jrpinsights.com");
        
        $headers =  'MIME-Version: 1.0' . "\r\n"; 
        $headers .= 'From: JRP Inc. <info@jrpinsights.com>' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
        
        //$to = "wahida@jrponline.com";
        $to = $email;
        $subject = "JRP Insights Reset Password Link!!!";
        $body = "
        Hello ".$first_name."<br><br>
        Insight Account Login Information:<br>
            UserName: ".$username."<br>
        Please click the link below to Reset your JRP Insights account's Password<br>
        <a href='http://insights.jrponline.com//staff/reset_password_email_new.php?email=".$email."'>Reset Password</a><br><br>
        Thank you <br>
                JRP Insights Team. (JRP Online Inc.) <br>
                Contact us for more information.<br>
                
        ";
        mail($to, $subject, $body, $headers);
            print("<script>window.alert('Passowrd Reset link send, please check your e-mail address to reset JRP Insights account Password!!');</script>");
            print("<script>window.location='../index.php'</script>");
    }
    
    else{
        print("<script>window.alert('System error, please contact with system administrator!!!');</script>");
        print("<script>window.location='../reset_password_email.php'</script>");
    }
?>