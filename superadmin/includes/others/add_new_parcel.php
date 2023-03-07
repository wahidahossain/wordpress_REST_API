<!-- Main content -->
<?php
error_reporting(0);
$OrderNumber = $_REQUEST['OrderNumber'];
$jrp_account_no = $_REQUEST['jrp_account_no'];
?>
<section class="content">
    <div class="container-fluid">  
    <button onclick="history.go(-1);" class="btn bg-gradient-warning btn-flat btn-xs">Back</button>       
        <div class="row">            
            <div class="col-md-4">
                <!-- <a href="add_new_parcel.php" name="Add New" class="btn btn-primary">Parcel</a> <a href="add_new_freight.php" name="Add New" class="btn btn-primary">Freight</a><br />
                <a href="shipping_list.php">>> Go to Shipping Records</a> -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Shipment : Parcel</h3>
                    </div>
                    <form method=post action="../model/add_new_shipment.php" id="myForm1" class="needs-validation">
                        <div class="card card-body">
                            <h3 class="card-title text-primary">ORDER No.: <?php echo $OrderNumber;?></h3> 
                            <div class="form-group">
                                        <label>Billing Account</label>
                                        <select class="custom-select" name="billing_account_id" required onchange="getval(this);">
                                         
                                         <?php                                            
                                         include("../model/connect.php");
                                         $tp=$_REQUEST['tp'];
                                         if (isset($tp)) {
                                            $results_biilwithtp = mysqli_query($con, "SELECT * FROM `billing_account` where `flag` = '1' and `category`='Parcel' and `billing_account_id`='$tp'");
                                            $row_customer = mysqli_fetch_array($results_biilwithtp);
                                            $billing_account_id_tp = $row_customer['billing_account_id'];
                                            $billing_account_tp = $row_customer['billing_account'];
                                            $note_tp = $row_customer['note']; 
                                            ?>
                                            <option value="<?php echo $billing_account_id_tp;?>"><?php echo $billing_account_tp;?> : <?php echo $note_tp;?></option>
                                            <?php
                                        $results_biilwithouttp = mysqli_query($con, "SELECT * FROM `billing_account` where `flag` = '1' and `category`='Parcel' and `billing_account_id` != '$tp'");
                                        while ($row_customer = mysqli_fetch_array($results_biilwithouttp)) {
                                            $billing_account_id_wtp = $row_customer['billing_account_id'];
                                            $billing_account_wtp = $row_customer['billing_account'];
                                            $note_wtp = $row_customer['note'];
                                            ?>                         
                                       <option value="<?php echo $billing_account_id_wtp; ?>"><?php echo $billing_account_wtp; ?> : <?php echo $note_wtp; ?></option>
                                       <?php
                                        }                               
                                        } else {
                                            ?>
                                            <option value="" selected>Select Option</option>
                                            <?php
                                             $results_customer = mysqli_query($con, "SELECT * FROM `billing_account` where `flag` = '1' and `category`='Parcel'");
                                             while ($row_customer = mysqli_fetch_array($results_customer)) {
                                                 $billing_account_id = $row_customer['billing_account_id'];
                                                 $billing_account = $row_customer['billing_account'];
                                                 $note = $row_customer['note'];
                                                 ?>                         
                                            <option value="<?php echo $billing_account_id; ?>"><?php echo $billing_account; ?> : <?php echo $note; ?></option>
                                            <?php
                                             }
                                         }                                                  
                                            ?> 
                                        </select>
                                    </div>
                        
                                    <div class="form-group">
                                    <label>Sender</label>
                                    <select class="custom-select" name="sender_id" required>
                                        <!-- <option value="">Select Option</option> -->
                                        <?php                                            
                                            include("../model/connect.php");
                                           
                                            //$results_customer = mysqli_query($con, "SELECT * FROM `sender`");
                                        if (isset($tp)) {
                                            $results_tp = mysqli_query($con, "SELECT `sender_id` FROM `billing_account` WHERE `billing_account_id` = '$tp'");
                                            $row_tp = mysqli_fetch_array($results_tp);
                                            $sender_id11 = $row_tp['sender_id'];
                                            $results_sender = mysqli_query($con, "SELECT * FROM `sender` where `sender_id` = '$sender_id11'");

                                        } else {
                                            $results_sender = mysqli_query($con, "SELECT * FROM `sender`");
                                        }                                          
                                            while($row_customer = mysqli_fetch_array($results_sender)) {
                                                $sender_id = $row_customer['sender_id'];
                                                $fullName = $row_customer['fullName'];
                                                $province = $row_customer['province'];
                                                $postalCode = $row_customer['postalCode'];
                                                ?>                         
                                        <option value="<?php echo $sender_id; ?>"><?php echo $fullName; ?>, <?php echo $province; ?>, <?php echo $postalCode; ?></option>
                                        <?php
                                            }                                                                                          
                                        ?> 
                                    </select>
                                </div>                                
                                <label>Return Address</label>
                                    <select class="custom-select" name="return_id">
                                        <!-- <option value="" selected>Select Option</option> -->
                                        <?php                                            
                                            include("../model/connect.php");  
                                            if (isset($tp)) {
                                                $results_return_tp = mysqli_query($con, "SELECT `return_id` FROM `billing_account` WHERE `billing_account_id` = '$tp'");
                                                $row_return_tp = mysqli_fetch_array($results_return_tp);
                                                $return_id11 = $row_return_tp['return_id'];
                                                $results_return = mysqli_query($con, "SELECT * FROM `return` WHERE `return_id` = '$return_id11'");
    
                                            } else {
                                                $results_return = mysqli_query($con, "SELECT * FROM `return`");
                                            }                                                                                       
                                            while ($row_return = mysqli_fetch_array($results_return))                       
                                                {         
                                                    $return_id = $row_return['return_id'];
                                                    $fullName = $row_return['fullName'];
                                                    $province = $row_return['province'];
                                                    $postalCode = $row_return['postalCode'];                                      
                                                        ?>                         
                                        <option value="<?php echo $return_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                        <?php  
                                            }                                                   
                                        ?> 
                                        </select>                    

                            <div class="form-group" style='display:none;'>
                                <label for="exampleInputEmail1">Division</label>             
                                <select class="custom-select" name="division" id='division' onchange='cDivision()' required>
                                    <option value="" >Select Option</option>
                                    <option value="Express" selected>Express</option>
                                    <!-- <option value="Freight">Freight</option> -->
                                </select>                   
                            </div>                           
                            <div class="" id='dRequestReturnLabel'>                           
                                <div class="form-group">
                                    <label>Request Return Label</label>
                                    <select class="custom-select" name="requestReturnLabel" id='requestReturnLabel1' onchange='returnLabel()' required>
                                    <option value="" >Select Option</option>
                                    <option value="true">Yes</option>
                                    <option value="false" selected>No</option>                                        
                                    </select>
                                </div>
                                <script>
                                    function returnLabel() {
                                    selectedVal6 = document.getElementById('requestReturnLabel1').value;
                                    if((selectedVal6 == 'true'))
                                    {   
                                    $("#yes_requestReturnLabel").show();
                                    //$("#no_requestReturnLabel").hide();
                                    }
                                    else
                                    {
                                    $("#yes_requestReturnLabel").hide();
                                    // $("#no").show();
                                    }
                                    }
                                </script>

                               <div class="card card-body" id='yes_requestReturnLabel' style='display:none;'> 
                                    <div class="form-group">
                                        <label>Return Way Bill number</label>
                                        <input name="returnWaybill" id="returnWaybill" type="text" class="form-control"> <small><code>e.g. B1234568</code></small>
                                        <!-- (Required: If requestReturnLabel = true) -->
                                    </div>
                                </div>
                        </div>

                                <label>Invoice Code</label>
                                <input type="text" name="references_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Invoice number" required>
                            </div>

                                <div class="form-group" style='display:none;'>
                                    <label for="exampleInputEmail1">Category</label>             
                                        <!-- <select class="custom-select" name="category" id='s_category' onchange='scategory()' required> -->
                                        <select class="custom-select" name="category"  id='s_category' required>
                                        <option value="">Select Option</option>
                                        <option value="Parcel" selected>Parcel</option>
                                            <!-- <option value="Freight">Freight</option> -->
                                        </select>                   
                                </div>

                                <div class="form-group" style='display:none;'>
                                    <label for="exampleInputEmail1">Payment Type</label>             
                                    <select class="custom-select" name="paymentType" required>
                                    <option value="">Select Option</option>
                                    <option value="Prepaid" selected>Prepaid</option>
                                    <option value="ThirdParty">ThirdParty</option>
                                    <option value="Collect">Collect</option>
                                    </select>                                                                     
                                </div> 
                                <div class="form-group" style="padding:0px 4px 0px 6px;">
                                    <label>Unit Of Measurement</label>
                                    <select class="custom-select" name="unitOfMeasurement" required>
                                        <!-- <option value="K" >K</option>
                                        <option value="L">L</option> -->
                                        <option value="LI" selected>lb | inch</option>
                                        <option value="LF">lb | feet</option>
                                        <option value="KC">kg | cm</option>
                                        <option value="KM">kg | meter</option>
                                        
                                    </select>
                                </div>                                                  
                                <a href="../model/unitOfMeasurement.php" target="_blank">* Ref. Link</a>
                                <div class="form-group">
                                    <!-- <label>Parcel Category</label> -->
                                    <select class="custom-select" name="parcel_category" style='display:none;' id='select_category' onchange='populateField()' required>
                                        <option value="">Select Option</option>
                                        <!-- <option value="Freight" >Freight</option> -->
                                        <option value="Parcel" selected>Parcel Canada</option>                                        
                                    </select>

                                    

                                    <div id='parcel_canada' style="padding:0px 4px 0px 6px;">
                                        <!-- parcel_canada ==============CLICK EVENT======== -->
                                        <label style="padding:0px 0px 0px 5px;">Parcel Type</label> 
                                        <select class="custom-select" name="parcelTypeParcelCanada" required>
                                            <option value="">Select Option</option>
                                            <option value="Box" selected>Box</option>                                       
                                            <option value="Envelope">Envelope</option>
                                            <!-- <option value="Other">Other</option>
                                            <option value="Mixed">Mixed</option> -->
                                        </select>
                                    </div>                                          
                                </div>                                        
                                <div class="form-group">
                                    <!--<label style="padding:0px 0px 0px 5px;">Quantity</label>
                                    <input name="quantity" id="quantity" type="number" class="" size="8" oninput="this.value = Math.round(this.value);" required>
                                    <label>Weight</label>
                                    <input name="weight" type=number step=0.01 id="weight" class="" size="8" required> <br />
                                    <label style="padding:3px 16px 4px 5px;">Length</label>
                                    <input name="length" id="length" type=number step=0.01 class="" size="8" required>
                                    <label style="padding:3px 1px 4px 5px;">Depth</label>
                                    <input name="depth" id="depth" type=number step=0.01 class="" size="8"  required><br />
                                    <label style="padding: 4px 22px 2px 6px;">Width</label> 
                                    <input name="width" id="width" type=number step=0.01 class="" size="8"  required>
                                -->
                                <table class="card" style="padding:5px 3px 5px 2px;">
                                    <tr>
                                        <td width="69">Quantity</td>
                                        <td width="118"><input name="quantity" id="quantity" type="number" class="" size="5" oninput="this.value = Math.round(this.value);" required></td>
                                        <td width="50">Weight</td>
                                        <td width="115"><input name="weight" type=number step=0.01 id="weight" class="" size="5" required></td>
                                    </tr>
                                    <tr>
                                        <td>Length</td>
                                        <td><input name="length" id="length" type=number step=0.01 class="" size="5" required></td>
                                        <td>Depth</td>
                                        <td><input name="depth" id="depth" type=number step=0.01 class="" size="5"  required></td>
                                    </tr>
                                    <tr>
                                        <td>Width</td>
                                        <td><input name="width" id="width" type=number step=0.01 class="" size="5"  required></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>                                        
                                    </tr>
                                    </table>
                                    <small style="padding:0px 0px 0px 5px;"><code>NB: If one of the dimension is greater than 8', the other can't go over 8'. The maximum dimension is 640'.</code></small>
                                </div>                                                                                       
                                <div class="form-group" style='display:none;'>
                                    <label>Group Id</label>
                                    <input name="groupId" id="lastNameId" type="text" class="form-control"  value="0" readonly>
                                </div>                                           
                                <div class="form-group" style='display:none;'>
                                    <label>Delivery Type</label>                                    
                                    <select class="custom-select" name="deliveryType" id='deliveryType' onchange='deliverytype()'>
                                        <option value="">Select Option</option>
                                        <option value="GRD" selected>Ground delivery</option>
                                        <option value="AIR">Air delivery</option>                                        
                                    </select>
                                </div>                                
                                
                                <div class="form-group">
                                    <!-- <label>References Type</label> -->
                                    <select class="custom-select" name="preferences" style='display:none;'>
                                        <option value="open_text" selected>Open Text</option> 
                                        <!-- <option value="predefined">predefined</option> -->
                                    </select>                                                  
                                    <!-- <label>References</label>    -->
                                    <select class="custom-select" name="references_type" style='display:none;'>
                                        <option value="INV">INV</option>                                      
                                    </select>                                   
                               
                                    <label style="padding:0px 0px 0px 5px;">Surcharges</label>
                                    <div id='surcharges_type_parcel' style="padding:0px 0px 0px 5px;">
                                        <select class="custom-select" name="surcharges_type_parcel" id='select_surcharges1' onchange='selectSurcharges1()' required>
                                            <option value="">Select Option</option>
                                            <option value="DCV">DCV | Declared Value</option>
                                            <option value="DGG">DGG | Dangerous Goods</option>
                                            <option value="PHD">PHD | Residential Delivery</option>
                                            <option value="TRD">TRD | Tradeshow Delivery</option>
                                            <option value="SNR">SNR | Signature Not Required</option>
                                            <option value="HFP">HFP | Hold For Pickup</option>
                                            <option value="NCV">NCV | Non Conveyable</option>
                                            <option value="PHDS">PHDS | Residential Delivery Signature</option>
                                            <option value="WKD">WKD | Weekend Delivery</option>
                                        </select>
                                    </div>
                                    <a href="../model/surcharges_ref_list.php" target="_blank">* Ref. Link</a>
                                    <script>
                                        function selectSurcharges1() 
                                        {
                                        selectedVal = document.getElementById('select_surcharges1').value;
                                        if(selectedVal == 'DCV') 
                                        {   
                                        $("#surchargesId").show();
                                        //document.getElementById("surcharges_value").required;
                                        }
                                        else
                                        {
                                        $("#surchargesId").hide();
                                        } 
                                        const select_hazmat = document.getElementById('select_hazmat'); // For DGG 
                                        const surcharges_value = document.getElementById('surcharges_value'); // For DCV or COD
                                        const value1 = document.getElementById('select_surcharges1').value;
                                        surcharges_value.required = (value1 == "DCV");
                                        select_hazmat.required = (value1 == "DGG");
                                        }
                                    </script>
                                    <div style='display:none;' id='surchargesId'>
                                        <!-- Required if field is DCV or COD ======================= -->
                                        <label style="padding:0px 0px 0px 5px;">Value</label>
                                        <div class="form-group" style="padding:0px 0px 0px 5px;">
                                            <input name="surcharges_value" id="surcharges_value" type="text" class="form-control">
                                            <small><code>"DCV" has a maximum of 5000$.</code></small>
                                        </div>  
                                        <!-- Required if field is DCV or COD END =================== --> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                                    <div class="card card-body">
                                        <div class="form-group">
                                            <div class="card-header">
                                                <h3 class="card-title text-primary">Consignee Information</h3>
                                            </div>                    
                                            <label for="exampleInputEmail1">JRP Account No.</label>                    
                                            <div>
                                            <input name="jrp_acc_no" value="<?php echo $jrp_account_no;?>" id="jrp_account_no" type="text" class="form-control" required>
                                            <input name="OrderNumber" value="<?php echo $OrderNumber;?>"  type="hidden" class="form-control" required>
                                                    <!-- <select name="jrp_acc_no" style="width: 100%;"  tabindex="-1" aria-hidden="true" onchange="getval(this);">-->
                                                            <?php                                            
                                                           
                                                                        include_once '../model/config.php';            
                                                                        $order = "SALES_ORDER_HEADER";
                                                                        $address = "ORDER_ADDRESS";
                                                                        $result = odbc_exec($connection, "SELECT $order.BVADDR_CEV_NO_2 AS OrderNumber,
                                                                        $order .CUST_NO AS jrp_account_no,
                                                                        $address.NAME AS CustomerName,
                                                                        $address.BVADDR1 AS Address1,
                                                                        $address.BVADDR2 AS Address2,
                                                                        $address.BVCITY AS City,
                                                                        $address.BVPROVSTATE AS Province,
                                                                        $address.BVPOSTALCODE AS PostalCode,
                                                                        $address.BVCOCONTACT1NAME AS Contact, 
                                                                        $address.BVADDRTELNO1 AS Phone, 
                                                                        $address.BVADDREMAIL AS Email,
                                                                        replace($address .BVPOSTALCODE , ' ','') AS PostalCode
                                                                        FROM $order $order LEFT OUTER JOIN                                                                         
                                                                        $address $address ON $order .BVADDR_CEV_NO = $address .CEV_NO
                                                                        WHERE $order.BVADDR_CEV_NO_2='$OrderNumber' AND $order .SHIP_VIA_CODE = '16' AND ORDER_ADDRESS .ADDR_TYPE = 'S'");
                                                                        $counter=0;
                                                                        $row = @odbc_fetch_array($result);  
                                                                        $OrderNumber = trim($row['OrderNumber']);
                                                                            //$CustomerName = mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1");
                                                                            $CustomerName1 = trim($row['CustomerName']);
                                                                            $CustomerName2 = trim(mb_convert_encoding($CustomerName1, "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $CustomerName22 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $CustomerName2);
                                                                            $CustomerName = str_replace("'", '', $CustomerName22);

                                                                            $address11 = trim(mb_convert_encoding($row['Address1'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $address12 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $address11);
                                                                            $address1 = str_replace("'", '', $address12);

                                                                            $address22 = trim(mb_convert_encoding($row['Address2'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $address222 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $address22);
                                                                            $address2 = str_replace("'", '', $address222);

                                                                            $city = trim(mb_convert_encoding($row['City'], "UTF-8", "iso-8859-1"));
                                                                            $contact1 = trim(mb_convert_encoding($row['Contact'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $contact2 = preg_replace('/[^a-zA-Z0-9\']/', ' ', $contact1);
                                                                            $contact = str_replace("'", '', $contact2);

                                                                            $email1 = trim(mb_convert_encoding($row['Email'], "UTF-8", "iso-8859-1"));
                                                                            //removing special characters
                                                                            $email = str_replace("'", '', $email1);

                                                                            //eliminate extra e-mails, keeps only first one------------------                                                                            
                                                                            $keywords = preg_split('/[;]/', $email,-1, PREG_SPLIT_NO_EMPTY);
                                                                            $final = $keywords[0];
                                                                            //end of eliminate extra e-mails, keeps only first one-----------

                                                                            $state = trim($row['Province']);
                                                                            $postal_code = trim($row['PostalCode']);
                                                                            $Phone = trim($row['Phone']);         
                                                                    ?>                    
                                                            
                                                </div>
                                            </div>
                                <div class="form-group">
                                    <label>AddressLine1*</label>
                                    <input name="addressline1" value="<?php echo $address1;?>" id="addressline1" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>AddressLine2</label>
                                    <input name="addressline2" value="<?php echo $address2;?>" id="addressline2" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                        <label>Province Code*</label>
                                        <input name="province" value="<?php echo $state;?>" id="province" type="text" class="form-control" required>                                        
                                    <div class="form-group">
                                        <label>City*</label>
                                        <input name="city" value="<?php echo $city;?>" id="city" type="text" class="form-control" required>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label>Postal Code*</label>
                                        <input name="postalCode" value="<?php echo $postal_code;?>" id="postalCode" type="text" class="form-control" required> <small><code>* e.g. H9P2T7.</code></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Country Code*</label>
                                        <input name="countryCode" value="CA"  id="countryCode" type="text" class="form-control"  required><small><code>* e.g. CA.</code></small>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name*</label>
                                        <input name="customerName" value="<?php echo $CustomerName;?>" oninput="count_title('ctitle')" id="customerName" type="text" maxlength="40" class="form-control" required>
                                        <small><code>Maximum 40 Characters allowed.</code></small>
                                    </div>
                                    
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Consignee Contact</h3>
                                    </div>
                                            <div class="form-group">
                                                <label>Full Name*</label>
                                                <input name="fullName" value="<?php echo $contact;?>" id="fullName" type="text" class="form-control" maxlength="30" required>
                                            </div>
                                            <div class="form-group">
                                                <label>e-mail*</label>
                                                <input name="email" value="<?php echo $final;?>" id="email" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Department</label>
                                                <input name="department" value="none" id="department" type="text" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone*</label>
                                                <input name="telephone" value="<?php echo $Phone;?>" id="telephone" type="text" class="form-control" required>
                                            </div>
                                    <!-- sender end =========================================== -->                                                                                   
                                    </div>
                                </div>

                                <div class="col-md-4">
                                <div class="card card-body">
                                <div class="form-group">
                                    <label>Promocodes</label>
                                    <select class="custom-select" name="promoCodes_status" id='select_promoCodes' onchange='promoCodesField()'>
                                        <option value="">Select Option</option>
                                        <option value="yes">Yes</option>
                                        <option value="no" selected>No</option>
                                    </select>
                                </div>

                        <script>
                            function promoCodesField() {
                            selectedVal = document.getElementById('select_promoCodes').value;
                            if((selectedVal == 'yes'))
                            {   
                            $("#promoCodes").show();
                            }
                            else
                            {
                            $("#promoCodes").hide();
                            }
                            }
                        </script>
                            <div style='display:none;' id='promoCodes'>
                                <!-- Promocodes Onclick start ======================= -->
                                <label>Promo Code</label>
                                <div class="form-group">
                                    <input name="promoCodes" id="code" type="text" class="form-control">
                                </div><br />
                                <!-- Promocodes Onclick End ======================= -->
                            </div> 
                            <!-- Hazmat ============== starts ======== -->
                            <div class="form-group card card-body">
                                <label>Hazmat</label>
                                <select class="custom-select" name="hazmat" id='select_hazmat' onchange='hazmatField()'>
                                <option value="">Select Option</option>
                                <option value="yes" >Yes</option>
                                <option value="no" selected>No</option>                                        
                                </select>
                            </div>
                            <!-- Hazmat ==============CLICK EVENT (if yes)======== --> 
                            <script>
                                function hazmatField() {
                                selectedVal1 = document.getElementById('select_hazmat').value;
                                if((selectedVal1 == 'yes'))
                                {   
                                $("#yes").show();
                                $("#no").hide();
                                }
                                else
                                {
                                $("#yes").hide();
                                $("#no").show();
                                }
                                //making fields required ==========================
                                const select_hazmat_regulation = document.getElementById('select_hazmat_regulation');
                                const value = document.getElementById('select_hazmat').value;
                                select_hazmat_regulation.required = (value == "yes");
                                //phone.required = (value == "Regulated");
                                }
                            </script>
                            <div class="card card-body" style='display:none;' id='yes'>                                            
                                <div class="card-header">
                                    <h3 class="card-title text-primary">Hazmat Details</h3>
                                </div>                                              
                                <div class="form-group">
                                    <label>Hazmat Type</label>
                                    <select class="custom-select" name="h_hazmatType" id='select_hazmat_regulation' onchange='hazmatRegulation()'>
                                        <option value="" selected>Select Option</option>
                                        <option value="Regulated">Regulated</option>
                                        <option value="NonRegulated">NonRegulated</option>                                        
                                    </select>
                                </div>

                                <script>
                                    function hazmatRegulation(){
                                        selectedVal = document.getElementById('select_hazmat_regulation').value;
                                        if((selectedVal == 'Regulated'))
                                        {   
                                            $("#regulated").show();
                                            $("#nonregulated").hide();
                                        }
                                        else
                                        {
                                            $("#regulated").hide();
                                            $("#nonregulated").show();
                                        }
                                        }
                                        </script>

                                    <div class="card card-body" style='display:none;' id='regulated'>
                                        <!-- Hazmat : Regulated ==============CLICK EVENT (if yes)======== -->
                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input name="h_phone" id="h_phone" type="text" class="form-control"  >
                                            <!-- (Required: If hazmatType = Regulated) -->
                                        </div>
                                        <div class="form-group">
                                            <label>Number*</label>
                                            <input name="h_number" id="h_number" type="text" class="form-control"><small><code>e.g. UN1993</code></small>
                                            <!-- (Required: If hazmatType = Regulated) -->
                                        </div>

                                        <div class="form-group">
                                            <label>Shipping Name*</label>
                                            <input name="h_shippingName" id="h_shippingName" type="text" class="form-control"><small><code>e.g. Flammable Liquids</code></small>
                                            <!-- (Required: If hazmatType = Regulated) -->
                                        </div>
                                                    
                                        <div class="form-group">
                                            <label>Primary class of DG</label>
                                            <input name="h_primaryClass" id="primaryClass" type="text" class="form-control"><small><code>e.g. 3</code></small>
                                            <!-- (Required: If hazmatType = Regulated) -->
                                        </div>                                                   

                                        <div class="form-group">
                                            <label>Toxic By Inhalation*</label>                                    
                                                <select class="custom-select" name="h_toxicByInhalation" id="h_toxicByInhalation">
                                                    <option value="" selected>Select Option</option>
                                                    <option value="true" >Yes</option>
                                                    <option value="false">No</option>                                        
                                                </select>
                                        </div>
                                            <!-- (Required: If hazmatType = Regulated) -->                                            
                                            <!-- Hazmat : Regulated ==============CLICK EVENT End======== -->

                                            <div class="form-group">
                                                <label>Packing Group (Degree of danger the DG represents)</label>
                                                <input name="h_packingGroup" id="packingGroup" type="text" class="form-control"><small><code>Values: i, ii, iii.</code></small>
                                                <!-- (Required: If hazmatType = Regulated) -->
                                            </div>
                                            <div class="form-group">
                                                <label>ErapReference</label>
                                                <input name="h_erapReference" id="erapReference" type="text" class="form-control">
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Subsidiary Class</label>
                                                <input name="h_subsidiaryClass" id="subsidiaryClass" type="text" class="form-control"> 
                                            </div>
                                        </div>
                                        <div class="card card-body" style='display:none;' id='nonregulated'>
                                            <!-- (Required: If hazmatType = NonRegulated) -->
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input name="h_description" id="description" type="text" class="form-control">                                                
                                            </div>
                                       </div>                                                                         
                                       </div> 
                                       <div class="form-group">
                                        <label>Note</label>
                                            <input name="note" id="note" type="text" class="form-control" value="<?php if(isset($_POST['note'])) echo $_POST['note'];?>">
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <button type="submit" class="btn btn-primary submit-button">Submit</button>
                                    </div>
                            </div>                           
                    </form>
                    <!-- /.card -->
            </div>
        </div>
                    <!-- right hand container ends -->
</section>

<script>
    function hazmatRegulation() {
    selectedVal = document.getElementById('select_hazmat_regulation').value;
    if((selectedVal == 'Regulated'))
    {   
        $("#regulated").show();
        $("#nonregulated").hide();
    }
    else
    {
        $("#regulated").hide();
        $("#nonregulated").show();
    } 

    //////////////////////////////////////////////////////////////////////////////

    //const select_hazmat_regulation = document.getElementById('select_hazmat_regulation');
    const h_phone = document.getElementById('h_phone');
    const h_number = document.getElementById('h_number');
    const h_shippingName = document.getElementById('h_shippingName');
    const h_toxicByInhalation = document.getElementById('h_toxicByInhalation');
    const description = document.getElementById('description');

    //function changePurpose(){
        const value = document.getElementById('select_hazmat_regulation').value;
        //select_hazmat_regulation.required = (value == "yes");
        h_phone.required = (value == "Regulated");
        h_number.required = (value == "Regulated");
        h_shippingName.required = (value == "Regulated");
        h_toxicByInhalation.required = (value == "Regulated");
        description.required = (value == "NonRegulated"); //
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>                                                  
        $("input").on("keyup",function() {
        var maxLength = $(this).attr("maxlength");
        if(maxLength == $(this).val().length) {
        alert("You can't write more than " + maxLength +" chacters")
        }
        })
</script>

<script>
function count_title() {
  var el_t = document.getElementById("customerName");
  var maxLength = 40;
  //var el_c = document.getElementById("ctitle");
  //el_c.innerHTML = maxLength - el_t.value.length;
  if(el_t.value.length>=40){
        alert("Alert: Customer Name field have more than 40 characters!")
}
}
window.onload = function() {
    count_title();
};
</script>

    
   