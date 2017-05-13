<?php
    //the script to handle the editing of stocks
    include "../../functions/dbConfig.php";
    session_start();
    $oldTellerName = $_POST['oldTellerName'];
    $editTellerName = $_POST['editTellerName'];
    $tellerId = $_POST['tellerId'];
    $editTellerPassword = $_POST['editTellerPassword'];

    $query = "UPDATE tellertbl SET tellerName = '$editTellerName', tellerPassword = '$editTellerPassword' WHERE tellerId = $tellerId;";

    $result = $link->query($query);
    $historyStatement = "The teller name  and password of $oldTellerName was edited to $editTellerName and GHC $editTellerPassword by ".$_SESSION['username'];
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $link->close();
    header("Location: ../manageTellerPanel.php");

?>
