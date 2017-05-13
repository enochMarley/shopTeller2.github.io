<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<?php
    $stockName = $_GET['stockName'];
    $stockPrice = $_GET['stockPrice'];
    $stockId = $_GET['stockId'];
?>

<div class="container-fluid editDiv">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="well">
            <h3 style="text-align:center">Edit Stock</h3>
            <p style="text-align:center">Input The Fields You Want To Edit And Click 'Edit' To Effect Changes.</p><br><br>
            <form class="editStockForm" action="formHandlers/editStockFormHandler.php" method="post">
                <input type="hidden" name="stockId" value="<?php echo $stockId; ?>">
                <input type="hidden" name="oldStockName" value="<?php echo $stockName; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <label>Stock Name</label><br>
                        <input type="text" name="stockName" value=" <?php echo $stockName; ?>" required><br><br>
                    </div>
                    <div class="col-md-6">
                        <label>Stock Price (GH&cent;)</label><br>
                        <input type="number" name="stockPrice" value="<?php echo $stockPrice; ?>" step="any" required min="0"><br><br>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="manageStockPanel.php"><button type="button" class="btn btn-danger">Cancel</button></a>
            </form>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
