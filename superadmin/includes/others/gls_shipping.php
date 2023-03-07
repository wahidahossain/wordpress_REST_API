<section class="content">
 <div class="container-fluid">     
    <div class="col-md-12">
        <div class="card card-primary">
            <?php
              include("includes/gls_links.php");
              ?>
          </div>
            <!-- <div class="col-md-12">
                      <div class="card card-primary">           
                            <div class="card-body">                
                            <table><tr><td>
                            <a href="../model/dicom_export_solution.php" ><img src="dist/img/doc.gif" alt="Import to GLS" height="120" width="120"><br>Export to BV</a></td>                
            </tr></table></div> </div> -->  
              <?php
                include ("../model/connect.php");
                $minimum_cost = '0';
                $result = mysqli_query($con, "SELECT `minimum_cost` FROM `minimum_shipping_cost`");
                $row = mysqli_fetch_array($result);                    
                $minimum_cost = $row['minimum_cost'];
              ?>
                          <form method=post action="../model/minimum_shipping_cost.php">
                              <table class="table table-bordered table-striped">
                                <tr>
                                  <td><label>Set minimum shipping cost : $</label>
                                  <input type="text" placeholder="cost" size="5" name="minimum_cost" value="<?php echo $minimum_cost;?>">
                                  <button type="submit" class="btn btn-secondary btn-sm">Update</button>
                                  </td>                    
                                </tr>
                              </table>
                            </form>
    </div>
  </div>     
</section>
   