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
//DB connection files ==========================
include("../model/connect.php");
include_once '../model/config.php';


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
 $k = '';
 for($i=0; $i<$count_var; $i++){
  $k=1;
echo "Sl: ".$i."================================"; 
echo "<br>";
 echo "Order id: ".$order_id = ($json_resp[$i]['id']); echo "<br>";
      $date_created1 = ($json_resp[$i]['date_created']); 
      $date_created2 = str_replace('-', '', $date_created1);
echo  "Date created ".$date_created = substr($date_created2, 0, 8); echo "<br>";

      $date_modified1 = ($json_resp[$i]['date_modified']); 
      $date_modified2 = str_replace('-', '', $date_modified1);
 echo "Date modified ".$date_modified = substr($date_modified2, 0, 8); echo "<br>";
 echo "Status: ".$status = ($json_resp[$i]['status']); echo "<br>";
 echo $cart_tax = ($json_resp[$i]['cart_tax']); echo "<br>";
 echo $total = ($json_resp[$i]['total']); echo "<br>";
 echo $total_tax = ($json_resp[$i]['total_tax']); echo "<br>";


 //billing ===========================================
 echo "<b>Billing Address:</b>";
 echo "<br>";
 echo $first_name_billing = ($json_resp[$i]['billing']['first_name']); echo " ";
 echo $last_name_billing = ($json_resp[$i]['billing']['last_name']);echo "<br>";
 echo $company_billing = ($json_resp[$i]['billing']['company']);echo ", ";
 echo $address_1_billing = ($json_resp[$i]['billing']['address_1']);echo ", ";
 echo $city_billing = ($json_resp[$i]['billing']['city']);echo ", ";
 echo $state_billing = ($json_resp[$i]['billing']['state']);echo ",";
 echo $postcode_billing = ($json_resp[$i]['billing']['postcode']);echo "<br>";
 echo $country_billing = ($json_resp[$i]['billing']['country']);echo ", ";
 echo $email_billing = ($json_resp[$i]['billing']['email']);echo ", ";
 echo $phone_billing = ($json_resp[$i]['billing']['phone']);echo "<br>";

//Start tax calculation=====================================

$a = $total - $total_tax;
$tax_per = ($total_tax * 100)/$a;

  //BV SALES_TAX table information fetch====================
  $sales_tax="select * from SALES_TAX";
  $sales_tax_data = odbc_exec($connection,$sales_tax);
  $tax_1 = odbc_result($sales_tax_data, 1);
  $tax_2 = odbc_result($sales_tax_data, 2);
  $tax_3 = odbc_result($sales_tax_data, 3);
  $tax_4 = odbc_result($sales_tax_data, 4);
  $tax_5 = odbc_result($sales_tax_data, 5);
  $tax_6 = odbc_result($sales_tax_data, 6);
  //BV SALES_TAX table information fetch====================
  $tax_new_value = '3';
  if($tax_per=='5'){
    $tax_new_value = $tax_1;
  }
  if($tax_per=='13'){
    $tax_new_value = $tax_3;
  }
  if($tax_per=='15'){
    $tax_new_value = $tax_5;
  }
//End tax calculation======================================

 //shipping ===============================================
 echo "<b>Shipping Address:</b>";
 echo "<br>";
 echo $first_name_shipping = ($json_resp[$i]['shipping']['first_name']);
 echo $last_name_shipping = ($json_resp[$i]['shipping']['last_name']);echo "<br>";
 echo $company_shipping = ($json_resp[$i]['shipping']['company']);echo ", ";
 echo $address_1_shipping = ($json_resp[$i]['shipping']['address_1']);echo ", ";
 echo $city_shipping = ($json_resp[$i]['shipping']['city']);echo "<br>";
 echo $state_shipping = ($json_resp[$i]['shipping']['state']);echo ", ";
 echo $postcode_shipping = ($json_resp[$i]['shipping']['postcode']);echo ", ";
 echo $country_shipping = ($json_resp[$i]['shipping']['country']);echo ", ";
 echo $phone_shipping = ($json_resp[$i]['shipping']['phone']);echo "<br>";


 $payment_method = ($json_resp[$i]['payment_method']);
 $payment_method_title = ($json_resp[$i]['payment_method_title']);
 $customer_note = ($json_resp[$i]['customer_note']);
 echo "<br>";
 //line item ===========================================
 $count_line_item = count($json_resp[$i]['line_items']);
 echo "Line Item Count: ".$count_line_item;

 
//echo $order_id;
//echo $first_name_billing;
 
//insert order data into mysql only if order number is new!
//checking order list ===========================================
$result_count = mysqli_query($con, "SELECT COUNT(*) as 'order_num_exist' FROM `order` WHERE `order_wid`='$order_id'");
$row_count = mysqli_fetch_array($result_count);
$order_num_exist = $row_count['order_num_exist'];
if($order_num_exist=='0')
{

  //BV DB =========================   
  include('sales_order_header.php');
  include('order_address.php');

  //MySQL DB =======================
  include("../model/order.php");
  include("../model/billing_address.php");
  include("../model/shipping_address.php");
$m = '';
for($j=0; $j<$count_line_item; $j++){
  // $m=1;
  // if($j<=$count_line_item){
  echo "line_items: ".$id_line_items = ($json_resp[$i]['line_items'][$j]['id']); echo "<br>";
  echo "name_line_items".$name_line_items = ($json_resp[$i]['line_items'][$j]['name']); echo "<br>";
  echo $product_id_line_items = ($json_resp[$i]['line_items'][$j]['product_id']);echo "<br>";
  echo "Qty: ". $quantity_line_items = ($json_resp[$i]['line_items'][$j]['quantity']); echo "<br>";
  echo "Sub Total: ".$subtotal_line_items = ($json_resp[$i]['line_items'][$j]['subtotal']); echo "<br>";
  echo "Sub Total Tax: ".$subtotal_tax_line_items = ($json_resp[$i]['line_items'][$j]['subtotal_tax']); echo "<br>";
  echo "Total: ".$total_line_items = ($json_resp[$i]['line_items'][$j]['total']); echo "<br>";
  echo "Total Tax: ".$total_tax_line_items = ($json_resp[$i]['line_items'][$j]['total_tax']); echo "<br>";
  echo "SKU: ".$sku_line_items = ($json_resp[$i]['line_items'][$j]['sku']); echo "<br>";
  echo "Price: ".$price_line_items = ($json_resp[$i]['line_items'][$j]['price']); echo "<br>";
  $order_id2 = $json_resp[$i]['id'];
  echo $order_id2.": ";
  echo $first_name_billing1 = ($json_resp[$i]['billing']['first_name']);  
  echo "<br>";
  echo "===========XXXXXXXXXXXXXXXXX=============".$j;
  echo "<br>";echo "<br>";
  $n = (int)$m+1;
  //echo $b;
  include("../model/product.php");
  include('sales_order_detail.php');
  $m++;
  }
  }   
  $k++;
}
?>
                       </div>
                       <!-- /.card-body -->                     
                   </div>
                   <!-- /.col -->
                 </div>
                </div><!-- /.container-fluid -->
              </section>
