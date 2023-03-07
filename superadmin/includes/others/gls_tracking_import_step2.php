<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
          <?php
          include("includes/gls_links.php");
          ?>
              <div class="card-body">
                <h3 class="card-title">GLS Shipping Records (Check data before update to BV)</h3>
              </div>
            <div class="card-body col-md-6">
              <?php
                //=============================== IMPORT from file ========================================================
                //$step = '0';
                include_once '../model/connect.php'; 
                $step = $_REQUEST['step3'];
                //print_r(glob("import/*.*"));
                //print_r(glob("import/*.csv"));
                //$dir = "//db/gls/v4csvexport/"; //======================== CHANGE IT ====================================
                $dir = "../import/*";
                //$currentFile = glob($dir."*.csv");
                $currentFile = glob($dir."*.csv");   
                $counter = count($currentFile);
                if($counter>0){
                    echo "<table class='table table-bordered'>
                    <thead>
                      <tr>        
                        <th>Invoice</th>
                        <th>Waybill</th>
                        <th>ShipSubTotal</th>        
                      </tr>
                    </thead>
                    <tbody>";
                foreach ( $currentFile as $filename) { 
                    $handle = fopen($filename,"r");            
                    $count = 0;            
                    $file = basename($filename);
                    //=======================loop through the csv file and insert into database===================================           
                    while(($line = fgetcsv($handle)) !== FALSE){                 
                            $count++;
                            //print it from 2nd line ====================
                            if ($count == 2) {
                                    //print it from 2nd line ====================
                                        $invoice   = $line[0];
                                        $tracking  = $line[1];
                                        $sub_total = $line[2]; 
                                        
                                        //============get record list from mysql for matching ================================== 	
                                        $result = mysqli_query($con, "SELECT COUNT(*) as total, invoice,tracking,sub_total FROM `gls_tracking` WHERE `invoice`='$invoice' and `tracking`='$tracking'");
                                        $row = mysqli_fetch_array($result);
                                            $count = $count + 1;
                                            $total = $row['total'];
                                            $invoice1 = $row['invoice'];
                                            $tracking1 = $row['tracking'];
                                            $sub_total1 = $row['sub_total'];

                                            //============End of get record list from mysql for matching ===========================
                                                if($total=='0'){
                                                            //============Checking minimum shipping cost=========================== 
                                                        $new_sub_total = '0'; 
                                                        $minimum_cost_result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                                                        $minimum_cost_row = mysqli_fetch_array($minimum_cost_result);
                                                        $minimum_cost = $minimum_cost_row['minimum_cost'];
                                                            if($sub_total<$minimum_cost)
                                                              {
                                                              $new_sub_total = $minimum_cost;
                                                              }
                                                            else if($sub_total>$minimum_cost)
                                                              {
                                                                $new_sub_total = $sub_total;
                                                              }
                                                                    //============End Checking minimum shipping cost=========================  

                                                            $db->query("INSERT INTO `gls_tracking`(
                                                                        `invoice`,
                                                                        `tracking`,
                                                                        `sub_total`)
                                                                    VALUES( '".mysqli_real_escape_string($con, $invoice)."',
                                                                            '".mysqli_real_escape_string($con, $tracking)."',
                                                                            '".mysqli_real_escape_string($con, $new_sub_total)."')");                                                                                                                                                                        
                                                  }                                                
                                                 //============Checking minimum shipping cost=========================== 
                                                 $new_sub_total = '0'; 
                                                 $minimum_cost_result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                                                 $minimum_cost_row = mysqli_fetch_array($minimum_cost_result);
                                                 $minimum_cost = $minimum_cost_row['minimum_cost'];
                                                     if($sub_total<$minimum_cost)
                                                       {
                                                       $new_sub_total = $minimum_cost;
                                                       }
                                                     else if($sub_total>$minimum_cost)
                                                       {
                                                         $new_sub_total = $sub_total;
                                                       }
                                                //============view data from gls_tracking table===========================
                                                $gls_tracking_result = mysqli_query($con, "SELECT * FROM `gls_tracking` WHERE `invoice`='$invoice'");
                                                $gls_tracking_row = mysqli_fetch_array($gls_tracking_result);
                                                $invoice_table = $gls_tracking_row['invoice'];
                                                $tracking_table = $gls_tracking_row['tracking'];
                                                $sub_total_table = $gls_tracking_row['sub_total'];
                                                //======================= end =======================
                                                  echo 
                                                  "<tr>
                                                      <td>Invoice No.: ".$invoice_table."</td>
                                                      <td>Tracking: ".$tracking_table."</td>
                                                      <td>Shipping Cost: <form method='get' action='../model/update_shipping_cost.php'>
                                                          <input type='text' name='tracking_table' value='".$tracking_table."' hidden>
                                                          <input type='text' name='invoice' value='".$invoice_table."' hidden>
                                                          <input onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46' name='sub_total' value='".$sub_total_table."' size='6'><button type='submit'>Export To BV</button></form></td>
                                                                                                         
                                                    </tr>";  
                                                    // <input type='number' name='sub_total' value='".$sub_total_table."' size='6' step='any'>                 
                                    }
                            }        
                            fclose($handle);
                  } 
                                              echo "</tbody>
                                                    </table>";
            }
          ?>
        <!-- <a href="gls_tracking_import_step3.php"><button type="button" class="btn btn-block btn-info btn-lg"> 4. Export GLS Tracking Information to BV </button></a>
        <p data-toggletip>Selecting this “Export GLS Information to BV” button will update Business Vision with the Tracking# and Shipping Costs from Dicomv4, reviewed above. </p>                                       
                                    <script src="../index/tooltip.js"></script>  -->
        </div>
      </div>
    </div>     
  </div>
</section>

  
   