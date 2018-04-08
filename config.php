<?php
session_start();
 
$hostname = "mysql.yaacotu.com";
$username = "studCollab";
$password = "collabor8";
$dbname = "siteGHdb";

// Create connection
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error() . "<br>");
}

?>
