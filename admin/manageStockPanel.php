<?php
    session_start();
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
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <style media="screen">
        body{
            overflow-y: hidden;
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <a class="navbar-brand" href="#">By All Means Enterprise Admin Panel</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="selected"><a href="#"><span class="glyphicon glyphicon-yen"></span> Manage Stock</a></li>
                <li><a href="historyPanel.php"><span class="glyphicon glyphicon-time"></span> History</a></li>
                <li><a href="manageTellerPanel.php"><span class="glyphicon glyphicon-book"></span> Manage Tellers</a></li>
                <li><a href="manageShotStock.php"><span class="glyphicon glyphicon-th-list"></span> Show Shot Stock</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['username']; ?></a></li>
                <li><a href="../functions/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
          </div>
        </div>
    </nav>
    <nav class="navbar navbar-default navbar-fixed-bottom">
      <h4 class="text-center">By All Means Ventures | Location:Aiyinase,Nzema | Contact: 0272602293 / 0554722841</h4>
    </nav>
    <div class="container-fluid manStockDiv">
        <div class="row"><br>
            <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="stockFormDiv">
                        <p class="addMsg"></p>
                        <form class="stockForm" action="" method="post">
                            <input type="text" name="stockSearch" placeholder=" Search For Stock" class="searchInput">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> ADD</button>
                        </form>
                    </div><br>
                    <div class="stockView"><p></p></div>
                </div>
            <div class="col-md-1"></div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog" aria-hidden="true">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add Details Of Stock</h4>
            </div>
            <div class="modal-body">
              <form class="addStockForm" method="post" action="addStock.php">
                <label>Stock Name (Specify Type)</label><br>
                <input type="text" class="stockName" name="stockName" required ><br><br>
                <label>Stock Price (GH&cent;)</label><br>
                <input type="number" class="stockPrice" name="stockPrice" min="0" required step="any" ><br><br>
                <label>Stock Quantity</label><br>
                <input type="number" class="stockQuantity" name="stockQuantity" min="0" required ><br><br>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" >Add</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </form>
            </div>
          </div>

        </div>
    </div>
    <script src="../js/jquery2.2.4.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function getAllStock(){
            $.ajax({
                method: 'GET',
                url: 'getStock.php',
                success: function(data){
                    $('.stockView').html(data);
                },
                error: function(error){
                    console.log("Error " +error);
                }
            });
        }

        function getSearchStock(){
            $.ajax({
                method: 'GET',
                url: 'getSearchStock.php',
                success: function(data){
                    $('.stockView').html(data);
                },
                error: function(error){
                    console.log("Error " +error);
                }
            });
        }
        getAllStock();

        $('.searchInput').on('input',function(){
            var searchTerm = $('.searchInput').val();

            var searchData = {'searchTerm': searchTerm};

            $.ajax( {
                type: "POST",
                url: "searchStockForm.php",
                data: searchData,
                dataType: 'text',
                success: function( data ) {
                    getSearchStock();
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });


    </script>
  </body>
</html>
