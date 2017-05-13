<?php
    include "functions/dbConfig.php";
    include "functions/displayStock.php";
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }

    $itemsBought = json_decode($_GET['itemsBought']);
    $amountGiven = $_GET['amountPaid'];
    $totalPrice = 0;
    $vatRate = 0.00;
    $nhisRate = 0.00;
    //echo "Item<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>Qty<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>Price<span>&nbsp;&nbsp;&nbsp;&nbsp;</span>Amount<br>";
    ?>
    <title>Receipt</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css"><br><br><br><br>
    <div class="printDiv">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 well">
    <table cellpadding="0" cellspacing="3">
        <tr>
            <td colspan="4">BY ALL MEANS ENTERPRISE</td>
        </tr>
        <tr>
            <td colspan="4">SALES SUMMARY</td>
        </tr>
        <tr>
            <td>TELLER</td>
            <td><?php echo $_SESSION['username']; ?></td>
        </tr>
        <tr>
            <td  colspan="4"><?php echo Date('F j, Y, g:i a'); ?></td>
        </tr>
        <tr>
            <td>Item</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Total Price</td>
        </tr>
        <tr>
            <th colspan="4"><?php  echo "------------------------------------------------------------"; ?></th>
        </tr>
        <tbody>


<?php
    //echo "------------------------------------------------<br>";
    for ($i=0; $i < count($itemsBought); $i++) {
        $oneItem = $itemsBought[$i];
        $item = explode(' ',$oneItem);
        $quantity =  intval($item[count($item) -1]);
        array_pop($item);
        $itemGot = join(' ', $item);
        //echo "You bought ".$quantity." pieces of ".$itemGot."<br>";
        $query = "SELECT * FROM stocktbl WHERE stockName = '$itemGot';";
        $result = $link->query($query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $stockName = $row['stockName'];
                $stockPrice = $row['stockPrice'];
                $stockQuantity = $row['stockQuantity'];
                $stockId = $row['stockId'];

                $itemPrice = $stockPrice * $quantity;
                $newStockQuantity = $stockQuantity - $quantity;
                $link->query("UPDATE stocktbl SET stockQuantity = $newStockQuantity WHERE stockId = $stockId");
            }
        }?>
        <tr>
            <td><?php echo $stockName;?></td>
            <td><?php echo $stockPrice;?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $itemPrice;?></td>
        </tr>
<?php
        $totalPrice += $itemPrice;
    }
    $vatCharge = $vatRate * $totalPrice;
    $nhilCharge = $nhisRate * $totalPrice;
    $netPrice = $totalPrice + $vatCharge + $nhilCharge;
    $change =   $amountGiven -$netPrice;

    $fetchSalesQuery = "SELECT * FROM salestbl WHERE saleId = 1";
    $fResult = $link->query($fetchSalesQuery);
    $row = mysqli_fetch_assoc($fResult);
    $oldSales = $row['salesMade'];
    $newSales = $netPrice + $oldSales;
    $link->query("UPDATE salestbl SET salesMade = $newSales WHERE saleId = 1;");
    $historyStatement = $_SESSION['username']." made sales amounting to GHC ".$netPrice;
    $link->query("INSERT INTO historytbl(historyActivity) VALUES('$historyStatement');");
    $link->close();
    ?>
    <tr>
        <th colspan="4"><?php  echo "------------------------------------------------------------"; ?></th>
    </tr>
    <tr>
        <td>Total Price: </td>
        <td><span>GH&cent;</span> <?php echo $totalPrice;?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>VAT (1%): </td>
        <td><span>GH&cent;</span> <?php echo $vatCharge;?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>NHIL (2%): </td>
        <td><span>GH&cent;</span> <?php echo $nhilCharge;?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Net Price: </td>
        <td><span>GH&cent;</span> <?php echo $netPrice;?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th colspan="4"><?php  echo "------------------------------------------------------------"; ?></th>
    </tr>
    <tr>
        <td>Amount Paid: </td>
        <td><span>GH&cent;</span> <?php echo $amountGiven;?></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td>Change: </td>
        <td><span>GH&cent;</span> <?php echo round($change, 2);?></td>
        <td></td>
        <td></td>
    </tr>
        </tbody>
    </table><br><br>
    <button style="width:30%;" type="button" name="button" class="btn btn-primary" onclick="window.location.href  = 'tellerPanel.php'">OK</button>
    </div>
        <div class="col-md-4"></div>
    </div>
    </div>
    <br><br>
 
 <style media="screen">
     @media print{
         .printDiv{
             background-color: #fff;
             height: 100%;
             width: 100%;
             position: fixed;
             top: 0;
             left: 0;
             margin: 0;
             padding: 15px;
             font-size: 12px;
             line-height: 18px;
         }
     }
 </style>
<script src="js/jquery2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>