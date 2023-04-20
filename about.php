<?php
session_start();
include 'dbConnection.php';
$sess_user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="page">
  <header tabindex="0">About Us</header>
  <div id="nav-container">
    <div class="bg"></div>
    <div class="button" tabindex="0">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </div>  
    <div id="nav-content" tabindex="0">
      <ul>
      <center><li><a href=""><img src="images/avatars.jpg" alt="avatar" style="height: 200px; width: 200px;" ></a></li></center>
        <li><a href="account2.php?q=1">
        <?php


            if (!(isset($sess_user))) {
                session_destroy();
            } else {
                $name     = $_SESSION['name'];
                $username = $_SESSION['username'];

                echo '<br><span>
                <span style="color:#006aff;">
                <h2 style="color:#148110; font-weight: bold; "> ' .$username.'<h5 style="color:gray">Student</h5></h2>';
            }
        ?>
        </a></li>
        <li><a href="account2.php">Home</a></li>
        <li><a href="lessonunits.php">Lessons</a></li>
        <li><a href="quizunits.php">Quizzes</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="account.php?q=3">student rankings</a></li>
        <li><a href="logout.php?q=account.php">log out</a></li>
      </ul>
    </div>
  </div>

  <br>  
  <br>  
  <br>  
  <br>  
  <br>  
  <br>  
<center>

<img src="images/school.png" style="width: 150px; height: 150px;";
<br>
<h1>Mountaintop Chrstian Academy</h1>
<br>
<p>
Address:<br>
Purok 3 Penafrancia, Antipolo, 1820 Rizal
<br>
<br>
Email: <br>
Mountaintopcristianacademy@yahoo.com
<br>
<br>
Contact Number:
(02) 386 4299</p>
          </center>

</body>
</html>