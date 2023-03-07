<?php
session_start();
        $login=$_SESSION['login'];
        $account_type=$_SESSION['account_type'];
        $first_name=$_SESSION['first_name'];
        $user_id=$_SESSION['user_id'];

//  if($login=="superadmin"){
//  $account_type=$_SESSION['account_type'];
//         $first_name=$_SESSION['first_name'];
//         $user_id=$_SESSION['user_id'];
    ?>

<?php
include_once 'connect.php'; 
//$dir = "//db/gls/v4csvexport/*"; //======================== CHANGE IT ====================================
$dir = "../import/*";
//print_r(glob("../staff/import/*"));

/*
function replace_extension($filename, $new_extension) {
    $info = pathinfo($filename);
    return ($info['dirname'] ? $info['dirname'] . DIRECTORY_SEPARATOR : '') 
        . $info['filename'] 
        . '.' 
        . $new_extension;
}
*/
$currentFile = glob($dir."*"); 
$counter = count($currentFile);
 if($counter>0){
foreach ( $currentFile as $filename) { 
    // $filename1 =  substr_replace($filename , 'csv', strrpos($filename , '.') +1);
    //$source_file = $filename;

    //==========================================================================================================
    // $new_extension = "csv";
    // $filename1 = substr($filename, 0, -strlen(pathinfo($filename, PATHINFO_EXTENSION))).$new_extension;
    // $destination_path = '../staff/completed/';
    // rename($filename1, $destination_path . pathinfo($filename, PATHINFO_BASENAME));
    //==========================================================================================================


    // $path = realpath('../staff/import/');

    // $objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
    // foreach($objects as $name => $object){
    //     echo "$name\n";
    // }

    $oldname = $filename;
    $newname = $filename.".csv";
    rename($oldname, $newname);
    // if (rename($oldname, $newname)) {
    //     $message = sprintf(
    //         'The file %s was renamed to %s successfully!',
    //         $oldname,
    //         $newname
    //     );
    // } else {
    //     $message = sprintf(
    //         'There was an error renaming file %s',
    //         $oldname
    //     );
    // }
    
    //echo $message;
}
if($login=="superadmin"){
header('Location: ../superadmin/gls_tracking_import_step2.php?step3=0');
}
if($login=="staff"){
  header('Location: ../staff/gls_tracking_import_step2.php?step3=0');
}
}
else{
  print("<script>window.alert('Sorry folder is emply, No report files found.');</script>");
  if($login=="superadmin"){
  print("<script>window.location='../superadmin/gls_shipping.php'</script>");
  }
  if($login=="staff"){
    print("<script>window.location='../staff/gls_shipping.php'</script>");
  }
}
?>

