<?php

$dbname="jrpinsight";
$con = mysqli_connect("localhost","jrpinsight","kd&3u*kd#j8D");
if (!$con)
{    
    echo "Can't Connect";
}
mysqli_select_db($con, "jrpinsight");




//====================== IMPORT ==========================

$dbHost     = "localhost";
$dbUsername = "jrpinsight";
$dbPassword = "kd&3u*kd#j8D";
$dbName     = "jrpinsight";
 
// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
 
// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}



?> 