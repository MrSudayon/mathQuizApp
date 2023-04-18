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
        <center><li><a href=""><img src="images/avatars.jpg" alt="avatar" style="height: 200px; width: 200px;" ></a></li></center>
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
        <li><a href="account2.php">Home</a></li>
        <li><a href="lessonunits.php">Quiz</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="account.php?q=3">student rankings</a></li>
        <li><a href="logout.php?q=account.php">log out</a></li>
      </ul>
    </div>
  </div>

  
  <main>
  <br>

  
  
  <div class="row medium-8 large-7 columns">
      <div class="blog-post">
          
     <?php
if (@$_GET['q'] == 1) {
    
    $result = mysqli_query($con, "SELECT * FROM unit3ez WHERE status = 'enabled' ORDER BY date DESC") or die('Error');

    echo '
    <tr>
    <table style="width: 100%;">
    <td style="vertical-align:middle"><Numbers/td>
    <td style="vertical-align:middle">Name</td>
    <td style="vertical-align:middle">Questions</td>
    <td style="vertical-align:middle">Action</td>
    </tr>';

    $c = 1;
    while ($row = mysqli_fetch_array($result)) {
        $title   = $row['title'];
        $total   = $row['total'];
        $correct = $row['correct'];
        $wrong   = $row['wrong'];
        $time    = $row['time'];
        $eid     = $row['eid'];
        $q12 = mysqli_query($con, "SELECT score FROM history WHERE eid='$eid' AND username='$username'") or die('Error98');
        $rowcount = mysqli_num_rows($q12);
        if ($rowcount == 0) {
            echo '<tr>
                    <td style="vertical-align:middle;  style="width: 100%;"">' . $c++ . '</td><td style="vertical-align:middle;">' . $title . '</td><td style="vertical-align:middle">' . $total . '</td>    
                    <td style="vertical-align:middle"><b><a href="accountcopy3.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" style="color:white; background-color:#148110;width: 100%; padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px; font-size: 15px;">Start</td>
                </tr>';
        } else {
            $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $timec  = $row['timestamp'];
                $status = $row['status'];
            }
            $q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $ttimec  = $row['time'];
                $qstatus = $row['status'];
            }
            $remaining = (($ttimec * 60) - ((time() - $timec)));
            if ($remaining > 0 && $qstatus == "enabled" && $status == "ongoing") {
                echo '<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '&nbsp;<td style="vertical-align:middle">' . $total . '</td>  </td>
                <td style="vertical-align:middle"><b><a href="accountcopy3.php?q=quiz&step=2&eid=' . $eid . '&n=1&t=' . $total . '&start=start" class="btn" style="color:white;background-color:#f1c40f;padding: 5px; border-bottom-left-radius: 5px;
                border-bottom-right-radius: 5px;border-top-left-radius: 5px; border-top-right-radius: 5px;">&nbsp;Resume</span></a></b></td></tr>';
            } else {
                echo '<tr style="color:darkgreen"><td style="vertical-align:middle">' . $c++ . '</td><td style="vertical-align:middle">' . $title . '&nbsp;<td style="vertical-align:middle">' . $total . '</td>  </td>
                <td style="vertical-align:middle"><b><a href="accountcopy3.php?q=result&eid=' . $eid . '" class="btn" style="color:white;background-color:#1C7947;padding: 5px; border-bottom-left-radius: 5px;
                 border-bottom-right-radius: 5px;border-top-left-radius: 5px; border-top-right-radius: 5px;"></span>&nbsp;&nbsp;Done&nbsp;&nbsp;</a></b></td></tr>';
            }
        }
    }

    echo '</font></ul></div>';
    
}
?>
<?php
if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d" && isset($_GET['endquiz'])== 'end') {
    unset($_SESSION['6e447159425d2d']);
    $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                 if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountcopy3.php?q=result&eid=' . $_GET[eid]);
}

if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_GET['start']) && $_GET['start'] == "start" && (!isset($_SESSION['6e447159425d2d']))) {
    $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $timel  = $row['timestamp'];
            $status = $row['status'];
        }
        $q = mysqli_query($con, "SELECT * FROM unit3ez WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttimel  = $row['time'];
            $qstatus = $row['status'];
        }
        $remaining = (($ttimel * 60) - ((time() - $timel)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $_SESSION['6e447159425d2d'] = "6e447159425d2d";
            header('location:accountcopy3.php?q=quiz&step=2&eid=' . $_GET[eid] . '&n=' . $_GET[n] . '&t=' . $_GET[t]);
            
        } else {
                $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                 if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountcopy3.php?q=result&eid=' . $_GET[eid]);
        }
        
    } else {
        $time = time();
        $q = mysqli_query($con, "INSERT INTO history VALUES(NULL,'$username','$_GET[eid]' ,'0','0','0','0',NOW(),'$time','ongoing','false')") or die('Error137');
        $_SESSION['6e447159425d2d'] = "6e447159425d2d";
        header('location:accountcopy3.php?q=quiz&step=2&eid=' . $_GET["eid"] . '&n=' . $_GET["n"] . '&t=' . $_GET["t"]);
    }
}


if (@$_GET['q'] == 'quiz' && @$_GET['step'] == 2 && isset($_SESSION['6e447159425d2d']) && $_SESSION['6e447159425d2d'] == "6e447159425d2d") {
    $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND eid='$_GET[eid]' ") or die('Error197');
    
    if (mysqli_num_rows($q) > 0) {
        $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $time   = $row['timestamp'];
            $status = $row['status'];
        }
        $q = mysqli_query($con, "SELECT * FROM unit3ez WHERE eid='$_GET[eid]' ") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $ttime   = $row['time'];
            $qstatus = $row['status'];
        }
        $remaining = (($ttime * 60) - ((time() - $time)));
        if ($status == "ongoing" && $remaining > 0 && $qstatus == "enabled") {
            $q = mysqli_query($con, "SELECT * FROM history WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $time = $row['timestamp'];
            }
            $q = mysqli_query($con, "SELECT * FROM unit3ez WHERE eid='$_GET[eid]' ") or die('Error197');
            while ($row = mysqli_fetch_array($q)) {
                $ttime = $row['time'];
            }
            $remaining = (($ttime * 60) - ((time() - $time)));

            echo '<script>
            var seconds = ' . $remaining . ' ;
                            
                function end(){{
                    window.location ="accountcopy3.php?q=quiz&step=2&eid=' . $_GET["eid"] . '&n=' . $_GET["n"] . '&t=' . isset($_GET["total"]) . '&endquiz=end";
                }
                }

                function enable(){
                document.getElementById("sbutton").removeAttribute("disabled");

                }
                function frmreset(){
                document.getElementById("sbutton").setAttribute("disabled","true");
                document.getElementById("qform").reset();
                }
                    function secondPassed() {
                    var minutes = Math.round((seconds - 30)/60);
                    var remainingSeconds = seconds % 60;
                    if (remainingSeconds < 10) {
                        remainingSeconds = "0" + remainingSeconds; 
                    }
                    document.getElementById(\'countdown\').innerHTML = minutes + ":" +    remainingSeconds;
                    if (seconds <= 0) {
                        clearInterval(countdownTimer);
                        document.getElementById(\'countdown\').innerHTML = "Close Quiz";
                        window.location ="accountcopy3.php?q=quiz&step=2&eid=' . $_GET["eid"] . '&n=' . $_GET["n"] . '&t=' . isset($_GET["total"]) . '&endquiz=end";
                    } else {    
                        seconds--;
                    }
                    }
                var countdownTimer = setInterval(\'secondPassed()\', 1000);
                </script>';


                echo '
                <table style="width:100%;">
                <tr>
                </span></a>
                
                <th><button onclick="end()" style="color: white; background-color:#148110;padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px; font-size: 15px;"><i class="fa fa-clock-o"></i>&nbsp;Time left: <font style="font-size:15px; font-weight: light;color: white" id="countdown"></font></button>

                </th>
                    <th><button onclick="end()" style="color: white; background-color:#e74c3c;padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px; font-size: 15px;"><i class="fa fa-flag"></i>&nbsp;Finish Quiz</button>
                    </th>
                </tr>
                </table>';
            echo '<br>'; $eid   = @$_GET['eid'];
            $sn    = @$_GET['n'];
            $total = @$_GET['t'];
            $q     = mysqli_query($con, "SELECT * FROM questions3 WHERE eid='$eid' AND sn='$sn' ");
            echo '<div class="panel" style="margin-right:5%;margin-left:5%;margin-top:10px;border-radius:10px">';
            while ($row = mysqli_fetch_array($q)) {
                $qns = stripslashes($row['qns']);
                $qid = $row['qid'];
                echo '<b><pre style="background-color:white"><div style="font-size:20px;font-weight:bold;font-family:calibri;margin:10px">' . $sn . ' : ' . $qns . '</div></pre></b>';
            }
            
            echo '<form id="qform" action="update3.php?q=quiz&step=2&eid=' . $eid . '&n=' . $sn . '&t=' . $total . '&qid=' . $qid . '" method="POST"  class="form-horizontal"><br />';

            $q = mysqli_query($con, "SELECT * FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]'") or die("Error222");
            if (mysqli_num_rows($q) > 0) {
                $row = mysqli_fetch_array($q);
                $ans = $row['ans'];
                $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' AND optionid='$ans'") or die("Error222");
                $row = mysqli_fetch_array($q);
                $ans = $row['option'];
            } else {
                $ans = "";
            }
            if (strlen($ans) > 0) {
                echo "<font style=\"color:green;font-size:12px;font-weight:bold\">Selected answer: </font><font style=\"color:#565252;font-size:12px;\">" . $ans . "</font>&nbsp;&nbsp;<a href=update3.php?q=quiz&step=2&eid=$eid&n=$sn&t=$total&qid=$qid&delanswer=delanswer><span class=\"glyphicon glyphicon-remove\" style=\"font-size:12px;color:darkred\"></span></a><br /><br />";
            }
            echo '<div class="funkyradio">';
            $q = mysqli_query($con, "SELECT * FROM options WHERE qid='$qid' ");
            while ($row = mysqli_fetch_array($q)) {
                $option   = stripslashes($row['option']);
                $optionid = $row['optionid'];
                echo '<div class="funkyradio-success"><input type="radio" id="' . $optionid . '" name="ans" value="' . $optionid . '" onclick="enable()"> <label for="' . $optionid . '" style="width:50%"><div style="color:black;font-size:16px;word-wrap:break-word">&nbsp;&nbsp;' . $option . '</div></label></div>';
            }
            echo '</div>';
            if ($_GET["t"] > $_GET["n"] && $_GET["n"] != 1) {###### RESET BUTTON  CSS BUTTON DIN########## 
                echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"></a><button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="font-size:16px;color: white; background-color: #0561e1; padding: 10px; border-radius: 8px; width: 100px; margin-right: 15px;"><span class="glyphicon glyphicon-lock" style="font-size:16px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold">Confirm</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold">Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
            } else if ($_GET["t"] == $_GET["n"]) {
                echo '<br /><a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn - 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"></a><button type="submit" class="btn btn-default" disabled="true" id="sbutton" style="height:30px"><span class="glyphicon glyphicon-lock" style="font-size:16px" aria-hidden="true"></span><font style="font-size:12px;font-weight:bold; background-color: #0561e1; padding: 10px; color: white; border-radius: 10px;">Select Final Answer</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-default" onclick="frmreset()" style="height:30px"></span><font style="font-size:12px;font-weight:bold"></font></button>&nbsp;&nbsp;&nbsp;&nbsp;</form><br><br>';
            } else if ($_GET["t"] > $_GET["n"] && $_GET["n"] == 1) {
                echo '<br />&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-default" disabled="true" id="sbutton" aria-hidden="true" 
                style="font-size:16px;color: white; background-color: #0561e1; padding: 10px; border-radius: 8px; width: 100px; margin-right: 15px;"></span>Confirm</button><button type="button" class="btn btn-default" onclick="frmreset()" <i class="fa fa-window-close"></i>Reset</font></button>&nbsp;&nbsp;&nbsp;&nbsp;<a href="account.php?q=quiz&step=2&eid=' . $eid . '&n=' . ($sn + 1) . '&t=' . $total . '" class="btn btn-primary" style="height:30px"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"  style="font-size:12px"></span></a></form><br><br>';
            } else {
            }
            echo '</div>';
            echo '<div class="panel" style="text-align:center">';
            $q = mysqli_query($con, "SELECT * FROM questions3 WHERE eid='$_GET[eid]'") or die("Error222");
            $i = 1;
            while ($row = mysqli_fetch_array($q)) {
                $ques[$row['qid']] = $i;
                $i++;
            }
            $q = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die("Error222a");
            $i = 1;
            while ($row = mysqli_fetch_array($q)) {
                if (isset($ques[$row['qid']])) {
                    $quesans[$ques[$row['qid']]] = true;
                }
            }
            for ($i = 1; $i <= $total; $i++) {
                echo '<a href="accountcopy3.php?q=quiz&step=2&eid=' . $eid . '&n=' . $i . '&t=' . $total . '"  style="margin:5px;padding:5px;background-color:';
                if ($quesans[$i]) {
                    echo "#9b59b6";
                } else {
                    echo "#c0392b";
                } #COUNTING NUMBERS
                echo ';color:white;font-size:16px;font-family:calibri;border-radius:4px; background-color: #007939c2;">&nbsp;' . $i . '&nbsp;</a>';
            }
        } else {
            unset($_SESSION['6e447159425d2d']);
            $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                 if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountcopy3.php?q=result&eid=' . $_GET[eid]);
        }
    } else {
        unset($_SESSION['6e447159425d2d']);
        $q = mysqli_query($con, "UPDATE history SET status='finished' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
        $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$_GET[eid]' AND username='$_SESSION[username]'") or die('Error156');
                while ($row = mysqli_fetch_array($q)) {
                    $s = $row['score'];
                    $scorestatus = $row['score_updated'];
                }
                if($scorestatus=="false"){
                    $q = mysqli_query($con, "UPDATE history SET score_updated='true' WHERE username='$_SESSION[username]' AND eid='$_GET[eid]' ") or die('Error197');
                    $q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username'") or die('Error161');
                    $rowcount = mysqli_num_rows($q);
                    if ($rowcount == 0) {
                        $q2 = mysqli_query($con, "INSERT INTO rank VALUES(NULL,'$username','$s',NOW())") or die('Error165');
                    } else {
                        while ($row = mysqli_fetch_array($q)) {
                            $sun = $row['score'];
                        }
                        
                        $sun = $s + $sun;
                        $q = mysqli_query($con, "UPDATE `rank` SET `score`=$sun ,time=NOW() WHERE username= '$username'") or die('Error174');
                    }
                }
            header('location:accountcopy3.php?q=result&eid=' . $_GET[eid]);
    }
}
if (@$_GET['q'] == 'result' && @$_GET['eid']) {
    $eid = @$_GET['eid'];
    $q = mysqli_query($con, "SELECT * FROM unit3ez WHERE eid='$eid' ") or die('Error157');
    while ($row = mysqli_fetch_array($q)) {
        $total = $row['total'];
    }
    $q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error157');
    
    while ($row = mysqli_fetch_array($q)) {
        $s      = $row['score'];
        $w      = $row['wrong'];
        $r      = $row['correct'];
        $status = $row['status'];
    }
        if ($status == "finished") {
                    echo '<table style="width:100%">
                    <tr>
                    <th>Information</th>
                    <th>Scores</th>
                    </tr>
                    <tr>
                    <td>Total Questions</td>
                    <td>' . $total . '</td>
                    </tr>

                    <tr>
                    <td>Correct Answers</td>
                    <td>' . $r . '</td>
                    </tr>

                    <tr>
                    <td>Wrong Answer</td>
                    <td>' . $w . '</td>
                    </tr>

                    <tr>
                    <td>Unattempted</td>
                    <td>' . ($total - $r - $w) . '</td>
                    </tr>

                    <tr>
                    <td>Score</td>
                    <td>' . $s . '</td>
                    </tr>
                    </table>';

        $q = mysqli_query($con, "SELECT * FROM rank WHERE  username='$username' ") or die('Error157');
        while ($row = mysqli_fetch_array($q)) {
            $s = $row['score'];
            echo '
            <center>
            <p style=" font-weight: bold;font-size: 20px; color: green;"><i class="fa fa-bell"></i>&nbsp;Overall Score: ' . $s . '</p>
            </center>
           ';}

        $q = mysqli_query($con, "SELECT * FROM questions3 WHERE eid='$_GET[eid]'") or die('Error197');
        while ($row = mysqli_fetch_array($q)) {
            $question = $row['qns'];
            $qid      = $row['qid'];
            $q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
            if (mysqli_num_rows($q2) > 0) {
                $row1         = mysqli_fetch_array($q2);
                $ansid        = $row1['ans'];
                $correctansid = $row1['correctans'];
                $q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
                $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                $row2       = mysqli_fetch_array($q3);
                $row3       = mysqli_fetch_array($q4);
                $ans        = $row2['option'];
                $correctans = $row3['option'];
            } else {
                $q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
                $row1         = mysqli_fetch_array($q3);
                $correctansid = $row1['ansid'];
                $q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
                $row2       = mysqli_fetch_array($q4);
                $correctans = $row2['option'];
                $ans        = "Unanswered";
            }
            if ($correctans == $ans && $ans != "Unanswered") {
                echo '<div style="font-size:16px;font-weight:bold; color: #00A19D; blackfont-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid #2ecc71;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>';
                echo '<br>';
                echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font> <br>';
            } 

            else if ($ans == "Unanswered") {
                echo '<div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;color: #000;padding:10px;word-wrap:break-word;border:2px solid #c0392b;border-radius:10px; color: black;">' . $question . '<br>
                <font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font></div>';
            } 

            else {
                echo '<div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#e74c3c;padding:10px;word-wrap:break-word;border:2px solid #c0392b;border-radius:10px; color: white;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
                echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font>';
                echo '<br>';
                echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px; color: black;">' . $correctans . '</font>';
                
            }
        
            echo "<br />";
        }
        echo "</div>";
    } else {
        die("Please restart the App, Thankyou.");
    }
}



if (@$_GET['q'] == 2) {
    $q = mysqli_query($con, "SELECT * FROM history WHERE username='$username' AND status='finished' ORDER BY date DESC ") or die('Error197');
   echo '<div class="panel title">
    <table class="table table-striped title1" style="width: 100%;">
    <tr><td style="vertical-align:middle; ">#</td><td style="vertical-align:middle">Q</td><td style="vertical-align:middle">TQ</td><td style="vertical-align:middle">C</td><td style="vertical-align:middle">W</td><td style="vertical-align:middle">U</td><td style="vertical-align:middle">S</td><td style="vertical-align:middle">A</td></tr>';    $c = 0;
    while ($row = mysqli_fetch_array($q)) {
        $eid = $row['eid'];
        $s   = $row['score'];
        $w   = $row['wrong'];
        $r   = $row['correct'];
        $q23 = mysqli_query($con, "SELECT * FROM unit3ez WHERE  eid='$eid' ") or die('Error208');
        while ($row = mysqli_fetch_array($q23)) {
            $title = $row['title'];
            $total = $row['total'];
        }
        $c++;
        
        echo '
        <tr>
        <td style="vertical-align:middle;width: 100%;">' . $c . '</td>
        <td style="vertical-align:middle">' . $title . '</td>
        <td style="vertical-align:middle">' . $total . '</td><td style="vertical-align:middle">' . $r . '</td>
        <td style="vertical-align:middle">' . $w . '</td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td>
        <td style="vertical-align:middle">' . $s . '</td>
        <td style="vertical-align:middle"><a href="accountcopy3.php?q=result&eid=' . $eid . '" class="btn" style="color:white;background-color: #007939c2;padding: 5px; border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;border-top-left-radius: 5px; border-top-right-radius: 5px;">View</td>
        </tr>';
    }
    echo '</table></div>';
}
if (@$_GET['q'] == 3) {
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


    echo'<center><h5 style="color: white; background-color:#e74c3c;padding: 5px;border-bottom-left-radius: 5px;border-bottom-right-radius: 5px;border-top-left-radius: 5px;border-top-right-radius: 5px; font-size: 15px;"><i class="fa fa-graduation-cap"></i>&nbsp;Leaderboards&nbsp;<br></center>';
    echo '<br>';

    echo '<div class="panel title" style="";> 
<table class="" style="vertical-align:middle; width:100%;">
<tr><td style="vertical-align:middle"><b>Rank</b></td><td style="vertical-align:middle"><b>Name</b></td><td style="vertical-align:middle; width:100%;"><b>Score</b></td></tr>';
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
            }
            $c++;
            echo '<tr><td style="vertical-align:middle; width:100%;"><b>' . $c . '</b></td><td style="vertical-align:middle">' . $name . '</td><td style="vertical-align:middle">' . $s . '</td><td style="vertical-align:middle">';
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
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="accountcopy3.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="color:white;font-size:16px;font-family:calibri;border-radius:4px; background-color: #125C13;" href="accountcopy3.php?q=3&show='.($show+1).'">&nbsp;<i class="fa fa-forward fa fw"></i>&nbsp;</a></td>';
    }
    else if($show != 1 && $show==$total){                                                                                                                                                                       /* Arrow next*/
        echo '<td style="vertical-align:middle;text-align:center"><a style="color:white;font-size:16px;font-family:calibri;border-radius:4px; background-color: #125C13;" href="accountcopy3.php?q=3&show='.($show-1).'">&nbsp;<i class="fa fa-backward fa fw"></i>&nbsp;</a></td>';

        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="accountcopy3.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
    }
    else{
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="accountcopy3.php?q=3&show='.($show-1).'">&nbsp;<<&nbsp;</a></td>';
        $i = 1;
        while($i<=$total){
            echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="accountcopy3.php?q=3&show='.$i.'">&nbsp;'.$i.'&nbsp;</a></td>';
            $i++;
        }
        echo '<td style="vertical-align:middle;text-align:center"><a style="font-size:14px;font-family:typo;font-weight:bold" href="accountcopy3.php?q=3&show='.($show+1).'">&nbsp;>>&nbsp;</a></td>';
    }
    echo '</tr></table></div>';

    
}


?>

<?php 
if (@$_GET['q'] == 4) {
    echo '<br>';
   include 'lesson.php';

    echo '<br><br>';    
}



?>



</div>

  </main>



</body>
</html>