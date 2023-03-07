<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Consignee Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/consignee_list.php" id="myForm1">
               <div class="card card-body">    
                                 <!-- sender start =========================================== -->
                                 <div class="form-group">
                                      <label for="exampleInputEmail1">JRP Account No.</label>                    
                                          <div>
                                                  <select name="jrp_acc_no" style="width: 100%;"  tabindex="-1" aria-hidden="true" onchange="getval(this);">                   
                                                        <?php                                            
                                                            include("../model/connect.php");
                                                            $tp=$_REQUEST['tp']; 
                                                            $results_customer = mysqli_query($con, "SELECT * FROM `bv_customer`");                                                
                                                            while ($row_customer = mysqli_fetch_array($results_customer))                       
                                                              {         
                                                                $jrp_account_no = $row_customer['jrp_account_no'];                                      
                                                                ?>                         
                                                                <option value="<?php echo $jrp_account_no;?>"><?php echo $jrp_account_no;?></option>
                                                                <?php  
                                                              }                     
                                                                  $results_customer1 = mysqli_query($con, "SELECT * FROM `bv_customer` where jrp_account_no ='$tp' ");
                                                                  $row_customer1 = mysqli_fetch_array($results_customer1); 
                                                                      $jrp_account_no = $row_customer1['jrp_account_no']; 
                                                                      $customer_name = $row_customer1['customer_name'];
                                                                      $company_name = $row_customer1['company_name'];
                                                                      $address1 = $row_customer1['address1'];
                                                                      $address2 = $row_customer1['address2'];
                                                                      $city = $row_customer1['city'];
                                                                      $state = $row_customer1['state'];
                                                                      $postal_code1 = $row_customer1['postal_code'];
                                                                      $postal_code = preg_replace('/\s+/', '', $postal_code1);
                                                                      $customer_name = $row_customer1['customer_name'];
                                                                      $email = $row_customer1['email'];
                                                                      $contact_no = $row_customer1['contact_no'];  
                                                                      $jrp_account_no_renamed = preg_replace('/[^A-Za-z0-9\-]/', '', $jrp_account_no);             
                                                                ?>                    
                                                        <option value="<?php echo $tp;?>" selected="selected"><?php echo $tp;?></option> 
                                                    </select>
                                              </div>
                                        </div>
                                <div class="form-group">
                                    <label>AddressLine1</label>
                                    <input name="addressline1" value="<?php echo $address1;?>" id="addressline1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>AddressLine2</label>
                                    <input name="addressline2" value="<?php echo $address2;?>" id="addressline2" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>Province Code</label>
                                        <input name="province" value="<?php echo $state;?>" id="province" type="text" class="form-control" required>
                                        <!-- <select class="custom-select" name="province" required>
                                        <option value="" selected>Select Option</option>
                                        <option value="AB">Alberta</option>
                                        <option value="BC">British Columbia</option>
                                        <option value="MB">Manitoba</option>
                                        <option value="NB">New Brunswick</option>
                                        <option value="NF">Newfoundland</option>
                                        <option value="NT">Northwest Territories</option>
                                        <option value="NS">Nova Scotia</option>
                                        <option value="NU">Nunavut</option>
                                        <option value="ON">Ontario</option>
                                        <option value="PE">Prince Edward Island</option>
                                        <option value="QC">Quebec</option>
                                        <option value="SK">Saskatchewan</option>
                                        <option value="YT">Yukon Territory</option>
                                        </select>  -->
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" value="<?php echo $city;?>" id="city" type="text" class="form-control" required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input name="postalCode" value="<?php echo $postal_code;?>" id="postalCode" type="text" class="form-control" required> * eg. H9P2T7.
                                    </div>
                                    <div class="form-group">
                                        <label>Country Code</label>
                                        <input name="countryCode" value="CA"  id="countryCode" type="text" class="form-control"  required>* eg. CA.
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name</label>
                                        <input name="customerName" value="<?php echo $company_name;?>" id="customerName" type="text" class="form-control" required>
                                    </div>
                                    
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Consignee Contact</h3>
                                    </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input name="fullName" value="<?php echo $customer_name;?>" id="fullName" type="text" class="form-control" maxlength="30" required>
                                            </div>
                                            <div class="form-group">
                                                <label>e-mail</label>
                                                <input name="email" value="<?php echo $email;?>" id="email" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input name="department" value="none" id="department" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input name="telephone" value="<?php echo $contact_no;?>" id="telephone" type="text" class="form-control" required>
                                            </div>
                                    <!-- sender end =========================================== -->                                                 
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-button">Submit</button>
                                    </div>
              </form>                                       
          </div>
        </div>
       <!-- form ends -->  
      </div><!-- /.container-fluid -->        
          <div class="col-12">                     
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Consignee Information Table</h3>
              </div>
              <div>       
          </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL</th>                    
                    <th>Full Name</th>
                    <th>Address1</th>
                    <th>Address2</th>
                    <th>City</th>
                    <th>Province Code</th>
                    <th>Postal Code</th>
                    <th>Country Code</th>
                    <th>Customer Name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Phone</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include ("../model/connect.php");
                    $result = mysqli_query($con, "SELECT * FROM `consignee`");
                    $count = 0;
                    while ($row = mysqli_fetch_array($result))
                    {                 
                    $count = $count + 1;
                    $consignee_id = $row['consignee_id'];
                    $addressLine1 = $row['addressLine1'];
                    $addressLine2 = $row['addressLine2'];
                    $province = $row['province'];
                    $city = $row['city'];
                    $postalCode = $row['postalCode'];
                    $countryCode = $row['countryCode'];
                    $customerName = $row['customerName'];
                    $fullName = $row['fullName'];
                    $email = $row['email'];
                    $department = $row['department'];
                    $telephone = $row['telephone'];
                    $date = $row['date'];                                         
                    ?>
                      <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $fullName;?></td>
                      <td><?php echo $addressLine1;?></td>
                      <td><?php echo $addressLine2;?></td>
                      <td><?php echo $city;?></td>
                      <td><?php echo $province;?></td>
                      <td><?php echo $postalCode;?></td>
                      <td><?php echo $countryCode;?></td>
                      <td><?php echo $customerName;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php echo $department;?></td>
                      <td><?php echo $telephone;?></td>
                      </tr>
                      <?php
                      }
                      ?>                                 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>SL</th>
                      <th>Full Name</th>
                      <th>Address1</th>
                      <th>Address2</th>
                      <th>City</th>
                      <th>Province Code</th>
                      <th>Postal Code</th>
                      <th>Country Code</th>
                      <th>Customer Name</th>
                      <th>e-mail</th>
                      <th>Department</th>
                      <th>Phone</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
      <!-- table ends -->  
      </div><!-- /.container-fluid -->
    </section>


    
   