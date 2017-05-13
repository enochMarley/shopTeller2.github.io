<?php
    include "functions/dbConfig.php";
    $itemsName = $_GET['itemsName'];
    $result = $link->query("SELECT stockQuantity FROM stocktbl WHERE stockName = '$itemsName'");
    $row = mysqli_fetch_assoc($result);
    $itemQuantity = $row['stockQuantity'];
    echo $itemQuantity;
?>
