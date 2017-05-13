<?php
    include "../functions/dbConfig.php";

    $stockName = $_POST['stockName'];
    $stockPrice = $_POST['stockPrice'];
    $stockQuantity = $_POST['stockQuantity'];
    $query1 = "SELECT * FROM stocktbl WHERE stockName = '$stockName'";
    $result1 = $link->query($query1);
    if (mysqli_num_rows($result1) > 0) {?>
        <script type="text/javascript">
            alert("An Item With The Name ' <?php echo $stockName; ?> ' already exists!");
            window.location = 'manageStockPanel.php';
        </script>
<?php
    }else {
        # code...

        $query = "INSERT INTO stocktbl(stockName,stockPrice,stockQuantity) VALUES('$stockName',$stockPrice,$stockQuantity)";
        $result  = $link->query($query);
        if ($result) { ?>
            <script type="text/javascript">
                alert("Item Added Successfully");
                window.location = 'manageStockPanel.php';
            </script>
    <?php
        }else{?>
            <script type="text/javascript">
                alert("Error: Check Your Interenet Connection!");
                window.location = 'manageStockPanel.php';
            </script>
    <?php
        }
    }
?>
