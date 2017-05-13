<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<?php
    include "../functions/dbConfig.php";

    $query = "SELECT * FROM stocktbl WHERE stockQuantity < 11";
    $result = $link->query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $stockName = $row['stockName'];
            $stockQuantity = $row['stockQuantity'];
            echo "<div class='alert alert-danger'><strong>".$stockName."</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
            "&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quantity Left: ".$stockQuantity."</div>";
        }
    }else {?>
        <br><br>
        <div class="jumbotron">
          <h3 style="text-align:center; color:#C0C0C0;">All Items In Stock Are Enough</h3>
        </div>

<?php
    }
?>
