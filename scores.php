<?php
session_start();
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<title>Get High Score from Database</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-colors-2017.css">
<body>
    
<div><p>&nbsp;</p></div>
    
<div class="w3-display-container w3-center">
    <div class="w3-display-topmiddle">
        <div class="w3-card" >
            <div class="w3-container w3-2017-shaded-spruce">
                <h2>Finding the Score</h2>
            </div>
            
            <div class="w3-container w3-sand">
                <br>

                <center><a href="getScores.php"><button class="w3-btn w3-2017-shaded-spruce w3-round-large">Display Scores</button></a><br><br></center>
    
                <center><a href="highScore.php"><button class="w3-btn w3-2017-shaded-spruce w3-round-large">High Score?</button></a><br><br></center>

                <center><a href="mode.php"><button class="w3-btn w3-2017-shaded-spruce w3-round-large">Mode?</button></a><br><br></center>

            </div>
            
            <div class="w3-container w3-2017-shaded-spruce">
                <?php
                if (isset($_SESSION ['tot'])) {
                    echo "<p>";
                    for ($i=0; $i<$_SESSION['tot']; $i++) {
                        $curP = "p" . $i;
                        $curS = "s" . $i;
                        echo "Student " . $_SESSION [$curP] . " got " . $_SESSION [$curS] . ".<br>";
                    }
                    echo "</p>";
                }
                if (isset($_SESSION ['hs'])) {
                    echo "<h3>Highest score is " . $_SESSION ['hs'] . ".</h3>";
                }
                if (isset($_SESSION['sqlmode'])){
                    $sqlmodeout = "<p>The mathematical mode found by the SQL Query is: ".$_SESSION['sqlmode']."<br></p>";
                    echo $sqlmodeout;
                }
                if (isset($_SESSION['phpmode'])){
                    $phpmodeout = "<p>The mathematical mode found by the PHP functions is: ".$_SESSION['phpmode']."<br></p>";
                    echo $phpmodeout;
                }

                ?>
            </div>
        </div>
    </div>
</div>

</body>
</html>