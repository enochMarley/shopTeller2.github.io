<?php
    session_start();
    include "functions/displayStock.php";
    include "functions/tellerAlert.php";
    if (!isset($_SESSION['username'])) {
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style media="screen">
        body{
            background: ;
        }
    </style>
  </head>
  <body data-spy="scroll" data-target="#myScrollspy" data-offset="20">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">By All Means Enterprise Teller Panel</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Sales Made Today: <?php showSales(); ?></a></li>
                <li><a href="#" data-toggle="popover" data-content="<?php showAlertNumber(); ?> items are either finished or are getting finished. Inform manager/ admin"
                    data-trigger="hover" data-placement="bottom">
                    <span class="glyphicon glyphicon-bell"></span> Messages<sup><span class="badge"><?php showAlertNumber(); ?></span></sup></a></li>

                <li class="dropdown">
                   <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?>
                   <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                     <li><a href="functions/logout2.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                     <!--<li><a data-toggle="modal" href="#sendModal"><span class="glyphicon glyphicon-send"></span> Send Daily Sales</a></li>-->
                   </ul>
                </li>
            </ul>
          </div>
        </div>
    </nav>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <h4 class="text-center">By All Means Ventures | Location:Aiyinase,Nzema | Contact: 0272602293 / 0554722841</h4>
    </nav>

    <div class="container-fluid manStockDiv">
        <div class="row"><br>
                <div class="col-md-7">
                    <div class="itemsDiv">
                        <p class="addMsg"></p>
                        <div class="well" style="opacity:0.8">
                            <form class="itemsForm"  method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Select Item</label><br>
                                        <select class="items" name="items"><?php displayStockFunc(); ?></select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Quantity Of Item</label><br>
                                        <input type="number" name="itemQuantity" class="itemQuantity" required min="1" value="1" required>
                                    </div>
                                </div><br><br>
                                <button type="button" class="btn btn-default addMoreBtn">Add To Cart</button>
                                <button type="submit" class="btn btn-primary doneBtn" form="itemsForm">Done</button>
                                <button type="button" class="btn btn-primary itemsBought">Number Of Items Bought: 0</button>
                                <button type="button" class="btn btn-primary quantityLeft"></button>
                            </form>
                        </div>
                    </div>
                    <div class="itemsDivSmall"></div>

                </div>
            <div class="col-md-5">
                <div class="dialPadDiv well" style="opacity:0.8">
                    <div class="container-fluid padDiv">
                        <h4 style="text-align:center;">NUMBER PAD</h4><br>
                        <div class="row">
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(1)">1</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(2)">2</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(3)">3</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(4)">4</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(5)">5</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(6)">6</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(7)">7</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(8)">8</button>
                          </div>
                          <div class="col-md-4">
                              <button type="button" name="button" onclick="showNum(9)">9</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                                <button type="button" name="button" class="addMoreBtn">OK</button>
                           </div>
                          <div class="col-md-8">
                              <button type="button" name="button" onclick="clearNumPad()">CLEAR</button>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success summaryDiv" style="opacity:0.8">
                    <div class="row itemsDivSmall2"></div><br>
                    <div class="row">
                        <div class='col-md-6'>
                            <input required type='number' step="any" class='amountGiven' placeholder='Amount Given' name='amountGiven' style='height:40px;border-radius:30px;border:1px solid #c0c0c0;width:100%;text-align:center;font-weight:bold'/>
                        </div>
                        <div class='col-md-2'><button class='btn btn-success checkOutBtn'>Checkout</button></div>
                        <div class='col-md-2'><button class='btn btn-danger cancelCheckoutBtn'>Cancel</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sendModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Details Of Stock</h4>
            </div>
            <div class="modal-body">
                <h3>Are your sure you want to send sales?</h3>
            </div>
            <div class="modal-footer">
              <a href="sendSales.php"><button type="button" class="btn btn-success">Proceed</button></a>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </div>

        </div>
    </div>

    <script src="js/jquery2.2.4.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="popover"]').popover();
        });
        var numPad = [];
        var items = [];
        var qLeft = 0;
        var show = "";
        var numbers;
        $('.summaryDiv').hide();
        $('.itemQuantity').on('input', function(){
            if ($(this).val().length > 0 && $(this).val() != 0 && $(this).val() >= 1) {
                $('.addMoreBtn').prop('disabled',false);
            }else if ($(this).val() == 0){
                $('.addMoreBtn').prop('disabled',true);
            }else if ($(this).val().length < 1){

                $('.addMoreBtn').prop('disabled',true);
            }
        });

        $('.items').on('change', function(){
            var itemsName = $('.items').val();
            var itemData = {'itemsName': itemsName};
            $.ajax( {
                type: "POST",
                url: "getQuantityLeft.php?itemsName="+itemsName,
                data: itemsName,
                dataType: 'text',
                success: function( data ) {
                    qLeft = data;
                    $('.quantityLeft').html("Quantity Of  " + itemsName + " left: "+ qLeft );
                },
                error: function(error){
                    console.log(error);
                }
            });
        });

        $('.doneBtn').prop('disabled',true);

        $('.addMoreBtn').on('click', function(){
            $('.quantityLeft').html('');
            var itemValue = $('.items').val();
            var itemQuantity = $('.itemQuantity').val();
            var newQuantity = qLeft - itemQuantity;
            if (newQuantity < 0) {
                $('.quantityLeft').html(itemQuantity +"  samples of " + itemValue + " cannot be purchased. There is "+ qLeft+" left" );
            }else if (itemValue != null && itemQuantity >= 1) {
                var itemValue = $('.items').val();
                var itemQuantity = $('.itemQuantity').val();
                var itemBought = itemValue+ " "+itemQuantity;
                items.push(itemBought);
                var lastItem = items[items.length -1 ];
                var showItem = lastItem.split(" ");
                var quan = showItem[showItem.length -1];
                var itName = showItem.slice(0,showItem.length -1);
                var itemName = itName[0];

                for (var i = 1; i < (itName.length); i++) {
                    itemName = itemName + " "+itName[i];
                }

                show = $("<div class='alert alert-info alert-dismissible showAlert'><button class='close' onclick='removeItem("+items.indexOf(items[items.length -1])+")' data-dismiss='alert'>&times;</button>"+
                "<span><strong>Item:</strong> "+itemName+"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Quantity:</strong> "+quan+"</span></div>");
                $('.itemsBought').html("Number Of Items Bought: "+items.length);
                $('.itemsDivSmall').after(show);
                $('.itemQuantity').val(1);
                numPad = [];
            }

            if (items.length > 0) {
                $('.doneBtn').prop('disabled',false);
            }

        });

        //the removeItem function to remove items from the array
        function removeItem(index){

            if (items.length == 1) {
                items = [];
                $('.doneBtn').prop('disabled',true);
            }else if (items.length > 1){
                items.splice(index,1);
            }

            $('.itemsBought').html("Number Of Items Bought: "+items.length);
            console.log(items);
        }

        //when the 'Done' button is clicked
        $('.doneBtn').on('click',function(){
            var itemNm = 0;
            var res;
            $.ajax( {
                type: "POST",
                url: 'calculateItems.php?itemsBought='+JSON.stringify(items),
                data: itemNm,
                dataType: 'text',
                success: function( data ) {

                    $('.summaryDiv').show();
                    $('.itemsDivSmall2').html(data);
                },
                error: function(error){
                    console.log(error);
                }
            });
            //window.location = 'calculateItems.php?itemsBought='+JSON.stringify(items);
        });

        function showNum(num){
            numPad.push(num);
            numbers = numPad.join('');
            $('.itemQuantity').val(parseInt(numbers));
            //alert(num);
        }
        function clearNumPad(){
            numPad = [];
            numbers = 1;
            $('.itemQuantity').val(parseInt(numbers));
        }

        $('.checkOutBtn').on('click', function(){
            var amountGiven = $('.amountGiven').val();
            if (amountGiven == "" || amountGiven == null) {
                alert("Enter the amount that the customer paid");
            }else {
                window.location = 'checkOut.php?itemsBought='+JSON.stringify(items)+"&amountPaid="+amountGiven;
            }
            //window.location = 'checkOut.php'//?itemsBought='+JSON.stringify(items)+"&amountPaid="+amountGiven;
        });

    </script>
  </body>
</html>
