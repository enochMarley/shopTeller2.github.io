<?php
    //the script to handle the editing of stocks
    include "../../functions/dbConfig.php";
    session_start();
    $stockId = $_POST['stockId'];
    $stockName = $_POST['stockName'];

    $query = "DELETE FROM stocktbl WHERE stockId = $stockId AND stockName = '$stockName';";
    $result = $link->query($query);
    $historyStatement = "$stockName was deleted from the stock list by ".$_SESSION['username'];
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $link->close();
    header("Location: ../manageStockPanel.php");
?>
