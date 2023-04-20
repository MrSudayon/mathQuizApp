<?php 
session_start(); 
include 'dbConnection.php';
$Qunit = @$_GET['unit'];
?>

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
<body>
<center><!-- Start Top Bar -->
    <div class="top-bar" style="background-color: #148110; border-bottom: 5px solid #148110;" >
      <div class="top-bar-left">
        <ul class="menu"  style="background-color: #148110">
          <li class="menu-text" style="color:white;">
          
            <?php
                
                if (!(isset($_SESSION['username']))  || ($_SESSION['key']) != '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39') {
                    session_destroy();
                    header("location:index.php");
                } else {
                    $name     = $_SESSION['name'];
                    $username = $_SESSION['username'];
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
<?php
include 'dbConnection.php';
$n = @$_GET['n'];
$eid = @$_GET['eid'];
echo ' 
                  <div class="">
                  <div class="row">
                  <span class="title1" style="font-size:30px;"><b>Enter Quiz Details <p style="background-color: #09009B; color: white; border-radius: 10px;"> Quiz Unit '. $Qunit .'</p></h5></b></span><br /><br />
                   <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz&qUnit='.$Qunit.'"  method="POST">
                  <fieldset>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="name"></label>  
                    <div class="col-md-12">
                    <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="total"></label>  
                    <div class="col-md-12">
                    <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
                      
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="right"></label>  
                    <div class="col-md-12">
                    <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
                      
                    </div>
                  </div>

                  </div>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="time"></label>  
                    <div class="col-md-12">
                    <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
                      
                    </div>
                  </div>
                  
                  <br>
                  <div class="form-group">
                    <label class="col-md-12 control-label" for=""></label>
                    <div class="col-md-12"> 
                      <button type="submit" style="text-align:center; background-color: #125C13; /* Green */
                      border: none;
                      color: white;
                      padding: 10px 32px;
                      text-align: center;
                      text-decoration: none;
                      display: inline-block;
                      font-size: 16px;
                      border-radius: 30px;" class="btn btn-primary"/>Continue</a>
                    </div>
                  </div>
                  <br><br>
                  </fieldset>
                  </form></div>';
?>