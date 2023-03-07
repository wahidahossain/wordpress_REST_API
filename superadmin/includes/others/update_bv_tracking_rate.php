<section class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-primary">
          <?php
          //include("includes/gls_links.php");
          ?>
              <div class="card-body">
                <h3 class="card-title">GLS Shipping Cost (Check data before update to BV)</h3>
              </div>
            <div class="card-body col-md-6">
              <?php
                //=============================== IMPORT from file ========================================================
                //$step = '0';
                include_once '../model/connect.php'; 
                $rate = $_REQUEST['rate'];                
                $OrderNumber = $_REQUEST['OrderNumber'];
                $trackingNumber = $_REQUEST['trackingNumber'];
                
                    echo "<table class='table table-bordered table-striped'>
                    <thead>
                      <tr>        
                        <th>Order Number</th>
                        <th>Tracking Number</th>
                        <th>Rate</th>        
                      </tr>
                    </thead>
                    <tbody>";
                     //============Checking minimum shipping cost=========================== 
                        $new_sub_total = '0'; 
                        $minimum_cost_result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                        $minimum_cost_row = mysqli_fetch_array($minimum_cost_result);
                        $minimum_cost = $minimum_cost_row['minimum_cost'];
                        if($rate<$minimum_cost)
                            {
                            $new_sub_total = $minimum_cost;
                            }
                        else if($rate>$minimum_cost)
                            {
                            $new_sub_total = $rate;
                            }
                        //============End Checking minimum shipping cost=========================  

                        // $db->query("INSERT INTO `gls_tracking`(
                        //             `invoice`,
                        //             `tracking`,
                        //             `sub_total`)
                        //             VALUES( '".mysqli_real_escape_string($con, $invoice)."',
                        //             '".mysqli_real_escape_string($con, $tracking)."',
                        //             '".mysqli_real_escape_string($con, $new_sub_total)."')");                                                                                                                                                                        
                                                                                                  
                        //============Checking minimum shipping cost=========================== 
                                    $new_sub_total = '0'; 
                                    $minimum_cost_result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                                    $minimum_cost_row = mysqli_fetch_array($minimum_cost_result);
                                    $minimum_cost = $minimum_cost_row['minimum_cost'];
                                    if($rate<$minimum_cost)
                                        {
                                        $new_sub_total = $minimum_cost;
                                        }
                                        else if($rate>$minimum_cost)
                                        {
                                        $new_sub_total = $rate;
                                        }
                                    //============view data from gls_tracking table===========================
                                        // $gls_tracking_result = mysqli_query($con, "SELECT * FROM `gls_tracking` WHERE `invoice`='$invoice'");
                                        // $gls_tracking_row = mysqli_fetch_array($gls_tracking_result);
                                        // $invoice_table = $gls_tracking_row['invoice'];
                                        // $tracking_table = $gls_tracking_row['tracking'];
                                        // $sub_total_table = $gls_tracking_row['sub_total'];
                                                //======================= end =======================
                                        echo 
                                            "<tr>
                                                <td>Order No.: ".$OrderNumber."</td>
                                                <td>Tracking: ".$trackingNumber."</td>
                                                <td>Shipping Cost: 
                                                  <form method='get' action='../model/update_bv_tracking_rate.php'>
                                                  <input type='text' name='trackingNumber' value='".$trackingNumber."' hidden>
                                                  <input type='text' name='OrderNumber' value='".$OrderNumber."' hidden>
                                                  <input onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode == 46' name='rate1' value='".$new_sub_total."' size='6'>
                                                  <button type='submit'>Export To BV</button>
                                                  </form>
                                                </td>                                             
                                            </tr>";                                                   
                                            echo "</tbody>
                                                  </table>";
        
          ?>
        <!-- <a href="gls_tracking_import_step3.php"><button type="button" class="btn btn-block btn-info btn-lg"> 4. Export GLS Tracking Information to BV </button></a>
        <p data-toggletip>Selecting this “Export GLS Information to BV” button will update Business Vision with the Tracking# and Shipping Costs from Dicomv4, reviewed above. </p>                                       
                                    <script src="../index/tooltip.js"></script>  -->
        </div>
      </div>
    </div>     
  </div>
</section>

  
   