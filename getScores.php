<?php
session_start();
include_once("config.php");

session_unset();

// Select all data from scores table.
$sql = "SELECT * FROM scores;";
$result = mysqli_query($conn, $sql);
      
// For each row, create two session variables, p# and s#, to store its ID and score.
$i = 0;
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $curPerson = "p" . $i;  //  e.g. p0, p1, p2, etc.
        $curScore = "s" . $i;   //  e.g. s0, s1, s2, etc.
        $i++;
        
        $_SESSION [$curPerson] = $row["studID"];
        $_SESSION [$curScore] = $row["score"];
    }
    $_SESSION ["tot"] = $i;
} else {
    session_unset();    // remove all session variables
}
    
header('Location:scores.php');    // go back to original page
?>
