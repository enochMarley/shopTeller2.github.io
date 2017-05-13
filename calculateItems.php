<?php
    session_start();
    include "functions/displayStock.php";
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
    include "functions/dbConfig.php";
    $itemsBought = json_decode($_GET['itemsBought']);
    $totalPrice = 0;
    $vatRate = 0.00;
    $nhisRate = 0.00;

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
                $stockPrice = $row['stockPrice'];
                $stockId = $row['stockId'];

                $itemPrice = $stockPrice * $quantity;

                $totalPrice += $itemPrice;
            }
        }
    }
    $vatCharge = $vatRate * $totalPrice;
    $nhilCharge = $nhisRate * $totalPrice;
    $netPrice = $totalPrice + $vatCharge + $nhilCharge;
    echo "<div class='col-md-3'><strong>Total Amount: </strong><br>GH&cent $totalPrice</div>".
        "<div class='col-md-3'><strong>VAT (1%):</strong><br> GH&cent$vatCharge</div>".
        "<div class='col-md-3'><strong>NHIL (2%):</strong><br>GH&cent $nhilCharge</div>".
        "<div class='col-md-3'><strong>Net Total :</strong><br>GH&cent".round($netPrice,2)."</div>";

?>
