<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/styles.css">
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>

<?php
    include "../functions/dbConfig.php";
    $query = "SELECT * FROM tellertbl";
    $result = $link->query($query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $tellerId = $row['tellerId'];
            $tellerName = $row['tellerName'];
            $tellePassword = $row['tellerPassword'];

            echo "<div class='alert alert-info alert-dismissible'><strong>".$tellerName."</strong>".
            "<div style='float:right;'><a href='editTeller.php?tellerId=$tellerId&tellerName=$tellerName&tellerPassword=$tellePassword'><span class='glyphicon glyphicon-pencil'></span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".
            "<a href='deleteTeller.php?tellerId=$tellerId&tellerName=$tellerName'><span class='glyphicon glyphicon-trash'></span></a></div></div>";
        }
    }else { ?>

        <br><br>
        <div class="jumbotron">
          <h3 style="text-align:center; color:#C0C0C0;">There Are No Tellers In The Teller Database.</h3>
        </div>

<?php
    }
?>
