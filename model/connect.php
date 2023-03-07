<?php

$dbname="sonax_api";
$con = mysqli_connect("localhost","root","");
if (!$con)
{    
    echo "Can't Connect";
}
mysqli_select_db($con, "sonax_api");

        
 
 
//====================== IMPORT ==========================

$dbHost     = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "sonax_api";
 
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?> 