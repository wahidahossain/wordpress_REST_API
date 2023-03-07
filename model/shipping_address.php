<?php
$sql_shipping_address="INSERT INTO `shipping_address`(
    `shipping_address_id`,
    `order_wid`,
    `shipping_first_name`,
    `shipping_last_name`,
    `shipping_company`,
    `shipping_address1`,
    `shipping_city`,
    `shipping_state`,
    `shipping_postal_code`,
    `shipping_country`,
    `shipping_phone`,
    `col_1`,
    `col_2`,
    `col_3`,
    `date`
  )
  VALUES(
    NULL,
    '$order_id',
    '$first_name_shipping',
    '$last_name_shipping',
    '$company_shipping',
    '$address_1_shipping',
    '$city_shipping',
    '$state_shipping',
    '$postcode_shipping',
    '$country_shipping',
    '$phone_shipping',
    '',
    '',
    '',
    NOW())";
  $result_shipping_address = mysqli_query($con, $sql_shipping_address) or die( 'Couldnot execute query'. mysqli_error($con));
    
?>