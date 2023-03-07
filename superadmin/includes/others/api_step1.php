<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- form start -->

        <div class="col-md-6">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Shippment Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->  
              <?php             
                                $OrderNumber1 = $_REQUEST['OrderNumber'];
                                include_once '../model/config.php';            
                                $order = "SALES_ORDER_HEADER";
                                $address = "ORDER_ADDRESS";
                                $result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
                                $order .CUST_NO AS jrp_account_no,
                                $address.NAME AS CustomerName,
                                $address.BVADDR1 AS Address1,
                                $address.BVADDR2 AS Address2,
                                $address.BVCITY AS City,
                                $address .BVPROVSTATE AS Province,
                                $address.BVPOSTALCODE AS PostalCode,
                                $address.BVCOCONTACT1NAME AS Contact, 
                                $address.BVADDRTELNO1 AS Phone, 
                                $address.BVADDREMAIL AS Email,
                                replace($address .BVPOSTALCODE , ' ','') AS PostalCode
                                FROM $order $order LEFT OUTER JOIN 
                                $address $address ON $order .BVADDR_CEV_NO_2 = $address .CEV_NO
                                WHERE $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S' AND $order.BVADDR_CEV_NO_2 NOT LIKE 'Q%' AND ORDER_ADDRESS .BVCOUNTRYCODE = 'CDN' AND $order.BVADDR_CEV_NO_2 = '$OrderNumber1'");
                                $counter=0;
                                $row = @odbc_fetch_array($result);
                                      // //$str = "a'string";
                                      // htmlentities($row['CustomerName'],ENT_QUOTES);                                //OUTPUT a&#039;string
                                      // $CustomerName = html_entity_decode(htmlentities(json_encode($row['CustomerName']),ENT_QUOTES),ENT_QUOTES);
                                      $jrp_account_no = trim($row['jrp_account_no']);
                                      $CustomerName1 = $row['CustomerName'];
                                      $CustomerName = mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1");
                                      $Address1 = mb_convert_encoding($row['Address1'], "UTF-8", "iso-8859-1");
                                      $Address2 = mb_convert_encoding($row['Address2'], "UTF-8", "iso-8859-1");
                                      $City = mb_convert_encoding($row['City'], "UTF-8", "iso-8859-1");
                                      $Contact = mb_convert_encoding($row['Contact'], "UTF-8", "iso-8859-1");
                                      $Email = mb_convert_encoding($row['Email'], "UTF-8", "iso-8859-1");
                                      //$CustomerName = $row['CustomerName'];
                                      
                                      ?>
               <form method=post action="../model/consignee_list.php" id="myForm1">
               <div class="card card-body">    
                                 <!-- sender start =========================================== -->
                                 <div class="form-group">
                                      <label for="exampleInputEmail1">JRP Account No.</label>                    
                                          <div>
                                          <input name="jrp_account_no" value="<?php echo $jrp_account_no;?>" id="jrp_account_no" type="text" class="form-control" readonly>
                                              </div>
                                        </div>
                               
                                    <!-- sender end =========================================== -->                                                 
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary submit-button">Submit</button>
                                    </div>
              </form>
              
      </div>
    </div>
  </div>
</div>
     <!-- form ends -->  
      </div><!-- /.container-fluid -->
    </section>


    
   