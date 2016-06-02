<?php

$sqlconfig = "/var/www/html/sysadmin/config/mysql.conf";
$sqldetails = file_get_contents("$sqlconfig");
parse_str("$sqldetails",$myArray);

        $username = $myArray['Username'];
        $password = $myArray['Password'];
        $database = $myArray['Database'];
        $host = $myArray['Hostname'];

$conn = new mysqli($host, $username, $password, $database);
// Remove the comments below to diagnose MySQL connection issues
//if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
//}
?>
