<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Billing Account</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/billing_accounts.php" id="myForm1">
               <div class="card card-body">               
                                <div class="form-group">
                                    <label>Billing Account Number</label>
                                    <input name="billing_account" id="billing_account" type="text" class="form-control"  required>
                                    <code>** When the division is set to Freight, the field billingAccount need to be of length : 7 , 8</code><br />
                                    <code>** For parcel, billingAccount need to be of length : 6</code>
                                </div>
                                <div class="form-group card card-body">
                                                          <label>Category</label>
                                                          <select class="custom-select" name="category" required>
                                                          <option value="">Select Option</option>
                                                          <option value="Freight">Freight</option>
                                                          <option value="Parcel">Parcel</option>                                        
                                                          </select>
                                                      </div>
                                <!-- =============================== Sender information ============================ -->
                                  <div class="form-group">
                                  <label>Sender</label>
                                  <select class="custom-select" name="sender_id" required>
                                      <option value="" selected>Select Option</option>
                                      <?php                                            
                                      include("../model/connect.php");
                                      $results_customer = mysqli_query($con, "SELECT * FROM `sender`");                                                
                                      while ($row_customer = mysqli_fetch_array($results_customer))                       
                                      {         
                                          $sender_id = $row_customer['sender_id'];
                                          $fullName = $row_customer['fullName'];
                                          $province = $row_customer['province'];
                                          $postalCode = $row_customer['postalCode'];                                      
                                      ?>                         
                                      <option value="<?php echo $sender_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                      <?php  
                                      }                                                   
                                      ?> 
                                  </select>
                              </div> 
                              <!-- ======================== End of Sender information ============================ -->
                              
                              <!-- ============================= Return information ============================== -->
                              <label>Return Address</label> 
                                <select class="custom-select" name="return_id">
                                    <option value="" selected>Select Option</option>
                                    <?php                                            
                                    include("../model/connect.php");                                                            
                                    $results_customer = mysqli_query($con, "SELECT * FROM `return`");                                                
                                    while ($row_customer = mysqli_fetch_array($results_customer))                       
                                    {         
                                        $return_id = $row_customer['return_id'];
                                        $fullName = $row_customer['fullName'];
                                        $province = $row_customer['province'];
                                        $postalCode = $row_customer['postalCode'];                                      
                                    ?>                         
                                    <option value="<?php echo $return_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                    <?php  
                                      }                                                   
                                    ?> 
                                </select>
                              <!-- ======================== End of Return information ============================ -->

                              <div class="form-group">
                                  <label>Notes</label>
                                  <input name="note" id="note" type="text" class="form-control" required>
                              </div>

                              <div class="form-group">
                                <button type="submit" class="btn btn-primary submit-button">Submit</button>
                              </div>                
                        </form>              
                        </div>
                        <?php
                          include ("../model/connect.php");
                          $minimum_cost = '0';
                          $result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                          $row = mysqli_fetch_array($result);                    
                          $minimum_cost = $row['minimum_cost'];
                        ?>

<div class="card-header">
                <h3 class="card-title">Minimum Cost Amount Setup</h3>
              </div>
                          <form method=post action="../model/minimum_shipping_cost.php">
                              <table class="table table-bordered table-striped">
                                <tr>
                                  <td><label>Set minimum shipping cost : $</label>
                                  <input type="text" placeholder="cost" size="5" name="minimum_cost" value="<?php echo $minimum_cost;?>">
                                  <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                                  </td>                    
                                </tr>
                              </table>
                            </form>

                      </div>
                    </div>
                  </div>
              <!-- form ends --> 
              <div class="col-12">                     
                     <div class="card card-primary">
                       <div class="card-header">
                         <h3 class="card-title">Billing Account Table</h3>
                       </div>
                       <div>                
                    </div>
                       <div class="card-body">        
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                           <tr>
                           <th>SL</th>                    
                             <th>Billing Account No.</th>
                             <th>Category</th>
                             <th>Note</th>
                             <th>Date</th>
                             <th></th>
                             <th style="display:none;">Operations</th>
                           </tr>
                           </thead>
                           <tbody>
                           <?php
                         include ("../model/connect.php");        
                         $result = mysqli_query($con, "SELECT * FROM `billing_account`");
                         $count = 0;
                         while ($row = mysqli_fetch_array($result))
                         {
                             $count = $count + 1;
                             $billing_account_id = $row['billing_account_id']; 
                             $billing_account = $row['billing_account'];
                             $category = $row['category'];
                             $note = $row['note']; 
                             $flag = $row['flag']; 
                             $date = $row['date'];                   
                             ?>
                               <tr>
                               <form method=post action="../model/update_billing_accounts.php" id="myForm1">
                               <td><?php echo $count;?></td>
                               <td>
                               <input name="billing_account_id" value="<?php echo $billing_account_id;?>" id="billing_account_id" type="hidden" class="form-control">
                               <input name="billing_account" value="<?php echo $billing_account;?>" id="billing_account" type="text" class="form-control"></td>
                               <td><?php echo $category;?></td>
                               <td><input name="note" value="<?php echo $note;?>" id="note" type="text" class="form-control"></td>
                               <td><?php echo $date;?></td>
                               <td><button type="submit" class="btn btn-block btn-info btn-xs">>></button></td>
                               <td class="d-print-none">
                                <?php if($flag=='1'){echo "Active";} if($flag=='0'){echo "Inactive";}?>
                               <a href="../model/billing_accounts_flag.php?billing_account_id=<?php echo $billing_account_id;?>&flag=<?php echo $flag;?>"><i class="fa fa-edit fa-fw"></i>In/Active</a>  
                               </td>
                               </form>
                               </tr>
                               <?php
                               }
                               ?>                                 
                           </tbody>
                           <tfoot>
                           <tr>
                             <th>SL</th>                    
                             <th>Billing Account No.</th>
                             <th>Category</th>
                             <th>Note</th>
                             <th>Date</th>
                             <th></th>
                             <th style="display:none;">Operations</th>
                           </tr>
                           </tfoot>
                         </table>
                       </div>
                       <!-- /.card-body -->
                   </div>
                   <!-- /.col -->
                 </div>
                </div><!-- /.container-fluid -->
              </section>


    
   