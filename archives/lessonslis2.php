<?php

include 'dbConnection.php';

// $con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));

if(mysqli_connect_errno()){
    echo "Failed to connect to my MySQL: " . mysqli_connect_error();
}else{
   #echo 'connected';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
<style>

.headline{
  color:gray;
  font-size:20px;
  font-weight: bold;

}


.ending{
  color: #000;
  font-weight: bold;
}

</style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  
<main>
<a href='account2.php?q=1' style="
                text-align:center;  
                background-color: #007938; /* Green */ 
                border: none; color: white;float: right;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                border-bottom-left-radius: 10px;
                border-bottom-right-radius: 10px;
                border-top-left-radius: 10px;
                height: auto;
                border-top-right-radius: 10px;
                padding: 20px;"></i>Back</a>
                <br><br>
<?php 

# View Data in Database
$view_query = mysqli_query($con, "SELECT * FROM lesson WHERE lessonType='1'");
while($row = mysqli_fetch_assoc($view_query)){

    $headline = $row["headline"];
    $context = $row["context"];
    $content = $row["content"];
    $ending = $row["ending"];


    echo"
    <div class='card'>
    <div class='card-body'>
      <p class='headline'>$headline</p>
      <p class='ending'>$context</p>
      <p class='ending'>$content</p>
      <p class='ending'>$ending</p>

    </div>
  </div>

    "; echo '<br>';


    
}

?>
<br>
<center>
<a href='accountcopy.php?q=1' style='text-align:center;  
    background-color: #007938; /* Green */ 
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    width: 100%;
    font-size: 16px;
    border-bottom-left-radius: 10px;
    border-bottom-right-radius: 10px;
    border-top-left-radius: 10px;
    height: 55px;
    border-top-right-radius: 10px;''></i>Take Quiz</a>

<br>
<br>
</center>

</main>



</body>
</html>