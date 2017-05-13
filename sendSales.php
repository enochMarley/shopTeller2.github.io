<?php
    include "functions/dbConfig.php";
    session_start();
    $query1 = "SELECT salesMade FROM salestbl WHERE saleId = 1;";
    $result1 = $link->query($query1);
    $row1 = mysqli_fetch_assoc($result1);
    $sales = $row1['salesMade'];
    $sms = "HELLO TOTAL SALES MADE TODAY IS GHC $sales. CHECKED OUT BY ".$_SESSION['username'];

    //assume the sms api has been sent
    $historyStatement = "A total Amount of GHC $sales was made.";
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $query = "UPDATE salestbl SET salesMade = 0.00";
    $result = $link->query($query);
    if ($result) {
        session_unset();
        session_destroy();
        header("Location: index.php");
    }
?>
