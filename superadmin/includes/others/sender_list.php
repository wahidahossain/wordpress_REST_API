<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Sender Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/sender_list.php" id="myForm1">
               <div class="card card-body">    
                                 <!-- sender start =========================================== -->
                                <div class="form-group">
                                    <label>AddressLine1</label>
                                    <input name="addressline1" id="addressline1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                        <label>Province Code</label>
                                        <select class="custom-select" name="province">
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
                                        </select>                                     
                                    <div class="form-group">
                                        <label>City</label>
                                        <input name="city" id="city" type="text" class="form-control"  required>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input name="postalCode" id="postalCode" type="text" class="form-control"  required> * eg. H9P2T7.
                                    </div>
                                    <div class="form-group">
                                        <label>Country Code</label>
                                        <input name="countryCode" id="countryCode" type="text" class="form-control"  required>* eg. CA.
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="customerName" id="customerName" type="text" class="form-control"  required>
                                    </div>
                                    
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Sender Contact</h3>
                                    </div>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input name="fullName" id="fullName" type="text" class="form-control" maxlength="30" required>
                                            </div>
                                            <div class="form-group">
                                                <label>e-mail</label>
                                                <input name="email" id="email" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input name="department" id="department" type="text" class="form-control"  required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input name="telephone" id="telephone" type="text" class="form-control"  required>
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
                <h3 class="card-title">Sender Information Table</h3>
              </div>
              <div>       
        </div>
              <div class="card-body">


                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>SL</th>                    
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province Code</th>
                    <th>Postal Code</th>
                    <th>Country Code</th>
                    <th>Customer Name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                include ("../model/connect.php");

                //$result = mysqli_query($con, "SELECT * FROM `user` where account_type!='superadmin'");
                $result = mysqli_query($con, "SELECT * FROM `sender`");

                $count = 0;
                while ($row = mysqli_fetch_array($result))
                {
                 
                    $count = $count + 1;
                    $sender_id = $row['sender_id'];
                    $addressLine1 = $row['addressline1'];
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
                      <form method=post action="../model/update_sender_list.php" id="myForm1">    
                      <td><?php echo $count;?></td>
                      <td><input name="sender_id" id="sender_id" value="<?php echo $sender_id;?>" type="hidden" class="form-control">
                          <input name="fullName" id="fullName" value="<?php echo $fullName;?>" type="text" class="form-control"></td>
                      <td><input name="addressLine1" id="addressLine1" value="<?php echo $addressLine1;?>" type="text" class="form-control"></td>
                      <td><input name="city" id="city" value="<?php echo $city;?>" type="text" class="form-control"></td>
                      <td><input name="province" id="province" value="<?php echo $province;?>" type="text" class="form-control"></td>
                      <td><input name="postalCode" id="postalCode" value="<?php echo $postalCode;?>" type="text" class="form-control"></td>
                      <td><input name="countryCode" id="countryCode" value="<?php echo $countryCode;?>" type="text" class="form-control"></td>
                      <td><input name="customerName" id="customerName" value="<?php echo $customerName;?>" type="text" class="form-control"></td>
                      <td><input name="email" id="email" value="<?php echo $email;?>" type="text" class="form-control"></td>
                      <td><input name="department" id="department" value="<?php echo $department;?>" type="text" class="form-control"></td>
                      <td><input name="telephone" id="telephone" value="<?php echo $telephone;?>" type="text" class="form-control"></td>
                      <td><button type="submit" class="btn btn-block btn-info btn-xs">>></button></td>  
                    </form>
                      </tr>
                      <?php
                      }
                      ?>                                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>SL</th>                    
                    <th>Full Name</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province Code</th>
                    <th>Postal Code</th>
                    <th>Country Code</th>
                    <th>Customer Name</th>
                    <th>e-mail</th>
                    <th>Department</th>
                    <th>Phone</th>
                    <th></th>
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


    
   