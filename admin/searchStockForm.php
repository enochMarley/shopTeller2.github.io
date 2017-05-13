<?php
    //the script to handle the editing of stocks
    include "../functions/dbConfig.php";

    $searchTerm = $_POST['searchTerm'];

    $query = "UPDATE searchtbl SET searchTerm = '$searchTerm'  WHERE searchId = 1;";

    $result = $link->query($query);
    $link->close();

?>
