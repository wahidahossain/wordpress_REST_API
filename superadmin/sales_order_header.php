 <?php
//include("../../model/config.php");

//calculating SALES_ORDER_HEADER table NUMBEr field ======================================================
         $max_number="select MAX(NUMBER) as 'number' from SALES_ORDER_HEADER where NUMBER NOT LIKE 'Q%'";
         $max_number_result = odbc_exec($connection,$max_number);
         $max_id = odbc_result($max_number_result, 1);
         //$max_value1 = $max_id + 1;
         $max_value1 = $max_id + $k;
         //$max_value = str_pad($max_value1, 3, 0, STR_PAD_LEFT);
         $max_value2 = '000'.$max_value1;
         $max_value = $max_value2;
//end of calculating SALES_ORDER_HEADER table NUMBEr field ================================================

//getting cust_po_no for matching

$sales_order="select CUST_PO_NO from SALES_ORDER_HEADER where CUST_PO_NO='$order_id'";
$cust_po_no_bv = odbc_exec($connection,$sales_order);
$cust_po_no_bv_id = odbc_result($cust_po_no_bv, 1);
// end of getting cust_po_no for matching

$CEV_NO = $max_value;
if($order_id!=$cust_po_no_bv_id){
$update_sales_order_header="INSERT INTO SALES_ORDER_HEADER(
    NUMBER,
    CUST_NO,
    CUST_NAME,
    CUST_PO_NO,
    ORD_DATE,
    STATUS,
    IN_DATE,
    REQD_DATE,
    PO_NO,
    TERR_CODE,
    SLSPSN_NO,
    SLS_COMM_APP_AMT,
    SLS_COMM_PCT,
    SLS_COMM_AMT,
    SLS_COMM_FLAG,
    PRICE_CODE,
    DISC,
    DISC_OK,
    LINE_DISC_OK,
    BVTERMSINFOCODE,
    BVTERMSINFODESC,
    BVDOUBLETERMS,
    BVDAYOFMONTH01,
    BVDAYSBEFOREDUE01,
    BVMINDAYS01,
    BVDISCDAYOFMONTH01,
    BVDISCDAYSALLOWED01,
    BVDISCMINDAYS01,
    BVDISCMETHOD01,
    BVDISCRATE01,
    BVDAYOFMONTH02,
    BVDAYSBEFOREDUE02,
    BVMINDAYS02,
    BVDISCDAYOFMONTH02,
    BVDISCDAYSALLOWED02,
    BVDISCMINDAYS02,
    BVDISCMETHOD02,
    BVDISCRATE02,
    BVADDR_RECTYPE,
    BVADDR_CEV_NO,
    BVADDR_ADDR_TYPE,
    BVADDR_ID,
    BVADDR_RECTYPE_2,
    BVADDR_CEV_NO_2,
    BVADDR_ADDR_TYPE_2,
    BVADDR_ID_2,
    SHIP_TO_SELF,
    BVCURRCODE,
    BVCURRRATEMTHD,
    BVCURRRATEAMT,
    SHIP_VIA_CODE,
    PRINT_PACK,
    PACK_DATE,
    PRINT_SHIP_LABELS,
    SHIP_LABELS_DATE,
    STARSHIP_RECORD,
    STARSHIP_SERIAL,
    BVCRCARDEXPMM,
    BVCRCARDEXPYY,
    BVDRCARD,
    SERIALIZED_ITEMS,
    PRIORITY,
    BVRVVERSION,
    FOB,
    BVSALESTAX
)
VALUES(
    '$max_value',
    'ZZSONCAN',
    'SONAX  Canada - E- Orders',
    '$order_id',
    '$date_created',
    'O',
    '',
    '00000000',
    '',
    'MISSISAUGA',
    '0000000022',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '04',
    'Prepaid',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '3',
    '',
    '',
    '',
    '',
    '',
    '',
    '',
    '3',
    '',
    'SORD',
    '$CEV_NO',
    'B',
    '',
    'SORD',
    '$CEV_NO',
    'S',
    'SHIPTO',
    '1',
    '',
    '',
    '0E-7',
    '16',
    '1',
    '00000000',
    '1',
    '00000000',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '0',
    '7.92',
    'Your Dock',
    '$total_tax'
)";
$update_sales_order_header_result = odbc_exec($connection,$update_sales_order_header);
}
?>   