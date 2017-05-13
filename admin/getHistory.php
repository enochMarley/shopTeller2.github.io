<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<?php
    include "../functions/dbConfig.php";

    $query = "SELECT DISTINCT DATE(historyTime) AS historyDate FROM historytbl ORDER BY historyTime DESC;";
    $result = $link->query($query);
    if (mysqli_num_rows($result) > 0) {
        $historyId = 1;

        while ($row = mysqli_fetch_assoc($result)) {
                $mainDate = $row['historyDate'];?>

                    <button type="button" class="btn btn-info" style="width:100%;">
                        <?php echo $mainDate; ?>
                    </button><br><br>

        <?php
                $query1 = "SELECT historyActivity, TIME(historyTime) AS historyTime FROM historytbl WHERE DATE(historyTime) =  '$mainDate' ORDER BY historyTime";
                $result1 = $link->query($query1);
                if (mysqli_num_rows($result1) > 0){

                    while ($row1 = mysqli_fetch_assoc($result1)) {
                        $historyActivity =  $row1['historyActivity'];
                        $historyTime = $row1['historyTime']; ?>

                        <div class="alert alert-success">
                            <?php echo $historyActivity; ?>
                            <span style="float:right;"><?php echo $historyTime; ?></span>
                        </div>
<?php
                    }
                    echo "<br><br>";
                }

            $historyId ++;
        }

    }else{ ?>
        <br><br>
        <div class="jumbotron">
          <h3 style="text-align:center; color:#C0C0C0;">There Are No Activity Logs</h3>
        </div>
<?php
    }

?>
<style media="screen">
    .editStockForm input{
        width:100%;border-radius: 3px;height: 35px;border: 1px solid #c0c0c0;
    }
</style>
