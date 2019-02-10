<?php
session_start();
include_once("config.php");
session_unset(); // why are we including this at the top ?  What purpose does this serve here if the query is good?
    
/*From Dave Babler
    The first method uses SQL to generate the mathematical concept of "mode"
    The second one uses the php processor instead of the database processor to do this.
    I'll let all y'all decide which looks more efficient ;) */


    $sql_mode = <<<SQL1
SELECT score
FROM scores
GROUP BY score
ORDER BY COUNT(score) desc
LIMIT 1
SQL1;
    $result = mysqli_query($conn, $sql_mode);

    $row = mysqli_fetch_assoc($result);
    $_SESSION['sqlmode'] = $row['score'];


    $php_scores = array();
    $sql = "SELECT * FROM scores;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)){
            array_push($php_scores, $row["score"]);
        }
        $values = array_count_values($php_scores);
        $_SESSION['phpmode'] = array_search(max($values), $values);
    }else {
        session_unset();
    }

    header('Location:scores.php');


?>