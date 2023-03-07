<section class="content">
      <div class="container-fluid">
        <div class="col-md-6">
          <div class="card card-primary">
              <!-- <div class="card-header">
                <h3 class="card-title">GLS Shipping Records</h3>
              </div> -->
              <div class="">
              <?php
//=============================== IMPORT from file ========================================================
//$step = '0';
include_once '../model/connect.php'; 
$invoice_req = $_REQUEST['invoice'];
$sub_total_req = $_REQUEST['sub_total'];
$tracking_table_req = $_REQUEST['tracking_table'];
 //print_r(glob("import/*.*"));
 //print_r(glob("import/*.csv"));
 //$dir = "//db/gls/v4csvexport/"; //======================== CHANGE IT ====================================
 $dir = "../import/";
 //$currentFile = glob($dir."*.csv");
 $currentFile = glob($dir."*.*"); 
 $currentFile = glob($dir."*".$tracking_table_req.".*");   
 $counter = count($currentFile);
 if($counter>0){
        foreach ( $currentFile as $filename) {
            $handle = fopen($filename,"r");            
            $count = 0;            
            $file = basename($filename);
echo $file;
            //=======================loop through the csv file and insert into database===================================
            while(($line = fgetcsv($handle)) !== FALSE){                 
                 $count++;
                 //print it from 2nd line ====================
                    if ($count == 2) {
                        $invoice   = $line[0];
                        $tracking  = $line[1];
                        $sub_total = $line[2]; 
                        //============Checking minimum shipping cost===========================
                        $new_sub_total = '0'; 
                        $minimum_cost_result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                        $minimum_cost_row = mysqli_fetch_array($minimum_cost_result);
                        $minimum_cost = $minimum_cost_row['minimum_cost'];                  
                        if($sub_total<$minimum_cost){
                          $new_sub_total = $minimum_cost;
                        }
                        else{
                          $new_sub_total = $sub_total;
                        }


                        //============view data from gls_tracking table===========================
                        $gls_tracking_result = mysqli_query($con, "SELECT * FROM `gls_tracking` WHERE `invoice`='$invoice_req'");
                        $gls_tracking_row = mysqli_fetch_array($gls_tracking_result);
                        $invoice_table = $gls_tracking_row['invoice'];
                        $tracking_table = $gls_tracking_row['tracking'];
                        $sub_total_table = $gls_tracking_row['sub_total'];
                        //======================= end =======================

                        //============End Checking minimum shipping cost=======================
                                    //========================================== BV Data Update =========================================
                                    include_once '../model/config.php'; 
                                    //$update_bv="UPDATE SALES_ORDER_HEADER SET PO_NO='$tracking', BVSHIPPING='$new_sub_total' WHERE NUMBER='$invoice'";
                                    $update_bv="UPDATE SALES_ORDER_HEADER SET PO_NO='$tracking_table', BVSHIPPING='$sub_total_table' WHERE NUMBER='$invoice_table'";
                                    $update_bv_result = odbc_exec($connection,$update_bv);
                                    //checking the BV record if exist---------------------------
                                    $result_SALES_ORDER_HEADER = odbc_exec($connection, "select COUNT(*) as cnt from SALES_ORDER_HEADER where NUMBER='$invoice_table'");
                                    $row_SALES_ORDER_HEADER = @odbc_fetch_array($result_SALES_ORDER_HEADER);
                                    $cnt = $row_SALES_ORDER_HEADER['cnt'];                        
                                    if ($cnt == 1){
                                      //print("<script>window.alert('Invoice: $invoice, Data Successfully Uploaded To BV');</script>");
                                      print("<script>window.location='gls_tracking_import_step2.php?step3=0'</script>");
                                    }
                                    else{
                                      print("<script>window.alert('Invoice: $invoice, can not be uploaded to BV this time.');</script>"); 
                                      print("<script>window.location='gls_tracking_import_step2.php?step3=0'</script>");
                                    }
                                    //End of checking the BV record if exist---------------------------
                                  }
                                  //print("<script>window.location='gls_shipping.php'</script>");
            }         
    //===============================Move the file to completed folder after processing=============================
        error_reporting(E_ERROR | E_PARSE);
        $source_file = $filename;
        //$destination_path = '//db/gls/v4csvcompleted/'; //======================== CHANGE IT ====================================
        $destination_path = '../completed/';
        rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
    //==============================================================================================================            
        }
        fclose($handle);
       // print("<script>window.alert('Data Successfully Uploaded To BV');</script>");
        print("<script>window.location='gls_shipping.php'</script>");
} 

?>

  </div>
  </div>
  </div>     
  </div>
  </section>

  
   