<?php

//     $sx_woocommerce_tax_rates = array(
//     array('tax_rate_id' => '1','tax_rate_name' => 'GST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '2','tax_rate_name' => 'GST+PST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '3','tax_rate_name' => 'GST+PST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '4','tax_rate_name' => 'GST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '5','tax_rate_name' => 'GST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '6','tax_rate_name' => 'GST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '7','tax_rate_name' => 'GST+QST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '8','tax_rate_name' => 'GST+PST','tax_rate' => '5.0000'),
//     array('tax_rate_id' => '9','tax_rate_name' => 'HST','tax_rate' => '13.0000'),
//     array('tax_rate_id' => '10','tax_rate_name' => 'HST','tax_rate' => '15.0000'),
//     array('tax_rate_id' => '11','tax_rate_name' => 'HST','tax_rate' => '15.0000'),
//     array('tax_rate_id' => '12','tax_rate_name' => 'HST','tax_rate' => '15.0000'),
//     array('tax_rate_id' => '13','tax_rate_name' => 'HST','tax_rate' => '15.0000')
//     );

$a = 5;
$b = 13;
$c = 15; 

$sales_order="select CUST_PO_NO from SALES_ORDER_HEADER where CUST_PO_NO='$order_id'";
$cust_po_no_bv = odbc_exec($connection,$sales_order);
$cust_po_no_bv_id = odbc_result($cust_po_no_bv, 1);

?>