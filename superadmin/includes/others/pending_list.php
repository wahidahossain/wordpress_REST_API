<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->
              <div class="col-12">
                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">All Pending Shipping List</h3>
                       </div>
                       <div>                
                 </div>
                       <div class="card-body"> 
                       <a href="gls_record_view.php"><h3 class="float-right badge bg-danger">>> Go To Shipping Order List</h3></a>              
                         
                           <?php
                         include ("../model/connect.php");
                         $url = 'https://sandbox-smart4i.dicom.com/v1/shipment/list';  // NEED TO Change -------------------------
                         //$url = 'https://smart4i.dicom.com/v1/shipment/list';

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
echo $response = curl_exec($ch);

 
//Check for errors.
if(curl_errno($ch)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($ch));
}

//Print out the response.
//echo $response;

//var_dump(http_response_code());
//echo $code = http_response_code();

$json_resp = json_decode($response, false);
//var_dump ($json_resp);
//var_dump json_decode($json_resp->trackingNumber, false);
// foreach ($json_resp->trackingNumber as $trackingNumber) {
//     $trackingNumber = $json_resp->trackingNumber;
//     var_dump($trackingNumber);
// }                                 
                             ?>                                       
                       </div>
                       <!-- /.card-body -->                     
                   </div>
                   <!-- /.col -->
                 </div>
                </div><!-- /.container-fluid -->
              </section>


    
   