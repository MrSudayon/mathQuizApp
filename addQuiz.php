<?php
include 'dbConnection.php';
session_start();
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
<body><center>



    <!-- Start Top Bar -->
    <div class="top-bar" style="background-color: #148110; border-bottom: 5px solid #148110;" >
      <div class="top-bar-left">
        <ul class="menu"  style="background-color: #148110">
          <li class="menu-text" style="color:white;">
          
            <?php
                include_once 'dbConnection.php';
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
<div class="row">
<div class="col-md-12">
<?php
if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {

    $qUnit = @$_GET['unit'];
    $n = @$_GET['n'];
    $eid = @$_GET['eid'];
    echo ' 

    <div class="">
    <span class="title1" style="font-size:30px;"><b>Enter Question Details <p style="background-color: #F0A500; color: white; ">Quiz Unit '. $qUnit .'</p></b></span><br /><br />
     <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . $n . '&eid='. $eid .'&ch=4" method="POST">
    <fieldset>
    </div>

    ';
        
        for ($i = 1; $i <= $n; $i++) {
            echo '<b>Question number&nbsp;' . $i . '&nbsp;:</><br />
            <!-- Text input-->
          <div class="form-group">
            <label class="col-md-12 control-label" for="qns' . $i . ' "></label>  
            <div class="col-md-12">
            <textarea rows="3" cols="5" name="qns' . $i . '" class="form-control" placeholder="Write question number ' . $i . ' here..."></textarea>  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-12 control-label" for="' . $i . '1"></label>  
            <div class="col-md-12">
            <input id="' . $i . '1" name="' . $i . '1" placeholder="Enter option a" class="form-control input-md" type="text">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="' . $i . '2"></label>  
                <div class="col-md-12">
                <input id="' . $i . '2" name="' . $i . '2" placeholder="Enter option b" class="form-control input-md" type="text">
                  
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="' . $i . '3"></label>  
                <div class="col-md-12">
                <input id="' . $i . '3" name="' . $i . '3" placeholder="Enter option c" class="form-control input-md" type="text">
                  
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="' . $i . '4"></label>  
                <div class="col-md-12">
                <input id="' . $i . '4" name="' . $i . '4" placeholder="Enter option d" class="form-control input-md" type="text">
                  
                </div>
              </div>
              <br />
              <b>Correct answer</b>:<br />
              <select id="ans' . $i . '" name="ans' . $i . '" placeholder="Choose correct answer " class="form-control input-md" >
                <option value="a">Select answer for question ' . $i . '</option>
                <option value="a">option a</option>
                <option value="b">option b</option>
                <option value="c">option c</option>
                <option value="d">option d</option> </select><br /><br />';
                  }
        
        echo '
        <br>
        <input  type="submit" style="text-align:center;  background-color: #125C13; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        border-bottom-left-radius: 30px;
        border-bottom-right-radius: 30px;
        border-top-left-radius: 30px;
        border-top-right-radius: 30px;"  value="Submit"/>  
      

        <br><br>
    </div>
    </fieldset>
    </form></div>
      </div>


';}

?>
</div>
</div></div>
</body>
</html>