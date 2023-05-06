<?php 
session_start(); 
include 'dbConnection.php';
?>

<!DOCTYPE html PUBLIC>
<html>
<head>
<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<title>Edit Quiz</title>
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
<?php

$quizU = @$_GET['qU'];
$id = @$_GET['eid'];
$n = @$_GET['n'];

$sql = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$id' AND status='enabled'");
if(!$sql) {
   die('Error: ' . mysqli_error($con));
}
while($row=mysqli_fetch_assoc($sql)) {
    $id = $row['eid'];
    $title = $row['title'];
    $remarks = $row['correct'];
    $time = $row['time'];
    $quizunit = $row['quizUnit'];
}
?>
<form method="POST" action="editQ.php">
<center>
<input type="hidden" name="id" value="<?php echo $id; ?>">  
<label for="title">Title</label>
<input type="text" name="title" class="texta1" rows="10" cols="90" style="width: 70%;" value="<?php echo $title; ?>"><BR><BR>
<label for="remarks">Remarks (score if correct)</label>
<input type="text" name="remarks" class="texta1" rows="10" cols="90" style="width: 70%;" value="<?php echo $remarks; ?>"><BR><BR>
<label for="time">Time</label>
<input type="text" name="time" class="texta1" rows="10" cols="90" style="width: 70%;" value="<?php echo $time; ?>"><BR><BR>
<label for="quizunit">Quiz Unit</label>
<input type="text" name="quizunit" class="texta1" rows="10" cols="90" style="width: 70%;" value="<?php echo $quizunit; ?>"><BR><BR>

<input type="submit" value="Update" style="border:6px solid #A2D2FF;
text-align: center;
background-color: #125C13; 
border: none; color: white;
padding: 15px 32px;
text-decoration: none;
font-size: 16px;
width: 70%;
cursor: pointer;
border-radius: 10px;"> <br>
</center>
