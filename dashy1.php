<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
<title>Admin</title>
 <script src="js/jquery.js" type="text/javascript"></script>
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <!-- Start Top Bar -->
    <div class="top-bar" style="background-color: #148110; border-bottom: 5px solid #148110;" >
      <div class="top-bar-left">
        <ul class="menu"  style="background-color: #148110">
          <li class="menu-text" style="color:white;">
          
            <?php
                include_once 'dbConnection.php';
                session_start();
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

<center>
    <?php
    $unitNo = @$_GET['unit'];
   echo '<br><br>';

echo '<!-- Trigger/Open The Modal -->
    <button id="myBtn2" style="
    padding:15px;
    background: red;
    color:white; 
    width: 50%;
    border-radius: 6px;">Unit '. $unitNo .': Quiz Command</button>
    
    <!-- The Modal -->
    <div id="myModal2" class="modal">
    
      <!-- Modal content -->
      <div class="modal-content">';
        
        include ('deletequiz1.php');
        
      echo '</div>
    </div>';

    echo '
    <style>
    
    /* The Modal (background) */
    .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 1; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal Content */
    .modal-content {
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 50%;
    }
    
    /* The Close Button */
    .close {
      color: #aaaaaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    
    .close:hover,
    .close:focus {
      color: #000;
      text-decoration: none;
      cursor: pointer;
    }
    </style>';

    echo '<script>
    // Get the modal
    var modal = document.getElementById("myModal2");
    
    // Get the button that opens the modal
    var btn = document.getElementById("myBtn2");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>';


    ?>

  </center>
  
</body>
</html>