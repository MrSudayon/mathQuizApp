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

<div class="container">
<div class="row">
<div class="col-md-12">
<?php
#################################################################### ENABLE DISABLE #######################################################################
if (@$_GET['q'] == 0) {
    $result = mysqli_query($con, "SELECT * FROM quiz ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle; width: 100%;">
<tr><td style="vertical-align:middle; color: #000;"><b>#</b></td><td style="vertical-align:middle; color: #000"><b><i class="fa fa-user"></i> Name</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-question-circle"></i> Total question</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-check-circle"></i> Marks</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-clock-o"></i> Time limit</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-eye"></i> Status</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-refresh"></i> Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle; padding: 10px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#e74c3c;font-size:12px;padding:5px; border-bottom-left-radius: 6px;border-bottom-right-radius:6px;border-top-left-radius: 6px;border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle: padding: 5px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#007938;font-size:12px;padding:5px; border-bottom-left-radius: 6px;
  border-bottom-right-radius:6px;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}



#################################################################### ENABLE DISABLE #######################################################################
if (@$_GET['q'] == 0) {  
    $result = mysqli_query($con, "SELECT * FROM unit1ez ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle; width: 100%;">
<tr><td style="vertical-align:middle; color: #000;"><b>#</b></td><td style="vertical-align:middle; color: #000"><b><i class="fa fa-user"></i> Name</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-question-circle"></i> Total question</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-check-circle"></i> Marks</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-clock-o"></i> Time limit</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-eye"></i> Status</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-refresh"></i> Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle; padding: 10px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update2.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#e74c3c;font-size:12px;padding:5px; border-bottom-left-radius: 6px;border-bottom-right-radius:6px;border-top-left-radius: 6px;border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle: padding: 5px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update2.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#007938;font-size:12px;padding:5px; border-bottom-left-radius: 6px;
  border-bottom-right-radius:6px;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}

#################################################################### ENABLE DISABLE #######################################################################
if (@$_GET['q'] == 0) {  
    $result = mysqli_query($con, "SELECT * FROM unit3ez ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle; width: 100%;">
<tr><td style="vertical-align:middle; color: #000;"><b>#</b></td><td style="vertical-align:middle; color: #000"><b><i class="fa fa-user"></i> Name</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-question-circle"></i> Total question</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-check-circle"></i> Marks</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-clock-o"></i> Time limit</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-eye"></i> Status</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-refresh"></i> Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle; padding: 10px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update3.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#e74c3c;font-size:12px;padding:5px; border-bottom-left-radius: 6px;border-bottom-right-radius:6px;border-top-left-radius: 6px;border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle: padding: 5px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update3.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#007938;font-size:12px;padding:5px; border-bottom-left-radius: 6px;
  border-bottom-right-radius:6px;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}


#################################################################### ENABLE DISABLE #######################################################################
if (@$_GET['q'] == 0) {  
    $result = mysqli_query($con, "SELECT * FROM unit4ez ORDER BY date DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1"  style="vertical-align:middle; width: 100%;">
<tr><td style="vertical-align:middle; color: #000;"><b>#</b></td><td style="vertical-align:middle; color: #000"><b><i class="fa fa-user"></i> Name</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-question-circle"></i> Total question</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-check-circle"></i> Marks</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-clock-o"></i> Time limit</b></td><td style="vertical-align:middle; color: #000;"><b> <i class="fa fa-eye"></i> Status</b></td><td style="vertical-align:middle; color: #000;"><b><i class="fa fa-refresh"></i> Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $status  = $row['status'];
        if ($status == "enabled") {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle; padding: 10px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Enabled</td>
  <td style="vertical-align:middle"><b><a href="update4.php?deidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#e74c3c;font-size:12px;padding:5px; border-bottom-left-radius: 6px;border-bottom-right-radius:6px;border-top-left-radius: 6px;border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Disable</b></span></a></b></td></tr>';
        } else {
            echo '<tr><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $correct * $total . '</td><td style="vertical-align:middle: padding: 5px;">' . $time . '&nbsp;min</td><td style="vertical-align:middle">Disabled</td>
  <td style="vertical-align:middle"><b><a href="update4.php?eeidquiz=' . $eid . '" class="btn logb" style="color:#FFFFFF;background:#007938;font-size:12px;padding:5px; border-bottom-left-radius: 6px;
  border-bottom-right-radius:6px;
  border-top-left-radius: 6px;
  border-top-right-radius: 6px; padding: 10px;">&nbsp;<span><b>Enable</b></span></a></b></td></tr>';
            
        }
    }
}









#################################################################################### REMOVE QUIZ #######################################################################
if (@$_GET['q'] == 5) {

    echo '<p style="padding:15px; margin: 10px; width: 100%;
    background: #54B435;
    color:white; 
    border-bottom-left-radius: 6px;
    border-bottom-right-radius:6px; 
    border-top-left-radius: 6px; 
    border-top-right-radius: 6px;">Quiz Command System</p>';


    echo '<br>';
    echo '<br>';
    echo '<br>';

    // include ('dashy1.php');

    
    echo '<a href="dashy1.php" style="padding:15px;
    background:#148110;
    color:white; 
    border-bottom-left-radius: 6px;
    border-bottom-right-radius:6px; 
    border-top-left-radius: 6px; 
    border-top-right-radius: 6px; margin: 10px;">Quiz 1 Mode</a>';
    
}





#################################################################################### REMOVE QUIZ #######################################################################
if (@$_GET['q'] == 5) {

    // include ('dashy2.php');



    echo '<a href="dashy2.php" style="padding:15px;
    background:#148110;
    color:white; 
    border-bottom-left-radius: 6px;
    border-bottom-right-radius:6px; 
    border-top-left-radius: 6px; 
    border-top-right-radius: 6px; margin: 10px;">Quiz 2 Mode</a>';
 
    
}



#################################################################################### REMOVE QUIZ #######################################################################
if (@$_GET['q'] == 5) {

    echo '<a href="dashy3.php" style="padding:15px;
    background:#148110;
    color:white; 
    border-bottom-left-radius: 6px;
    border-bottom-right-radius:6px; 
    border-top-left-radius: 6px; 
    border-top-right-radius: 6px; margin: 10px;" >Quiz 3 Mode</a>';
    
    
}




#################################################################################### REMOVE QUIZ #######################################################################



if (@$_GET['q'] == 5) {

    echo '<a href="dashy4.php" style="padding:15px;
    background:#148110;
    color:white; 
    border-bottom-left-radius: 6px;
    border-bottom-right-radius:6px; 
    border-top-left-radius: 6px; 
    border-top-right-radius: 6px; margin: 10px;">Quiz 4 Mode</a>';
    
}











if (@$_GET['q'] == 2) {
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }
    else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    $q = mysqli_query($con, "SELECT * FROM rank") or die('Error223');
    echo '<div class="">
<table style="width: 100%;">
<tr><td style="vertical-align:middle; "><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Student </b></td><td style="vertical-align:middle"><b></b></td></tr>';
    $c = $showfrom-1;
    $total = mysqli_num_rows($q);
    if($total >= $showfrom){
        $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
        while ($row = mysqli_fetch_array($q)) {
            $e = $row['username'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE username='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
                $name     = $row['name'];
                $branch   = $row['branch'];
                $username = $row['username'];
                $rollno     = $row['rollno'];
                $gender   = $row['gender'];
            }
            $c++;
            echo '<tr><td style="color:#99cc32; "><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
        }
    }
    else{
    }
    echo '</table></div>';
    echo '<div class=""><table class="" ><tr>';
    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }
    else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';
}





















if (@$_GET['q'] == 1) {
    
    $result = mysqli_query($con, "SELECT * FROM user") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1" style="width: 100%;">
<tr><td style="vertical-align:middle"><b>#</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Gender</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Phone (Optional)</b></td><td style="vertical-align:middle"></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $name      = $row['name'];
        $phno      = $row['phno'];
        $gender    = $row['gender'];
        $rollno    = $row['rollno'];
        $branch    = $row['branch'];
        $username1 = $row['username'];
        
        echo '<tr><td style="vertical-align:middle;">' . $c++ . '</td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $gender . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username1 . '</td><td style="vertical-align:middle">' . $phno . '</td>
  <td style="vertical-align:middle"><a title="Delete User" href="update.php?dusername=' . $username1 . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
    }
    $c = 0;
    echo '</table></div>';
    
}



































if (@$_GET['q'] == 3) {
    $result = mysqli_query($con, "SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
    echo '<div class="panel"><table class="table table-striped title1">
<tr><td style="vertical-align:middle"><b>S.N.</b></td><td style="vertical-align:middle"><b>Subject</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Date</b></td><td style="vertical-align:middle"><b>Time</b></td><td style="vertical-align:middle"><b>By</b></td><td style="vertical-align:middle"></td><td style="vertical-align:middle"><b>Action</b></td></tr>';
    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $date      = $row['date'];
        $date      = date("d-m-Y", strtotime($date));
        $time      = $row['time'];
        $subject   = $row['subject'];
        $name      = $row['name'];
        $username1 = $row['username'];
        $id        = $row['id'];
        echo '<tr><td style="vertical-align:middle">' . $c++ . '</td>';
        echo '<td style="vertical-align:middle"><a title="Click to open feedback" href="dash.php?q=3&fid=' . $id . '">' . $subject . '</a></td><td style="vertical-align:middle">' . $username1 . '</td><td style="vertical-align:middle">' . $date . '</td><td style="vertical-align:middle">' . $time . '</td><td style="vertical-align:middle">' . $name . '</td>
  <td style="vertical-align:middle"><a title="Open Feedback" href="dash.php?q=3&fid=' . $id . '"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
        echo '<td style="vertical-align:middle"><a title="Delete Feedback" href="update.php?fdid=' . $id . '"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

  </tr>';
    }
    echo '</table></div>';
}




























if (@$_GET['fid']) {
    echo '<br />';
    $id = @$_GET['fid'];
    $result = mysqli_query($con, "SELECT * FROM feedback WHERE id='$id' ") or die('Error');
    while ($row = mysqli_fetch_array($result)) {
        $name     = $row['name'];
        $subject  = $row['subject'];
        $date     = $row['date'];
        $date     = date("d-m-Y", strtotime($date));
        $time     = $row['time'];
        $feedback = $row['feedback'];
        
        echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>' . $subject . '</b></h1>';
        echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;' . $date . '</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;' . $time . '</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;' . $name . '</span><br />' . $feedback . '</div></div>';
    }
}


























            ############################################################################# ADDING LESSON PUTEK ##############################################################################################
if (@$_GET['q'] == 4 && !(@$_GET['step'])) {
    echo ' 


    <div class="">
    <div class="row">
    <span class="title1" style="font-size:30px;"><b>Enter Quiz Details<p style="background-color: #F0A500; color: white; ">UNIT 1</p></h5></b></span><br /><br />
     <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
    <fieldset>
    <div class="form-group">
      <label class="col-md-12 control-label" for="name"></label>  
      <div class="col-md-12">
      <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-12 control-label" for="total"></label>  
      <div class="col-md-12">
      <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
        
      </div>
    </div>
    <div class="form-group">
      <label class="col-md-12 control-label" for="right"></label>  
      <div class="col-md-12">
      <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
        
      </div>
    </div>
    </div>
    <div class="form-group">
      <label class="col-md-12 control-label" for="time"></label>  
      <div class="col-md-12">
      <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
        
      </div>
    </div>
    
    <br>
    <div class="form-group">
      <label class="col-md-12 control-label" for=""></label>
      <div class="col-md-12"> 
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
        border-top-right-radius: 30px;" class="btn btn-primary" value="Continue" class="btn btn-primary"/>
      </div>
    </div>
    <br><br>
    
    </fieldset>
    </form></div>';

        
    }if (@$_GET['q'] == 4 && (@$_GET['step']) == 2) {
    echo ' 

    <div class="">
    <span class="title1" style="font-size:30px;"><b>Enter Question Details <p style="background-color: #F0A500; color: white; ">UNIT 1</p></b></span><br /><br />
     <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n=' . @$_GET['n'] . '&eid=' . @$_GET['eid'] . '&ch=4 "  method="POST">
    <fieldset>
    </div>

    ';
        
        for ($i = 1; $i <= @$_GET['n']; $i++) {
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



include 'addqunit2.php';

include 'addqunit3.php';

include 'addqunit4.php';









if (@$_GET['q'] == 6) {
    
    if(isset($_GET['show'])){
        $show = $_GET['show'];
        $showfrom = (($show-1)*10) + 1;
        $showtill = $showfrom + 9;
    }
    else{
        $show = 1;
        $showfrom = 1;
        $showtill = 10;
    }
    $q = mysqli_query($con, "SELECT * FROM rank") or die('Error223');
    echo '<div class="panel title">
<table class="table table-striped title1" >
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle"><b>Branch</b></td><td style="vertical-align:middle"><b>Username</b></td><td style="vertical-align:middle"><b>Gender</b></td><td style="vertical-align:middle"><b>Score</b></td></tr>';
    $c = $showfrom-1;
    $total = mysqli_num_rows($q);
    if($total >= $showfrom){
        $q = mysqli_query($con, "SELECT * FROM rank ORDER BY score DESC, time ASC LIMIT ".($showfrom-1).",10") or die('Error223');
        while ($row = mysqli_fetch_array($q)) {
            $e = $row['username'];
            $s = $row['score'];
            $q12 = mysqli_query($con, "SELECT * FROM user WHERE username='$e' ") or die('Error231');
            while ($row = mysqli_fetch_array($q12)) {
                $name     = $row['name'];
                $branch   = $row['branch'];
                $username = $row['username'];
                $rollno     = $row['rollno'];
                $gender   = $row['gender'];
            }
            $c++;
            echo '<tr><td style="color:#000"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $branch . '</td><td style="vertical-align:middle">' . $username . '</td><td style="vertical-align:middle">' . $gender . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
        }
    }
    else{
    }
    echo '</table></div>';
    echo '<div class="panel title"><table class="table table-striped title1" ><tr>';
    $total = round($total/10) + 1;
    if(isset($_GET['show'])){
        $show = $_GET['show'];
    }
    else{
        $show = 1;
    }
    if($show == 1 && $total==1){
    }
    else if($show == 1 && $total!=1){
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="dash.php?q=2&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';
        
    }


?>
</div>
</div></div>
</center></body>
</html>
