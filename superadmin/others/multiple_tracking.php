<?php
if($quantity>1)
{
    $parcelTrackingNumbers = $json_resp['parcelTrackingNumbers'];
    $array_count = sizeof($parcelTrackingNumbers);

    //var_dump($parcelTrackingNumbers);
    $j = 0;
    for($i=0;$i<$array_count; $i++)       
    
    {       
    //echo $array_count;        
    //var_dump($parcelTrackingNumbers[$j]);
    $subtrackingNumber = $parcelTrackingNumbers[$j];
    $j = $j+1;

    //check if sub tracking number already exist or not ==================================
    $result_subtrackingNumber_exist = mysqli_query($con, "SELECT COUNT(*) as 'subtrackingNumber_exist' FROM `multiple_tracking` WHERE `subtrackingNumber`='$subtrackingNumber'");
    $row_subtrackingNumber_exist = mysqli_fetch_array($result_subtrackingNumber_exist);
    $subtrackingNumber_exist = $row_subtrackingNumber_exist['subtrackingNumber_exist'];

    if($subtrackingNumber_exist=='0'){
    $sql_multiple_tracking="INSERT INTO `multiple_tracking` (`multiple_tracking_id`, `trackingNumber`, `subtrackingNumber`, `order_number`, `date`) 
            VALUES (NULL, '$set1_trackingNumber', '$subtrackingNumber', '$OrderNumber', NOW()); ";
    $result_multiple_tracking=mysqli_query($con, $sql_multiple_tracking) or die( 'Couldnot execute query'. mysqli_error($con));
    }
}  
}
?>