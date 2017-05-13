<?php
    //the script to handle the editing of stocks
    include "../../functions/dbConfig.php";
    $oldStockName = $_POST['oldStockName'];
    $stockName = $_POST['stockName'];
    $stockPrice = $_POST['stockPrice'];
    $stockId = $_POST['stockId'];
    $query = "UPDATE stocktbl SET stockName = '$stockName', stockPrice = $stockPrice WHERE stockId = $stockId;";

    $result = $link->query($query);
    $historyStatement = "The name and price of $oldStockName was edited to $stockName and GHC $stockPrice respectively by ".$_SESSION['username'];
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $link->close();
    header("Location: ../manageStockPanel.php");

?>
