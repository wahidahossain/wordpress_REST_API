<?php

session_start();
  
$login=$_SESSION['login'];
$account_type=$_SESSION['account_type'];
$first_name=$_SESSION['first_name'];
$user_id=$_SESSION['user_id'];



if($login=="staff"){
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];
    ?>


<?php

//======================================= IMPORT from file ===============================================================

include_once 'connect.php'; 
 //print_r(glob("import/*.*"));
 //print_r(glob("import/*.csv"));
 //$dir = "//db/gls/v4csvexport/*";  //======================== CHANGE IT ====================================
 $dir = "../import/*";
 $currentFile = glob($dir."*.csv");   
 $counter = count($currentFile);
 if($counter>0){
        foreach ( $currentFile as $filename) {     
            $handle = fopen($filename,"r");            
            $count = 0;            
            $file = basename($filename);
            //=======================loop through the csv file and insert into database===================================
            while(($line = fgetcsv($handle)) !== FALSE){                 
                 $count++;
                 //print it from 2nd line ====================
                    if ($count == 2) {
                 //print it from 2nd line ====================

                        $invoice   = $line[0];
                        $tracking  = $line[1];
                        $sub_total = $line[2];                    
                        
                        $db->query("INSERT INTO `gls_tracking`(
                            `invoice`,
                            `tracking`,
                            `sub_total`
                        )
                        VALUES(       
                                '".mysqli_real_escape_string($con, $invoice)."',
                                '".mysqli_real_escape_string($con, $tracking)."',
                                '".mysqli_real_escape_string($con, $sub_total)."'
                            )");                             
                            echo "                           
                            <div class='col-md-6'>
                              <div class='card card-default'>
                                <div class='card-header'>
                                  <h3 class='card-title'>
                                    <i class='fas fa-bullhorn'></i>
                                    Callouts
                                  </h3>
                                </div>                            
                            <div class='card-body'>
                            <div class='callout callout-danger'>
                              <h5>Invoice No.: ".$invoice."</h5>                    
                              <p>Shipping Cost: ".$sub_total."</p>
                            </div>                
                          </div>
                          </div>                
                          </div>";
                }
            }
         fclose($handle);
    //===============================move the file to completed folder after processing=============================
        $source_file = $filename;
        $destination_path = '//db/gls/v4csvcompleted/';
        rename($source_file, $destination_path . pathinfo($source_file, PATHINFO_BASENAME));
    //==============================================================================================================            
        }
       // print("<script>window.alert('Test');</script>");
} 
else{
    
print("<script>window.alert('Sorry no files found in the folder to import!!!');</script>");
print("<script>window.location='../staff/gls_import_tracking.php'</script>");
}       

        //loop through the csv file and insert into database 
//============================================================================
//print("<script>window.alert('successfully');</script>");
//header("Location: ../superadmin/add_new_customer.php".$qstring);

}            
else{    
    print("<script>window.location='../index_warning.php?pass=message'</script>"); 
}

?>

