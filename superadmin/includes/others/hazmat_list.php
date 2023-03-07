<div class="card-header">
                                                <h3 class="card-title text-primary">Hazmat Details</h3>
                                              </div>

                                              <div class="form-group">
                                                <label>Hazmat Type</label>
                                                <select class="custom-select" name="toxicByInhalation">
                                                          <option value="Regulated" >Regulated</option>
                                                          <option value="NonRegulated">NonRegulated</option>                                        
                                                        </select>
                                                    </div>

                                              <!-- Hazmat : Regulated ==============CLICK EVENT (if yes)======== -->
                                                      <div class="form-group">
                                                        <label>Phone</label>
                                                        <input name="phone" id="phone" type="text" class="form-control"  required>
                                                        <!-- (Required: If hazmatType = Regulated) -->

                                                    </div>

                                                    <div class="form-group">
                                                        <label>Number</label>
                                                        <input name="number" id="number" type="text" class="form-control"  required> eg. UN1993
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Shipping Name</label>
                                                        <input name="shippingName" id="shippingName" type="text" class="form-control"  required> eg. Flammable Liquids
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>

                                                    
                                                    <div class="form-group">
                                                        <label>Primary class of DG</label>
                                                        <input name="primaryClass " id="primaryClass" type="text" class="form-control"  required> eg. 3
                                                        <!-- (Required: If hazmatType = Regulated) -->
                                                    </div>
                                                    

                                                    <div class="form-group">
                                                        <label>Toxic By Inhalation</label>                                    
                                                                <select class="custom-select" name="toxicByInhalation">
                                                                  <option value="yes" >Yes</option>
                                                                  <option value="no">No</option>                                        
                                                                </select>
                                                                </div>
                                            <!-- (Required: If hazmatType = Regulated) -->
                                            
                                            <!-- Hazmat : Regulated ==============CLICK EVENT End======== -->

                                            <div class="form-group">
                                                <label>Packing Group (Degree of danger the DG represents)</label>
                                                <input name="packingGroup" id="packingGroup" type="text" class="form-control"> Values: i, ii, iii.
                                                <!-- (Required: If hazmatType = Regulated) -->
                                            </div>


                                            <div class="form-group">
                                                <label>ErapReference</label>
                                                <input name="erapReference" id="erapReference" type="text" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label>Subsidiary Class</label>
                                                <input name="subsidiaryClass" id="subsidiaryClass" type="text" class="form-control"> 
                                            </div>
                                            

                                            <div class="form-group">
                                                <label>Description</label>
                                                <input name="description" id="description" type="text" class="form-control">
                                                <!-- (Required: If hazmatType = NonRegulated) -->
                                            </div>