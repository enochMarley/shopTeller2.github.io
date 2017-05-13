<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<?php
    $stockName = $_GET['stockName'];
    $stockQuantity = $_GET['stockQuantity'];
    $stockId = $_GET['stockId'];
?>

<div class="container-fluid editDiv">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="well">
            <h3 style="text-align:center">Topup Stock</h3>
            <p style="text-align:center">Add Quantity Of '<?php echo $stockName; ?>' You Want To Add And Update</p><br><br>
            <form class="editStockForm" action="formHandlers/topupStockFormHandler.php" method="post">
                <input type="hidden" name="stockId" value="<?php echo $stockId; ?>">
                <input type="hidden" name="stockName" value="<?php echo $stockName; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label>Quantity Of <?php echo $stockName; ?> Left</label><br>
                        <input type="number" value="<?php echo $stockQuantity; ?>" min="0" disabled><br><br>
                    </div>
                    <div class="col-md-6">
                        <label>New Topup Quantity</label><br>
                        <input type="number" name="stockQuantity" required min="0" required min="0"><br><br>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="manageStockPanel.php"><button type="button" class="btn btn-danger">Cancel</button></a>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
