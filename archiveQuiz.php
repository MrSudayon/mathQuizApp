<?php
include 'dbConnection.php';

$quizU = @$_GET['qU'];
$id = @$_GET['eid'];

$sql = mysqli_query($con, "UPDATE quiz SET status='archive' WHERE eid = '$id'");
header("location: dashy1.php?unit=$quizU");
?>