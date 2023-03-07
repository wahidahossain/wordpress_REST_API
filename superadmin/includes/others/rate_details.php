<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->
              <div class="col-12">
                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Detail Rate:</h3>
                       </div>
                       <div>                
                 </div>
                       <div class="card-body"> 
                     
                           <?php
                         include ("../model/connect.php");
                         $id = $_REQUEST['id'];                       
                         $url = 'https://sandbox-smart4i.dicom.com/v1/rate/shipment/'.$id;        // NEED TO Change -------------------------
                         //$url = 'https://smart4i.dicom.com/v1/rate/shipment/'.$id;
                         $username = "wahida@jrponline.com";
                         $password = "Dicom.123";

//Initiate cURL.
$ch = curl_init($url);
 
//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  

//Tell cURL to return the output as a string instead
//of dumping it to the browser.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//SSL verify disabled
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

//Execute the cURL request.
//echo $response = curl_exec($ch);

$response = curl_exec($ch);
//echo $json_string = json_encode($response, JSON_PRETTY_PRINT);
//var_dump(json_decode($response, true));
$result = json_decode($response, true);
$result2 = json_encode($response, JSON_PRETTY_PRINT);
//print_r($result);
//echo ($result2);
$json2 = json_encode(json_decode($response), JSON_PRETTY_PRINT);
echo '<pre>' . $json2 . '</pre>';
//echo $response['surcharges'][1];
//echo $response->rates[0]->surcharges[0];
//Check for errors.
if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}

//Print out the response.
//echo $response;

//var_dump(http_response_code());
//echo $code = http_response_code();
//$json_resp = json_decode($response, false);
//var_dump ($json_resp);
//var_dump json_decode($json_resp->trackingNumber, false);
// foreach ($json_resp->trackingNumber as $trackingNumber) {
//     $trackingNumber = $json_resp->trackingNumber;
//     var_dump($trackingNumber);
// }                                 
?>
         
                               
                </div><!-- /.container-fluid -->
              </section>


    
   