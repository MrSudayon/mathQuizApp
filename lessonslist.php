<?php include 'dbConnection.php'; ?>

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
  <link rel="stylesheet" href="font.css">

  <title>Lessons List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
  
<main>
<a href='lessonunits.php' style="text-align:center;  
                background-color: var(--cancel-c);
                color: white;
                padding: 15px 32px;
                text-decoration: none;
                display: inline-block;
                width: 100%;
                font-size: 16px;
                border-radius: 10px;"></i>Back</a>
                <br><br>

<?php 
  # View Data in Database
  $lesson_Type = $_GET['lType'];
  $res = mysqli_query($con, "SELECT * FROM lesson WHERE lessonType='$lesson_Type' AND isArchive=0");
  $count = mysqli_num_rows($res);
  if($count <= 0) {
    echo'<br><br><br><br>';
    echo '
    
    <!DOCTYPE html>
  <html lang="en">
  <head>
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
  <center><li style="list-style: none;"><a href="lessonunits.php"><img src="images/sorry.svg" alt="avatar" style="height: 350px; width: 350px;" ></a></li>
  <h5 style="color: #2c3e50; font-weight: bold;">No Lessons posted...</h5>
  </center>
  </main>
  </body>
  </html>
    
    ';
  } else {
  $view_query = mysqli_query($con, "SELECT * FROM lesson WHERE lessonType='$lesson_Type' AND isArchive=0");
  while($row = mysqli_fetch_assoc($view_query)){

      $headline = $row["headline"];
      $context = $row["context"];
      $content = $row["content"];
      $ending = $row["ending"];


      echo"<center>
      <div class='card'>
      <div class='card-body'>
        <p class='headline' style='color:black'>$headline</p>
        <p class='ending' style='color:black'>$context</p>
        <p class='ending' style='color:black'>$content</p>
        <p class='ending' style='color:black'>$ending</p>

      </div>
    </div>

      "; echo '<br>';  
      
      
      //<center>
      //<a href='account.php?q=1' style='text-align:center;  
      //background-color: #007938; /* Green */ 
      //: white;
      //padding: 10px 20px;
      //text-decoration: none;
      //display: inline-block;
      //width:20%;
      //-size: 16px;
      //-radius: 10px;
      //height: auto;'></i>Take Quiz</a>
      //<br>
      //</center>
  }
  }

  ?>
  

</main>



</body>
</html>