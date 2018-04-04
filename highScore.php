<?php
session_start();
include_once("config.php");

session_unset();

// Select highest score from scores table.
$sql = "SELECT * FROM scores WHERE score=(select max(score) from scores)";
$result = mysqli_query($conn, $sql);  

// Create a session variable, hs, to store the highest score.
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION ["hs"] = $row["score"];
} else {
    session_unset();    // remove all session variables
}
    
header('Location:scores.php');    // go back to original page
?>
