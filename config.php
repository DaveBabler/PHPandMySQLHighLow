<?php
session_start();
 
$hostname = "mysql.yaacotu.com";
$username = "tmajchrzak";
$password = "9*qxNDrK";
$dbname = "site20db";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}

?>
