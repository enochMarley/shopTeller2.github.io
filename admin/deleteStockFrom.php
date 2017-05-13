<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<?php
    $stockId = $_GET['stockId'];
    $stockName = $_GET['stockName'];
?>

<div class="container-fluid editDiv">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="well">
            <h3 style="text-align:center">Delete Stock</h3><br><br>
            <form class="editStockForm" action="formHandlers/deleteStockFormHandler.php" method="post">
                <input type="hidden" name="stockId" value="<?php echo $stockId; ?>">
                <input type="hidden" name="stockName" value="<?php echo $stockName; ?>">
                <h4 style="text-align:center">Are You Sure You Want To Delete <?php echo $stockName; ?> From The Stock List?</h4><br><br>
                <button type="submit" class="btn btn-success">Yes</button>
                <a href="manageStockPanel.php"><button type="button" class="btn btn-danger">No</button></a>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
