<?php
    //the script to handle the editing of stocks
    include "../../functions/dbConfig.php";
    session_start();
    $stockName = $_POST['stockName'];
    $stockId = $_POST['stockId'];
    $topupQuantity = intval($_POST['stockQuantity']);

    $query1 = "SELECT * FROM stocktbl WHERE stockId = $stockId AND stockName = '$stockName';";
    $result1 = $link->query($query1);
    $row1 = mysqli_fetch_assoc($result1);
    $oldstockQuantity = intval($row1['stockQuantity']);
    $newstockQuantity = $topupQuantity + $oldstockQuantity;
    $query2 = "UPDATE stocktbl SET stockQuantity = $newstockQuantity WHERE stockId = $stockId";
    $result2 = $link->query($query2);
    $historyStatement = "$topupQuantity quantities of $stockName was added to the stock by ".$_SESSION['username'];
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $link->close();
    header("Location: ../manageStockPanel.php");
?>
