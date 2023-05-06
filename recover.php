<?php
include 'dbConnection.php';
$recoverType = @$_GET['recoverType'];

    if ($recoverType == 'lesson') {
        $lid = $_GET['lid'];
        $upd = mysqli_query($con, "UPDATE lesson SET isArchive=0 WHERE id='$lid'") or die(mysqli_connect_error($upd));

        echo "<script>
                alert('Lesson recovered');
                window.location.href='archives.php';
            </script>";
    }
    elseif ($recoverType == 'quiz') {
        $Qid = $_GET['Qid'];
        $upd = mysqli_query($con, "UPDATE quiz SET status='enabled' WHERE id='$Qid'") or die(mysqli_connect_error($upd));

        echo "<script>
                alert('Quiz recovered');
                window.location.href='quizArchives.php';
            </script>";
    }
?>