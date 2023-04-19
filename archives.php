<?php session_start(); ?>

<!DOCTYPE html PUBLIC>
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<title>Admin</title>
<script src="js/jquery.js" type="text/javascript"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"  type="text/javascript"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">


</head>
<body><center>



    <!-- Start Top Bar -->
    <div class="top-bar" style="background-color: #148110; border-bottom: 5px solid #148110;" >
      <div class="top-bar-left">
        <ul class="menu"  style="background-color: #148110">
          <li class="menu-text" style="color:white;">
          
            <?php
                include 'dbConnection.php';
                if (!(isset($_SESSION['username']))  || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
                    session_destroy();
                    header("location:index.php");
                } else {
                    $name     = $_SESSION['name'];
                    $username = $_SESSION['username'];
                    
                    include_once 'dbConnection.php';
                    echo '<img src="images/school.png" width="56" height="56">';
                }
            ?></li>
          <li><li <?php
                if (@$_GET['q'] == 0)
                    echo 'class="active"';
                ?> ><a href="dash.php?q=0" style="color:white;">&nbsp;Home</a></li></li>

                <li <?php
                if (@$_GET['q'] == 1)
                    echo 'class="active"';
                ?>><a href="dash.php?q=1" style="color:white;">&nbsp; Student Records</a></li>
                

                <li <?php
                if (@$_GET['q'] == 2)
                    echo 'class="active"';
                ?>><a href="dash.php?q=2" style="color:white;">&nbsp;Leaderboards</a></li>

                <li <?php
                if (@$_GET['q'] == 4)
                    echo 'class="active"';
                ?>><a href="dash.php?q=4" style="color:white;">&nbsp;Add Quiz</a></li>

                <li <?php
                if (@$_GET['q'] == 5)
                    echo 'class="active"';
                ?>><a href="dash.php?q=5" style="color:white;">&nbsp;Quiz Session</a></li>
                

                <li <?php
                if (@$_GET['q'] == 7)
                    echo 'class="active"';
                ?>><a href="addlessonchoi.php" style="color:white;">&nbsp;Lessons Session</a></li>

                <li <?php
                if (@$_GET['q'] == 5)
                    echo 'class="active"';
                ?>><a href="logout.php?q=account.php" style="color: white;"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></li>
                


            </ul>
        </div>
    </div>

    <br>

    <!-- End Top Bar -->

<div class="container">
<div class="row"><div class="col-md-12">
<?php
    echo '<table class="table table-striped title"  style="vertical-align:middle; width: 100%; border: 1px solid black;">
    <div class="panel">
    <tr>
        <th style="vertical-align:middle; color: #000;"><b>Lesson Unit #</b></th>
        <th style="vertical-align:middle; color: #000;"><b>Headline</b></th>
        <th style="vertical-align:middle; color: #000;"><b>Ending</b></th>
    </tr>';
    
        $archiveTable = mysqli_query($con, "SELECT * FROM lesson");
        while($row = mysqli_fetch_array($archiveTable)) {
            $id = $row['lessonType'];
            $headline = $row['headline'];
            $ending = $row['ending'];
            $archive = $row['isArchive'];
            if($archive == 1) {
            echo '<tr>
                <td style="vertical-align:middle; text-align: center; color: #000;"><b>'. $id .'</b></td>
                <td style="vertical-align:middle; text-align: center; color: #000;">'. $headline .'</td>
                <td style="vertical-align:middle; text-align: center; color: #000;">'. $ending .'</td>
           </tr>
        </div>';
            } else {

            }
    
        }
    ?>
</table>
</div>
</div></div>
</center>
</body>
</html>
