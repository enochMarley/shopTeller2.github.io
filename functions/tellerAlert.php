<?php
    function showAlertNumber(){
        include "dbConfig.php";
        $query = "SELECT * FROM stocktbl WHERE stockQuantity < 11";
        $result = $link->query($query);
        if (mysqli_num_rows($result) > 0) {
            echo  mysqli_num_rows($result);
        }else {
            echo "";
        }
        $link->close();
    }

    function showSales(){
        include "dbConfig.php";
        $query = "SELECT salesMade FROM salestbl WHERE saleId = 1";
        $result = $link->query($query);
        $row = mysqli_fetch_assoc($result);
        $sales = $row['salesMade'];
        echo "GH<span>&cent;</span> ".$sales;
        $link->close();
    }
?>
