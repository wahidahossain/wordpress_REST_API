<?php
$serverDSN = 'WHBVDEV';
//$serverDSN = 'BVSTAGING'; 
//$serverDSN = 'BVSQL'; 
$connection = odbc_connect($serverDSN, '', '');


if (odbc_error())
         {
               echo odbc_errormsg($connection);
         }

$results = odbc_exec($connection, "select NAME from CUSTOMER where CUS_NO = '1010TI'");
while($row = @odbc_fetch_array($results)) {
//print_r($row);
}


?>