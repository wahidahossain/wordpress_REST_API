<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Staff Information & Login Access</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->               
               <form method=post action="../model/add_new_staff.php" id="myForm1" class="needs-validation" novalidate>
               <div class="card card-body">
                  
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>             
                    <!-- <input type="text" value=""   name="first_name" class="form-control" id="exampleInputEmail1" placeholder="Enter first name" pattern="^[a-z]{2,15}$" required autofocus> -->
                    <input name="first_name" id="fisrtNameId" type="text" class="form-control" required autofocus>
                    

                  </div>
                  <div class="form-group">
                    <label>Last Name</label>
                    <!-- <input type="text" value=""  name="last_name" class="form-control" id="exampleInputEmail1" placeholder="Enter last name"> -->
                    <input name="last_name" id="lastNameId" type="text" class="form-control"  required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <!-- <input type="email" value="" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email address"> -->
                    <input type="email" name="email" id="emailId" class="form-control"  required>
                    <div class="valid-feedback">Valid</div>
                    <div class="invalid-feedback">Not a valid email address</div>
                  </div>  
                <div class="card-header">
                  <h3 class="card-title">Staff Login Access</h3>
                </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter login username" required>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter login Password">
                  </div> -->

                  <div class="form-group">
            Password<input type="text" id="pwdId" name="password" class="form-control pwds" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            
            <div class="invalid-feedback">** at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
            <div class="valid-feedback">Valid</div>
          </div>
          <div class="form-group">
            Confirm Password<input type="text" id="cPwdId" class="form-control pwds">
            
            <!-- <div id="cPwdInvalid" class="invalid-feedback">a to z only (2 to 4 long)</div> -->
            <div id="cPwdValid" class="valid-feedback">Valid</div>
          </div>
          <div class="form-group">
            <button id="submitBtn" type="submit" class="btn btn-primary submit-button" disabled>Submit</button>
          </div>
                
              </form>
              
      </div>
    </div>
  </div>
</div>





<div class="container-fluid">
        <div class="row">
          <div class="col-12">
                     
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">JRP Staff Information Table</h3>
              </div>
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>SL</th>                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Account Status</th>
                    <th>Logcount</th>
                    <th>Last Login</th>
                    <!-- <th>IP</th> -->
                    <th>Account Type</th>
                    <th>Access</th>
                    <th style="display:none;">Operations</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                include ("../model/connect.php");

                //$result = mysqli_query($con, "SELECT * FROM `user` where account_type!='superadmin'");
                $result = mysqli_query($con, "SELECT * FROM `user`");

                $count = 0;
                while ($row = mysqli_fetch_array($result))
                {
                    $count = $count + 1;
                    $user_id1 = $row['user_id'];
                    $first_name = $row['first_name'];
                    $last_name = $row['last_name'];
                    $username = $row['username'];
                    $password = $row['password'];
                    $email = $row['email'];
                    $account_status = $row['account_status'];
                    $logcount = $row['logcount'];
                    $last_login = $row['last_login'];
                    $ip = $row['ip'];
                    $account_type1 = $row['account_type'];
                    $user_excol1 = $row['user_excol1'];  
                    $user_excol2 = $row['user_excol2'];  
                                        
                    ?>

                      <tr>
                      <td><?php echo $count;?></td>
                      <td><?php echo $first_name;?></td>
                      <td><?php echo $last_name;?></td>
                      <td><?php echo $username;?></td>
                      <td><?php echo $email;?></td>
                      <td><?php
                      if($account_status==1){
                        echo "Active";
                      }
                      else{
                        echo "Inactive";
                      }
                      //echo $account_status;?></td>
                      <td><?php echo $logcount;?></td>
                      <td><?php echo $last_login;?></td>
                      <!-- <td><?php echo $ip;?></td> -->
                      <td><?php echo $account_type1;?></td>
                      <td><?php echo $user_excol1;?></td>
                      
                      <td class="d-print-none">
                      <?php
                      if($account_type1!='superadmin'){
                      ?><a href="change_password.php?user_id1=<?php echo $user_id1;?>"><i class="fa fa-edit fa-fw"></i>Reset</a>
                        &nbsp;&nbsp;<a href="../model/delete_user.php?user_id1=<?php echo $user_id1;?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-eraser fa-fw"></i>Delete</a>
                        &nbsp;&nbsp;<a href="../model/block_user.php?user_id1=<?php echo $user_id1;?>&user_excol1=<?php echo $user_excol1;?>" onclick="return confirm('Are you sure you want to un/block this account?')"><i class="fa fa-window-close fa-fw"></i>Un/Block</a>
                      <?php }
                      else {
                        
                        ?><a href="change_password.php?user_id1=<?php echo $user_id1;?>"><i class="fa fa-edit fa-fw"></i>Reset</a>                                            
                     <?php } ?>
                          
                      </td>
                      </tr>
                      <?php
                      }
                      ?>                                 
                  </tbody>
                  <tfoot>
                  <tr>
                  <th>SL</th>                    
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Account Status</th>
                    <th>Logcount</th>
                    <th>Last Login</th>
                    <!-- <th>IP</th> -->
                    <th>Account Type</th>
                    <th>Access</th>
                    <th>Operations</th>
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
     <!-- form ends -->  
      </div><!-- /.container-fluid -->
      
    </section>


    
   