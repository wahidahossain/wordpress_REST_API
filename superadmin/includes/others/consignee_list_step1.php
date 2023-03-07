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
              <form name=form1 method=post action="consignee_list.php" onSubmit="return validate();" id="myForm1" class="needs-validation" novalidate>
                <div class="card-body">
                <a href="add_new_customer.php" name="Add New" class="btn btn-primary" class="col-md-3">Add New</a>
                <div class="form-group">
                 
                    <label for="exampleInputEmail1">JRP Account No.</label>
                    <div>
                    <select name="type" style="width: 100%;"  tabindex="-1" aria-hidden="true" required onchange="getval(this);">
                    <option selected value="">Select a Client Account</option>

                    <?php
                        //----------------------- Search and fetch from bv---------------------                        
                        include("../model/bv_connect.php");
                        include("../model/connect.php");
                        //--------------------- BV CUSTOMER Table -----------------------------
                        $tp='0';                       
                          $results_customer = mysqli_query($con, "SELECT `customer_name`, `jrp_account_no` FROM `bv_customer`");                                                                                                                          
                        while ($row_customer = mysqli_fetch_array($results_customer))
                    {         $NAME = $row_customer['customer_name'];
                              $CUS_NO = $row_customer['jrp_account_no'];
                    ?> 
                        <option value="<?php echo $CUS_NO;?>" ><?php echo $CUS_NO;?></option> 
                    <?php
                    }               
                    ?>
                    </select>
                    
                  </div>

                  </div>
                 
      </div>
    </section>


    
   