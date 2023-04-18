<?php
session_start();
if(isset($_SESSION['username']) && (!isset($_SESSION['key']))){
   header('location:account.php?q=1');
}
else if(isset($_SESSION['username']) && isset($_SESSION['key']) && $_SESSION['key'] == '54585c506829293a2d4c3b68543b316e2e7a2d277858545a36362e5f39'){
   header('location:dash.php?q=0');
}
?>
<!DOCTYPE html>
<html>
<head>

<!-- Icon logo --->
<link rel="icon" href="images/school.png" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">

<title>Math Learners</title>
  
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<?php
if (@$_GET['w']) {
    echo '<script>alert("' . @$_GET['w'] . '");</script>';
}
?>

</head>
<body>


    <!-- We can now combine rows and columns when there's only one column in that row -->
    <div class="row medium-8 large-7 columns">
      <div class="blog-post">
        <BR>
        <center> <img src="images/school.png" width="350" height="400"></center>
        <br>
      <p style="color: #000000; font-weight: light; font-size: 18px;">Welcome back Mountaintopnians. </p>
      <p style="color: #0e5a0b; font-size: 12px; text-align: left; letter-spacing: 1.5px;">Our third grade math worksheets continue numeracy development and introduce division, decimals, roman numerals, calendars and new concepts in measurement and geometry. Our word problem worksheets review skills in real world scenarios. </p>
       
      <!-- Login User -->
          <form class="form-horizontal" action="login.php" method="POST">
          <fieldset>
          <div class="form-group">
            <label for="username"></label>  
            <input id="username" name="username" placeholder="Username" type="text" required="yes" autocomplete="off">
            </div>
          </div>
          <div class="form-group">
            <label for="password"></label>
              <input id="password" name="password" placeholder="Enter your Password" type="password" required="yes">
              <!-- <a >Register Account</a> --> </div>

          <div class="form-group">
      
          <button type="submit" name="sub" style="
                text-align:center;  
                background-color: #148110; 
                border: none; color: white;float: right;
                text-align: center;
                text-decoration: none;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                height: 55px;
                border-top-right-radius: 10px;
                padding: 20px;"
                >Log In</button><br><br>
    

        </div>
        <hr>
        <a href="register.php" style="
                border:6px solid #148110;
                border: dotted;
                text-align:center;  
                background-color: #2c8e28; 
                border: none; color: white;float: right;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;"
                >Enroll now</a>
        </div>

        

              </fieldset>
          </form>
          <br>
          <!-- <center><a href="adlogin.php" style="text-align:center; color: gray;"> <i class="fa fa-repeat fa fw"></i> Teacher mode</a></center> -->
       <!-- <center><a href="/Mathlearners" style="text-align:left; color: gray; margin-left: 15px;"> <i class="fa fa-file-text"></i> Go Back</a><center> -->
        <!-- <center><a href="/Mathlearners/chapter_one/adlogin.php" style="text-align:left; color: gray; margin-left: 15px;"> <i class="fa fa-file-text"></i> Go Back</a><center> -->
        <!-- Login User End -->
        </div>
 




      </div>
    </div>
  </div>
</div>
</body>

</html>
