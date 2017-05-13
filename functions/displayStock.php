<?php
    function displayStockFunc(){
        include "dbConfig.php";
        $query  = "SELECT * FROM stocktbl WHERE stockQuantity > 0 ORDER BY stockName ASC";
        $result  = $link->query($query);

        if (mysqli_num_rows($result) > 0){
            echo "<option disabled selected>Select Item</option>";
            while ($row = mysqli_fetch_assoc($result)) {
                $itemName = $row['stockName'];
                $itemPrice = $row['stockPrice'];
                echo "<option value='$itemName'>$itemName</option>";
            }
        }else {
            echo "<option disabled selected>No Stock</option>";
        }
    }

?>
