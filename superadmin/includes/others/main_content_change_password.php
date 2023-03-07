<section class="content">
      <div class="container-fluid">
        <div class="col-md-6">
          <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Reset Staff Password</h3>
              </div>
              <?php
                  include ("../model/connect.php");
                  $user_id1 = $_REQUEST['user_id1']; 
               ?>                   

               <form role="form" method="post" action="../model/change_password.php" id="myForm1" class="needs-validation" novalidate>
               <input name = "user_id1" type="hidden" value="<?php echo $user_id1;?>" > 
               <div class="card-body">
                <!-- <div class="form-group">
            Field1<input type="text" class="form-control" pattern="^[a-z]{2,4}$" required autofocus>
            <div class="valid-feedback">Valid</div>
            <div class="invalid-feedback">a to z only (2 to 4 long)</div>
          </div> -->
          <div class="form-group">
            Password<input type="text" id="pwdId" name="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            
            <div class="invalid-feedback">** at least one number and one uppercase and lowercase letter, and at least 8 or more characters</div>
            <div class="valid-feedback">Valid</div>
          </div>
          <div class="form-group">
            Confirm Password<input type="text" id="cPwdId" class="form-control pwds">
            <div id="cPwdValid" class="valid-feedback">Valid</div>
            <!-- <div id="cPwdInvalid" class="invalid-feedback">a to z only (2 to 4 long)</div> -->
          </div>
          <div class="form-group">
            <button id="submitBtn" type="submit" class="btn btn-primary submit-button" disabled>Submit</button>
          </div>
              
            </div></form>
          </div>     
      </div>



      





    </section>
   
   