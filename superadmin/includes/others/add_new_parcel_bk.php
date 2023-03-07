<!-- Main content -->
<section class="content">
    <div class="container-fluid">        
        <div class="row">
        
            <div class="col-md-4">
            <a href="add_new_parcel.php" name="Add New" class="btn btn-primary">Parcel</a> <a href="add_new_freight.php" name="Add New" class="btn btn-primary">Freight</a><br />
                            <a href="shipping_list.php">>> Go to Shipping Records</a>
                          <div class="card card-primary">
                            <div class="card-header">
                              <h3 class="card-title">Add New Shipment</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->               
                            <form method=post action="../model/add_new_shipment.php" id="myForm1" class="needs-validation">
                            <div class="card card-body">                            
                            
                           <div class="form-group" style='display:none;'>
                                    <label for="exampleInputEmail1">Division</label>             
                                    <select class="custom-select" name="division" id='division' onchange='cDivision()' required>
                                            <option value="" >Select Option</option>
                                            <option value="Express" selected>Express</option>
                                            <!-- <option value="Freight">Freight</option> -->
                                    </select>                   
                                    </div>
                                    <script>
                                        function cDivision() {
                                            selectedVal = document.getElementById('division').value;
                                            if((selectedVal == 'Express'))
                                            {   
                                                $("#dRequestReturnLabel").show();
                                                $("#sfreight").hide();                                                
                                            }
                                            else
                                            {
                                                 $("#dRequestReturnLabel").hide();
                                                 $("#sfreight").show();                                                
                                            }
                                            }
                                    </script>
                                    <!-- <div class="card card-body" style='display:none;' id='sfreight'>
                                        <code>When the division is set to Freight, the field billingAccount need to be of length : 7 , 8. </code>
                                    </div> -->

                                    <div class="card card-body" id='dRequestReturnLabel' >
                                            <div class="form-group">
                                                <!-- <label class="text-success">Request Return Label</label>                                     -->
                                                <select class="custom-select" name="requestReturnLabel" id='requestReturnLabel1' onchange='returnLabel()' required style='display:none;'>
                                                <option value="" >Select Option</option>
                                                <option value="true" selected>Yes</option>
                                                <option value="false">No</option>                                        
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

                                            <div class="card card-body" id='yes_requestReturnLabel'>
                                                <div class="form-group">
                                                    <label class="text-success">Return Way bill number</label>
                                                    <input name="returnWaybill" id="returnWaybill" type="text" class="form-control" required> eg. B1234568
                                                    <!-- (Required: If requestReturnLabel = true) -->
                                                </div>
                                            </div>
                                        </div>

                                    <div class="form-group" style='display:none;'>
                                        <label for="exampleInputEmail1">Category</label>             
                                        <!-- <select class="custom-select" name="category" id='s_category' onchange='scategory()' required> -->
                                        <select class="custom-select" name="category"  id='s_category' onchange='scategory()' required>
                                                <option value="">Select Option</option>
                                                <option value="Parcel" selected>Parcel</option>
                                                <!-- <option value="Freight">Freight</option> -->
                                            </select>                   
                                    </div>
                                    <script>
                                        function scategory() {
                                            selectedVal = document.getElementById('s_category').value;
                                            if((selectedVal == 'Freight'))
                                            {   
                                                //$("#sfreight").show();
                                                $("#surcharges_type_freight").show();
                                                $("#surcharges_type_parcel").hide();
                                                //$("#parcel_canada").hide(); //
                                            }
                                            else
                                            {
                                                // $("#sfreight").hide();
                                                 $("#surcharges_type_freight").hide();
                                                $("#surcharges_type_parcel").show();
                                                // $("#parcel_canada").show();
                                            }
                                            }
                                    </script>                                    

                                <div class="form-group">
                                        <label>Billing Account</label>
                                        <select class="custom-select" name="billing_account_id" required>
                                         <option value="" selected>Select Option</option>
                                         <?php                                            
                                         include("../model/connect.php");                                                                    
                                            $results_customer = mysqli_query($con, "SELECT * FROM `billing_account` where `flag` = '1' and `category`='Parcel'");                                                
                                            while ($row_customer = mysqli_fetch_array($results_customer))                       
                                            {         
                                            $billing_account_id = $row_customer['billing_account_id'];
                                            $billing_account = $row_customer['billing_account'];
                                            $note = $row_customer['note'];                                      
                                            ?>                         
                                            <option value="<?php echo $billing_account_id;?>"><?php echo $billing_account;?> : <?php echo $note;?></option>
                                            <?php  
                                            }                                                   
                                            ?> 
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
                              
                                <div class="form-group">
                                  <label>Note</label>
                                  <input name="note" id="note" type="text" class="form-control" value="<?php if(isset($_POST['note'])) echo $_POST['note'];?>">
                                </div>
                               
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
                               
                                <div class="form-group">
                                    <label>Consignee</label>
                                    <select class="custom-select" name="consignee_id" required>
                                        <option value="" selected>Select Option</option>
                                        <?php                                            
                                        include("../model/connect.php");
                                        $results_customer = mysqli_query($con, "SELECT * FROM `consignee`");                                                
                                        while ($row_customer = mysqli_fetch_array($results_customer))                       
                                        {         
                                            $consignee_id = $row_customer['consignee_id'];
                                            $fullName = $row_customer['fullName'];
                                            $province = $row_customer['province'];
                                            $postalCode = $row_customer['postalCode'];                                      
                                        ?>                         
                                        <option value="<?php echo $consignee_id;?>"><?php echo $fullName;?>, <?php echo $province;?>, <?php echo $postalCode;?></option>
                                        <?php  
                                        }                                                   
                                        ?> 
                                    </select>
                                 </div>                                          

                                <div class="form-group">
                                    <label>Unit Of Measurement</label>
                                    <select class="custom-select" name="unitOfMeasurement" required>
                                        <option value="K" >K</option>
                                        <option value="L">L</option>
                                        <option value="KC" selected>KC</option>
                                        <option value="KM">KM</option>
                                        <option value="LI">LI</option>
                                        <option value="LF">LF</option>
                                    </select>
                                </div>                                                  
                                <!-- Ref: K:kg (implies cm), L:lb (implies inch), KC:kg-cm, KM:kg-meter, LI: lb-inch, LF: lb-feet. -->
                                <a href="../model/unitOfMeasurement.php" target="_blank">* Ref. Link</a>
                                
                                <div class="form-group">
                                    <label>Parcel Category</label>
                                    <select class="custom-select" name="parcel_category" style='display:none;' id='select_category' onchange='populateField()' required>
                                        <option value="">Select Option</option>
                                        <!-- <option value="Freight" >Freight</option> -->
                                        <option value="Parcel" selected>Parcel Canada</option>                                        
                                    </select>

                                    <script>
                                        function populateField() {
                                        selectedVal = document.getElementById('select_category').value;
                                        if((selectedVal == 'Freight'))
                                        {   
                                        $("#freight").show();
                                        $("#parcel_canada").hide();
                                        }
                                        else
                                        {
                                        $("#freight").hide();
                                        $("#parcel_canada").show();
                                        }
                                        }
                                    </script>

                                <!-- <div style='display:none;' id='freight'>
                                    <p class="text-success">Parcel Type (Freight): </p>
                                    <select class="custom-select" name="parcelTypeFreight">
                                        <option value="">Select Option</option>
                                        <option value="Barrel" >Barrel</option>
                                        <option value="Bundle">Bundle</option>
                                        <option value="Box">Box</option>
                                        <option value="Crate">Crate</option>
                                        <option value="FullLoad">FullLoad</option>
                                        <option value="Piece">Piece</option>
                                        <option value="Skid">Skid</option>
                                        <option value="Tube">Tube</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div> -->
                                <div id='parcel_canada'>
                                    <!-- parcel_canada ==============CLICK EVENT======== -->
                                    <level>Parcel Type</level> 
                                    <select class="custom-select" name="parcelTypeParcelCanada" required>
                                        <option value="">Select Option</option>
                                        <option value="Box">Box</option>                                       
                                        <option value="Envelope">Envelope</option>
                                        <option value="Other">Other</option>
                                        <option value="Mixed">Mixed</option>
                                    </select>
                                </div>                                          
                                </div>                                        
                                <div class="form-group">
                                    <label style="padding:5px;">Quantity</label>
                                    <input name="quantity" id="quantity" type="number" class="" size="8" oninput="this.value = Math.round(this.value);" required>
                                    <label>Weight</label>
                                    <input name="weight" type=number step=0.01 id="weight" class="" size="8" required> <br />
                                    <label style="padding:3px 16px 4px 5px;">Length</label>
                                    <input name="length" id="length" type=number step=0.01 class="" size="8" required>
                                    <label style="padding:3px 1px 4px 5px;">Depth</label>
                                    <input name="depth" id="depth" type=number step=0.01 class="" size="8"  required><br />
                                    <label style="padding: 4px 22px 2px 6px;">Width</label>
                                    <input name="width" id="width" type=number step=0.01 class="" size="8"  required>
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
                                <script>
                                    function deliverytype() 
                                    {
                                    selectedVal = document.getElementById('deliveryType').value;
                                    if((selectedVal == 'AIR'))
                                    {   
                                    $("#airb").show();
                                    }
                                    else
                                    {
                                    $("#airb").hide();
                                    }
                                    }
                                </script>
                                <div class="card card-body" style='display:none;' id='airb' style='display:none;'>
                                    <code>For air, delivery select the shipping sender and consignee address in different provinces.</code>
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
                                    <label>Invoice Code</label>
                                        <input type="text" name="references_code" class="form-control" id="exampleInputEmail1" placeholder="Enter Invoice number" required>
                                    </div>
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Return Address</h3>
                                    </div>
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
                                    <!-- Surcharges ========================== -->
                                    <div class="card-header">
                                        <h3 class="card-title text-primary">Surcharges</h3>
                                    </div>
                                    <div id='surcharges_type_parcel'>
                                    <select class="custom-select" name="surcharges_type_parcel" id='select_surcharges1' onchange='selectSurcharges1()' required>
                                        <option value="">Select Option</option>
                                        <option value="DCV">DCV</option>
                                        <option value="DGG">DGG</option>
                                        <option value="PHD">PHD</option>
                                        <option value="TRD">TRD</option>
                                        <option value="SNR">SNR</option>
                                        <option value="HFP">HFP</option>
                                        <option value="NCV">NCV</option>
                                        <option value="PHDS">PHDS</option>
                                        <option value="WKD">WKD</option>
                                    </select>
                                    </div>
                                    <!-- <div style='display:none;' id='surcharges_type_freight'>
                                    <select class="custom-select" name="surcharges_type_freight" id='select_surcharges2' onchange='selectSurcharges2()'>
                                            <option value="">Select Option</option>
                                            <option value="DCV">DCV</option>
                                            <option value="DGG">DGG</option>
                                            <option value="PHD">PHD</option>
                                            <option value="TRD">TRD</option>                                        
                                            <option value="CNSTD">CNSTD</option>
                                            <option value="COD">COD</option>
                                            <option value="HEAT">HEAT</option>
                                            <option value="IDEL">IDEL</option>
                                            <option value="PHPU">PHPU</option>
                                            <option value="TGT">TGT</option>
                                            <option value="TGTPU">TGTPU</option>
                                        </select>
                                    </div> -->
                                    <a href="../model/surcharges_ref_list.php" target="_blank">* Ref. Link</a>
                                    <script>
                                        function selectSurcharges1() 
                                        {
                                        selectedVal = document.getElementById('select_surcharges1').value;
                                        if((selectedVal == 'DCV') || (selectedVal == 'COD'))
                                        {   
                                        $("#surchargesId").show();
                                        document.getElementById("surcharges_value").required;
                                        }
                                        else
                                        {
                                        $("#surchargesId").hide();
                                        }
                                        }

                                        const select_hazmat = document.getElementById('select_hazmat'); // For DGG 
                                        const surcharges_value = document.getElementById('surcharges_value'); // For DCV or COD
                                        const value = document.getElementById('select_surcharges1').value;
                                        surcharges_value.required = (value == "DCV");
                                        surcharges_value.required = (value == "COD");
                                        select_hazmat.required = (value == "DGG");

                                    </script>
                                    <div style='display:none;' id='surchargesId'>
                                    <!-- Required if field is DCV or COD ======================= -->
                                    <label>Value</label>
                                    <div class="form-group">
                                        <input name="surcharges_value" id="surcharges_value" type="text" class="form-control">
                                    </div>  
                                    <!-- Required if field is DCV or COD END =================== --> 
                                    </div>
                                </div>
                            </div>
                        </div>
                                                        <!-- right hand container start -->
                                                        <!-- <div style='display:none;' id='yes'>                                                          
                                                          <?php 
                                                          //include('hazmat_list.php');
                                                          ?>
                                                          </div>

                                                          <div style='display:none;' id='no'>
                                                          test no hazmat
                                                          </div> -->
                                                <div class="col-md-3">
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
                                                            }
                                                            </script>

                                    <div class="card card-body" style='display:none;' id='regulated'>
                                              <!-- Hazmat : Regulated ==============CLICK EVENT (if yes)======== -->
                                                      <div class="form-group">
                                                        <label>Phone</label>
                                                        <input name="h_phone" id="phone" type="text" class="form-control"  >
                                                        <!-- (Required: If hazmatType = Regulated) -->

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <input name="h_number" id="number" type="text" class="form-control"  > eg. UN1993
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Shipping Name</label>
                                                        <input name="h_shippingName" id="shippingName" type="text" class="form-control"  > eg. Flammable Liquids
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <label>Primary class of DG</label>
                                                        <input name="h_primaryClass" id="primaryClass" type="text" class="form-control"  > eg. 3
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label>Toxic By Inhalation</label>                                    
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
                                                <input name="h_packingGroup" id="packingGroup" type="text" class="form-control"> Values: i, ii, iii.
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
                                                <input name="description" id="description" type="text" class="form-control">                                                
                                            </div>
                                       </div>
                                    </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit-button">Submit</button>
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
    const phone = document.getElementById('phone');
    const h_toxicByInhalation = document.getElementById('h_toxicByInhalation');
    const description = document.getElementById('description');

    //function changePurpose(){
        const value = document.getElementById('select_hazmat_regulation').value;
        //select_hazmat_regulation.required = (value == "yes");
        phone.required = (value == "Regulated");
        h_toxicByInhalation.required = (value == "Regulated");
        description.required = (value == "NonRegulated"); //
    }
</script>

    
   