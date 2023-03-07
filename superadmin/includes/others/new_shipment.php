<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- <a href="add_new_parcel.php" name="Add New" class="btn btn-primary">Parcel</a> <a href="add_new_freight.php" name="Add New" class="btn btn-primary">Freight</a><br />
        <a href="shipping_list.php">>> Go to Shipping Records</a>         -->
        <div class="row">        
            <div class="col-md-2">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../index/delivery-truck.png" alt="parcel only">
                    </div>
                    <h3 class="profile-username text-center">Parcel Only</h3>              
                    <a href="shipping_list_parcel.php" class="btn btn-primary btn-block"><b>View All Parcel Shipping</b></a>
                </div>                            
             </div> <!-- /col-md-3 -->
            <div class="col-md-2">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../index/air-freight.png" alt="freight only">
                    </div>
                    <h3 class="profile-username text-center">Freight Only</h3>               
                    <a href="shipping_list_freight.php" class="btn btn-primary btn-block"><b>View All Freight Shipping</b></a>
                </div>
             </div>
         <!-- /col-md-3 -->
          <div class="col-md-2">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../index/checklist.png" alt="all shipment">
                    </div>
                    <h3 class="profile-username text-center">List</h3>               
                    <a href="shipping_list.php" class="btn btn-primary btn-block"><b>View All Shipping</b></a>
                </div>
             </div>
          </div> <!-- /col-md-3 -->
          <!-- /col-md-3 -->
          <!--<div class="col-md-2">
                <div class="card-body box-profile">
                    <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="../index/pending.png" alt="pending shipment">
                    </div>
                    <h3 class="profile-username text-center">Pending List Only</h3>               
                    <a href="pending_list.php" class="btn btn-primary btn-block"><b>View Shipping</b></a>
                </div>
             </div>
          </div> --> 
    <!-- /col-md-3 -->

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

    ///////////////////////////////////////////////////////////////////////////////////////
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

    
   