<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->
              <div class="col-12">
                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">All Processed Order List (Sonax Canada Orders : Status- Processing)</h3>
                       </div>
                       <div>                
                 </div>
                       <div class="card-body">                                                        
<?php
$url = 'https://test.sonaxcanada.com/wp-json/wc/v3/orders?status=processing';
$username="ck_769973be8010b6b5cf9889d502fd8696237f9a0b";
$password= "cs_e415e4197124cd46a792bdb16a7cd4797f83626d";
$curl = curl_init($url);
 
//Specify the username and password using the CURLOPT_USERPWD option.
curl_setopt($curl, CURLOPT_USERPWD, $username . ':' . $password); 

//$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");

//SSL verify disabled
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

// Execute request, store response and HTTP response code
$response=curl_exec($curl);
if(curl_errno($curl)){
    //If an error occured, throw an Exception.
    throw new Exception(curl_error($curl));
}
curl_close($curl);
$response;
//echo '<pre>';
 $jsonData = json_encode($response, JSON_PRETTY_PRINT);
 //print_r($jsonData);
//echo "<pre>" . $jsonData . "</pre>";
//echo '</pre>';
 $json_resp = json_decode($response, true);
 //var_dump($json_resp);
 //foreach($json_resp1 as $json_resp)
 $count_var = count($json_resp);
 for($i='0'; $i<$count_var; $i++){

 echo $order_id = ($json_resp[0]['id']);
 echo $date_created = ($json_resp[0]['date_created']);
 echo $date_modified = ($json_resp[0]['date_modified']);
 echo $status = ($json_resp[0]['status']);
 echo $cart_tax = ($json_resp[0]['cart_tax']);
 echo $total = ($json_resp[0]['total']);
 echo $total_tax = ($json_resp[0]['total_tax']);

 //billing ============================================
 echo $first_name_billing = ($json_resp[0]['billing']['first_name']);
 echo $last_name_billing = ($json_resp[0]['billing']['last_name']);
 echo $company_billing = ($json_resp[0]['billing']['company']);
 echo $address_1_billing = ($json_resp[0]['billing']['address_1']);
 echo $city_billing = ($json_resp[0]['billing']['city']);
 echo $state_billing = ($json_resp[0]['billing']['state']);
 echo $postcode_billing = ($json_resp[0]['billing']['postcode']);
 echo $country_billing = ($json_resp[0]['billing']['country']);
 echo $email_billing = ($json_resp[0]['billing']['email']);
 echo $phone_billing = ($json_resp[0]['billing']['phone']);

 //shipping ===========================================
 echo $first_name_shipping = ($json_resp[0]['shipping']['first_name']);
 echo $last_name_shipping = ($json_resp[0]['shipping']['last_name']);
 echo $company_shipping = ($json_resp[0]['shipping']['company']);
 echo $address_1_shipping = ($json_resp[0]['shipping']['address_1']);
 echo $city_shipping = ($json_resp[0]['shipping']['city']);
 echo $state_shipping = ($json_resp[0]['shipping']['state']);
 echo $postcode_shipping = ($json_resp[0]['shipping']['postcode']);
 echo $country_shipping = ($json_resp[0]['shipping']['country']);
 echo $phone_shipping = ($json_resp[0]['shipping']['phone']);


 $payment_method = ($json_resp[0]['payment_method']);
 $payment_method_title = ($json_resp[0]['payment_method_title']);
 $customer_note = ($json_resp[0]['customer_note']);
 echo "<br>";
 //line item ===========================================
 echo $id_line_items = ($json_resp[0]['line_items'][0]['id']);echo "<br>";
 echo $name_line_items = ($json_resp[0]['line_items'][0]['name']);echo "<br>";
 echo $product_id_line_items = ($json_resp[0]['line_items'][0]['product_id']);echo "<br>";
 echo "Qty: ". $quantity_line_items = ($json_resp[0]['line_items'][0]['quantity']);echo "<br>";
 echo "Sub Total: ".$subtotal_line_items = ($json_resp[0]['line_items'][0]['subtotal']);echo "<br>";
 echo "Sub Total Tax: ".$subtotal_tax_line_items = ($json_resp[0]['line_items'][0]['subtotal_tax']);echo "<br>";
 echo "Total: ".$total_line_items = ($json_resp[0]['line_items'][0]['total']);echo "<br>";
 echo "Total Tax: ".$total_tax_line_items = ($json_resp[0]['line_items'][0]['total_tax']);echo "<br>";
 //$id_taxes_line_items = ($json_resp[0]['line_items'][0]['taxes'][0]['id']);
 //$total_taxes_line_items = ($json_resp[0]['line_items'][0]['taxes'][0]['total']);
 //$subtotal_taxes_line_items = ($json_resp[0]['line_items'][0]['taxes'][0]['subtotal']);
 echo "SKU: ".$sku_line_items = ($json_resp[0]['line_items'][0]['sku']);echo "<br>";
 echo "Price: ".$price_line_items = ($json_resp[0]['line_items'][0]['price']);echo "<br>";


   $order_id2 = $json_resp[$i]['id'];
   echo $order_id2.": ";
   echo $first_name_billing1 = ($json_resp[$i]['billing']['first_name']);
   //echo $order_id2;
   echo "<br>";
 //echo $order_id;
//echo $first_name_billing;
}
?>
                       </div>
                       <!-- /.card-body -->                     
                   </div>
                   <!-- /.col -->
                 </div>
                </div><!-- /.container-fluid -->
              </section>


    
   