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
$id = $_REQUEST['id'];
$url = "https://sandbox-smart4i.dicom.com/v1/shipment/label/".$id;     // NEED TO Change -------------------------
//$url = "https://smart4i.dicom.com/v1/shipment/label/".$id;
$username = 'wahida@jrponline.com';
$password = 'Dicom.123';

//Initiate cURL.
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

//$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/pdf', 'Content-Type: application/pdf'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
curl_setopt($curl, CURLOPT_REFERER, 'http://www.borkumer-zeitung.de/3d-flip-book/02-08-2019/');
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);
//Execute the request.
header('Content-type: application/pdf');
echo curl_exec($curl);

//If there was an error, throw an Exception
if(curl_errno($curl)){
    throw new Exception(curl_error($curl));
}

//Get the HTTP status code.
$statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

//SSL verify disabled
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

//Close the cURL handler.
curl_close($curl);

//Close the file handler.


// if($statusCode == 200){
//     echo 'Downloaded!';
// } else{
//     echo "Status Code: " . $statusCode;
// }


?>
<?php
}
else{
    print("<script>window.alert('Sorry Your are not Logged in');</script>");
    print("<script>window.location='../index.php'</script>");
}
?>