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
  <title>Invalid</title>
</head>
<body>
<main>
<center><li><a href=""><img src="images/sorry.svg" alt="avatar" style="height: 500px; width: 500px;" ></a></li>
<h5 style="color: #2c3e50; font-weight: bold;">Sorry, Wrong username or password.</h5>
      <h5 style="color: #007938; font-weight: light; font-size: 14px;">Go back and login again. :) <a href="account2.php?q=1" style="color: gray"><u>Back to login<u></a></h5>
      </center>
</main>
</body>
</html>