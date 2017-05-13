<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<?php
    include "../functions/dbConfig.php";

    $query1 = "select searchTerm from searchtbl where searchId = 1;";
	$result1 = $link->query($query1);
	$row1 = mysqli_fetch_assoc($result1);
	$search =  $row1['searchTerm'];

    #$query = "SELECT * FROM stocktbl WHERE stockName like '%$search%' OR stockPrice like '%$search%' OR searchQuantity like '%$searchQuantity%' ORDER BY stockName;";

    $query = "select * from stocktbl where stockName like '%".$search."%' or stockPrice like '%".$search."%' or stockQuantity like '%".$search."%' ORDER BY stockName;";
    $result = $link->query($query);
    if (mysqli_num_rows($result) > 0) { ?>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Stock</th>
                <th>Price GH&cent;</th>
                <th>Quantity Left</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>Top up</th>
              </tr>
            </thead>
            <tbody>

<?php   while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo $row['stockName']; ?></td>
                    <td><?php echo $row['stockPrice']; ?></td>
                    <td><?php echo $row['stockQuantity']; ?></td>
                    <td><a href="editStockForm.php?stockName=<?php echo $row['stockName']; ?>&stockPrice=<?php echo $row['stockPrice']; ?>&stockId=<?php echo $row['stockId']; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
                    <td><a href="deleteStockFrom.php?stockId=<?php echo $row['stockId']; ?>&stockName=<?php echo $row['stockName']; ?>" ><span class="glyphicon glyphicon-trash"></span></a></td>
                    <td><a href="topupStockForm.php?stockName=<?php echo $row['stockName']; ?>&stockQuantity=<?php echo $row['stockQuantity']; ?>&stockId=<?php echo $row['stockId']; ?>"><span class="glyphicon glyphicon-download-alt"></span></a></td>
                </tr>

<?php   } ?>
            </tbody>
        </table>
<?php
    }else{ ?>
        <br><br>
        <div class="jumbotron">
          <h3 style="text-align:center; color:#C0C0C0;">No Item Of The Search Term '<?php echo $search; ?>' Found</h3>
        </div>
<?php
    }

?>
<style media="screen">
    .editStockForm input{
        width:100%;border-radius: 3px;height: 35px;border: 1px solid #c0c0c0;
    }
</style>
