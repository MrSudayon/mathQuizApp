<?php session_start(); ?>
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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Quizzes</title>


</head>
<body>
<?php include 'dbConnection.php'; ?>


<div class="page">
  <header tabindex="0">Quiz Units</header>
  <div id="nav-container">
    <div class="bg"></div>
    <div class="button" tabindex="0">
    <a href="account2.php?q=1"> <i class="fa fa-chevron-left fa-lg" style="color: white; "></i> </a>
    </div>  
    <div id="nav-content" tabindex="0">
      <ul>
      <center><li><a href=""><img src="images/avatars.jpg" alt="avatar" style="height: 200px; width: 200px;" ></a></li></center>

        <li><a href="account2.php?q=1">
        <?php
            if (!(isset($_SESSION['username']))) {
                header("location:index.php");
            } else {
                $name     = $_SESSION['name'];
                $username = $_SESSION['username'];

                echo '<br><span>
                <span style="color:#148110;">
                <h2 style="color:#148110; font-weight: bold; "> ' .$username.'<h5 style="color:gray">Student</h5></h2>';
            }
        ?>
        </a></li>
        <li><a href="account2.php">Home</a></li>
        <li><a href="lessonunits.php">Lessons</a></li>
        <li><a href="lessonunits.php">Quizzes</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="account.php?q=3">student rankings</a></li>
        <li><a href="logout.php?q=account.php">log out</a></li>
      </ul>
    </div>
  </div>

  <br>
  <main>
  
  <div class="row medium-8 large-7 columns">
      <div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="account.php?q=1&unit=1" style="color: white; font-weight: bold; font-size: 18px;"><i class="fa-sharp fa-solid fa-square-check fa-fw"></i>&nbsp;UNIT 1 QUIZ</a></p>
     </div>

     <br>

     <div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="account.php?q=1&unit=2" style="color: white; font-weight: bold; font-size: 18px;"><i class="a-sharp fa-solid fa-square-check fa-fw"></i>&nbsp;UNIT 2 QUIZ</a></p>
     </div>

<br>
     <div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="account.php?q=1&unit=3" style="color: white; font-weight: bold; font-size: 18px;"><i class="a-sharp fa-solid fa-square-check fa-fw"></i>&nbsp;UNIT 3 QUIZ</a>
              </p>
     </div>
<br>

<div class="blog-post">
        <div class="boxas">
            <p class="title-content"></p>
            <p class="title-content-head-2">
                <a href="account.php?q=1&unit=4" style="color: white; font-weight: bold; font-size: 18px;"><i class="a-sharp fa-solid fa-square-check fa-fw"></i>&nbsp;UNIT 4 QUIZ</a>
              </p>
     </div>

</main>



</body>
</html>