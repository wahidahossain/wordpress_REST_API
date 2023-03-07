<section class="content">
    <div class="container-fluid">
        <div class="col-md-12">
          <div class="card card-primary">
          <?php
          //include("includes/gls_links.php");
          ?>

                  <div class="card-header">
                 
                          <h3 class="card-title">GLS Shipping Records</h3>
                  </div>
              <div class="card-body">
              <button onclick="history.go(-1);" class="btn bg-gradient-warning btn-flat btn-xs">Back</button> 
              <a href="shipping_list.php"><h3 class="float-right badge bg-danger">>> Go To All Shipment List</h3></a>
                <!-- <a href="shipping_list.php">Go To All Shipment List</a> -->
                    <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Type</th>
                                    <th>OrderNumber</th>
                                    <th>Customer Name</th>
                                    <th>Address1</th>
                                    <th>Address2</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>PostalCode</th>
                                    <th>Contact</th>
                                    <th>Phone</th>
                                    <th>Email</th>            
                                  </tr>
                                </thead>
                              <tbody>
                              <?php  
                              //$address $address ON $order .BVADDR_CEV_NO_2 = $address .CEV_NO           
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
                                
                                $address $address ON $order .BVADDR_CEV_NO = $address .CEV_NO
                                WHERE $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S' AND $order.BVADDR_CEV_NO_2 NOT LIKE 'Q%' AND ORDER_ADDRESS .BVCOUNTRYCODE = 'CDN'");
                                $counter=0;
                                while($row = @odbc_fetch_array($result))
                                    {  
                                      // //$str = "a'string";
                                      // htmlentities($row['CustomerName'],ENT_QUOTES);                                //OUTPUT a&#039;string
                                      // $CustomerName = html_entity_decode(htmlentities(json_encode($row['CustomerName']),ENT_QUOTES),ENT_QUOTES);
                                      $CustomerName1 = trim($row['CustomerName']);
                                      $jrp_account_no = trim($row['jrp_account_no']);
                                      $OrderNumber = trim($row['OrderNumber']);
                                      $CustomerName = mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1");
                                      $Address1 = mb_convert_encoding($row['Address1'], "UTF-8", "iso-8859-1");
                                      $Address2 = mb_convert_encoding($row['Address2'], "UTF-8", "iso-8859-1");
                                      $City = mb_convert_encoding($row['City'], "UTF-8", "iso-8859-1");
                                      $Contact = mb_convert_encoding($row['Contact'], "UTF-8", "iso-8859-1");
                                      
                                      $Email_rl = mb_convert_encoding($row['Email'], "UTF-8", "iso-8859-1");
                                      //eliminate extra e-mails, keeps only first one------------------                                                                            
                                      $keywords = preg_split('/[;]/', $Email_rl,-1, PREG_SPLIT_NO_EMPTY);
                                      $Email = $keywords[0];
                                      //end of eliminate extra e-mails, keeps only first one-----------
                                      $Province = trim($row['Province']);
                                      $PostalCode = trim($row['PostalCode']);
                                      $Phone = trim($row['Phone']);
                                      //$CustomerName = $row['CustomerName'];

                                ?>    <tr>
                                      <td><?php echo $counter; ?></td>
                                      <td><a href="add_new_parcel.php?OrderNumber=<?php echo $OrderNumber;?>&jrp_account_no=<?php echo $row['jrp_account_no'];?>">Parcel</a> / 
                                          <a href="add_new_freight.php?OrderNumber=<?php echo $OrderNumber;?>&jrp_account_no=<?php echo $row['jrp_account_no'];?>">Freight</a> </td>
                                      <td><!--<a href="api_step1.php?OrderNumber=<?php //echo $OrderNumber;?>&jrp_account_no=<?php //echo $row['jrp_account_no'];?>">--><?php echo $row['OrderNumber']; ?><!--</a>--></td>
                                      <td><?php echo $CustomerName; ?></td>
                                      <td><?php echo $Address1; ?></td>
                                      <td><?php echo $Address2; ?></td>
                                      <td><?php echo $City; ?></td>
                                      <td><?php echo $Province; ?></td>
                                      <td><?php echo $PostalCode; ?></td>
                                      <td><?php echo $Contact; ?></td>
                                      <td><?php echo $Phone; ?></td>
                                      <td><?php echo $Email; ?></td>         
                                    </tr>
                              <?php 
                              $counter++;    
                            } 
                              ?>
                          </tbody>
                  </table>
                </div>
            </div>  
        </div>     
    </div>
  </section>
   