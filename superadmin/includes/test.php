<!-- 

Links from postman API testing ======================

--------------------------------------------------------------------------------------
https://sandbox-smart4i.dicom.com/v1/shipment/1565068
https://smart4i.dicom.com/v1/shipment/list
https://sandbox-smart4i.dicom.com/v1/rate/shipment/159079214
https://sandbox-smart4i.dicom.com/v1/shipment/1565068       //Delete -----------------
https://sandbox-smart4i.dicom.com/v1/shipment/label/1574255 //Label ------------------
--------------------------------------------------------------------------------------
-->

<?php
//include_once '../model/config.php'; 
$serverDSN = 'WHBVDEV';
//$serverDSN = 'BVSTAGING'; 
//$serverDSN = 'BVSQL'; 
$connection = odbc_connect($serverDSN, '', '');


if (odbc_error())
         {
            echo odbc_errormsg($connection);
         }
//$update_bv="UPDATE SALES_ORDER_HEADER SET PO_NO='$tracking', BVSHIPPING='$new_sub_total' WHERE NUMBER='$invoice'";
//$update_bv="INSERT INTO ORDER_ADDRESS(RECORD_TYPE, CEV_NO) Values ('SORD','099999990')";
//$update_bv="DELETE FROM ORDER_ADDRESS where CEV_NO = '099999990'";
//select MAX(NUMBER) as 'number' from "SALES_ORDER_HEADER" where NUMBER NOT LIKE 'Q%'
//select * from "SALES_ORDER_HEADER" where CUST_NO = 'ZZSONCAN'




//select * from "SALES_ORDER_HEADER" where CUST_NO = 'ZZSONCAN'
//select MAX(NUMBER) as 'number' from "SALES_ORDER_HEADER" where NUMBER NOT LIKE 'Q%'
//DELETE FROM SALES_ORDER_HEADER where NUMBER = '0001227888'

//SELECT * FROM ORDER_ADDRESS where CEV_NO = '0001227170' (relation : ORDER_ADDRESS & SALES_ORDER_HEADER)    ========== IMP
//select * from "SALES_ORDER_DETAIL" where NUMBER LIKE '%0001227170%'  (relation : SALES_ORDER_DETAIL & SALES_ORDER_HEADER) =========================== IMP



$update_bv_result = odbc_exec($connection,$update_bv);


?>