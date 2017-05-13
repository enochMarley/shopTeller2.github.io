<?php
    include "../../functions/dbConfig.php";
    session_start();
    $tellerName = $_POST['tellerName'];
    $tellerId = $_POST['tellerId'];
    $query = "DELETE FROM tellertbl WHERE tellerId = $tellerId";
    $result = $link->query($query);
    if ($result) {
        $historyStatement = "The teller  $tellerName was deleted from the teller database by ".$_SESSION['username'];
        $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    }
    $link->close();
    header("Location: ../manageTellerPanel.php");
?>
