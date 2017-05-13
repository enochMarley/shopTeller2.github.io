<?php
    $delTellerName = $_GET['tellerName'];
    $delTellerId = $_GET['tellerId'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Teller</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="well" style="margin-top: 20vh;">
                    <h3 style="text-align:center;">Delete Teller</h3>
					<form class="deleteTelerForm" action="formHandlers/deleteTellerFormHandler.php" method="post">
                        <h4  style="text-align: center;">Are You Sure You Want To Delete ' <?php echo $delTellerName; ?> '
                        From The Teller Database?</h4><br>
                        <input type="hidden" name="tellerId" value="<?php echo $delTellerId; ?>">
                        <input type="hidden" name="tellerName" value="<?php echo $delTellerName; ?>">
						<button type="submit" class="btn btn-success submitBtn">Yes</button>
						<a href='manageTellerPanel.php'><button type="button" class="btn btn-danger submitBtn">No</button></a>
					</form><br><br>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
    <script src="../js/jquery2.2.4.min.js"></script>
    <script src="../js/jquery-ui.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
