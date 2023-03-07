<?php
include ("connect.php");

$first_name = $_REQUEST['first_name'];
$last_name = $_REQUEST['last_name'];
$username = $_REQUEST['username'];
$password = MD5($_REQUEST['password']);
$email = $_REQUEST['email'];


ini_set('SMTP', "exchange.jrponline.com");
// ini_set('smtp_port', "587");
ini_set('sendmail_from', "info@jrpinsights.com");

$headers =  'MIME-Version: 1.0' . "\r\n"; 
$headers .= 'From: JRP Inc. <info@jrpinsights.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

//$to = "wahida@jrponline.com";
$to = $email;
$subject = "JRP Insights Account Activation Link!!!";
$body = "
Hello ".$first_name."<br><br>
Insight Account Login Information:<br>
    UserName: ".$username."<br>
Please click the link below to activate your JRP Insights account <br>
<a href='http://localhost/jrpinsights/server_version/model/activate_email.php?username=".$username."&email=".$email."'>User Account Activation Link</a><br><br>
Thank you <br>
        JRP Insights Team. (JRP Online Inc.) <br>
        Contact us for more information.<br>
        Address:<br>
        Phone: 
";
mail($to, $subject, $body, $headers);
    print("<script>window.alert('Account activation link send to user e-mail address');</script>");
    print("<script>window.location='../superadmin/add_new_staff.php'</script>");

?> 
