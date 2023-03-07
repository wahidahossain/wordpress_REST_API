<?php
$sql_product="INSERT INTO `product`(
    `product_id`,
    `order_wid`,
    `product_line_id`,
    `product_name`,
    `product_wid`,
    `product_qty`,
    `product_subtotal`,
    `product_subtotal_tax`,
    `product_total`,
    `product_total_tax`,
    `product_sku`,
    `product_price`,
    `col_1`,
    `col_2`,
    `col_3`,
    `col_4`,
    `col_5`,
    `col_6`,
    `col_7`,
    `date`
  )
  VALUES(
    NULL,
    '$order_id',
    '$id_line_items ',
    '$name_line_items',
    '$product_id_line_items',
    '$quantity_line_items',
    '$subtotal_line_items',
    '$subtotal_tax_line_items',
    '$total_line_items',
    '$total_tax_line_items',
    '$sku_line_items',
    '$price_line_items',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    NOW())";
  $result_product = mysqli_query($con, $sql_product) or die( 'Couldnot execute query'. mysqli_error($con));
     
?>