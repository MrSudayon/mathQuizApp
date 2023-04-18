<!DOCTYPE html>
<html lang="en">
<head>

  <?php
  if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';}?>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>


</head>
<body>
<?php include_once 'dbConnection.php'; ?>


<div class="page">
  <header tabindex="0">Dashboard</header>
  <div id="nav-container">
    <div class="bg"></div>
    <div class="button" tabindex="0">
    <a href="account2.php?q=1"> <i class="fa fa-chevron-left fa-lg" style="color: white; "></i> </a>
    </div>  
    <div id="nav-content" tabindex="0">
      <ul>
        <center><li><a href=""><img src="images/avatar.jpg" alt="avatar" style="height: 200px; width: 200px;" ></a></li></center>
        <li><a href="account2.php?q=1">
        <?php
            include_once 'dbConnection.php';
            session_start();
            if (!(isset($_SESSION['username']))) {
                header("location:index.php");
            } else {
                $name     = $_SESSION['name'];
                $username = $_SESSION['username'];
                include_once 'dbConnection.php';

                echo '<br><span>
                <span style="color:#007938;">
                <h2 style="color:#007938; font-weight: bold; "> ' .$username.'<h5 style="color:gray">Student</h5></h2>';
            }
        ?>
        </a></li>
        
        <li><a href="account2.php?q=1">Home</a></li>
        <li><a href="account.php?q=2">History</a></li>
        <li><a href="account.php?q=3">Score</a></li>
        <li><a href="logout.php?q=account.php">Logout</a></li>
        <li class="small"><a href="#0">Facebook</a><a href="#0">Instagram</a></li>
      </ul>
    </div>
  </div>

  
  <main>
  <br>

  <body>
    
  </body>
  
  <div class="row medium-8 large-7 columns">
      <div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="unit1a.php" style="color: white; font-weight: bold; font-size: 18px;"><i class="fa fa-pencil-square-o"></i>&nbsp;UNIT 1: “Addition”  &nbsp;</a>
              </p>
     </div>
     <br>
     <div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="unit1b.php" style="color: white; font-weight: bold; font-size: 18px;"><i class="fa fa-pencil-square-o"></i>&nbsp;UNIT 1: “Substraction”  &nbsp;</a>
              </p>
     </div>
<br>


</main>



</body>
</html>