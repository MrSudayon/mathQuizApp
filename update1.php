<?php
include 'dbConnection.php';

$id = $_POST["id"];
$new_headline = $_POST["new_headline"];
$new_context = $_POST["new_context"];
$new_content = $_POST["new_content"];
$new_ending = $_POST["new_ending"];

mysqli_query($con, "UPDATE lesson SET headline='$new_headline', context='$new_context', content='$new_content' , ending='$new_ending' WHERE id='$id'");
echo "<script>window.location.href='lessons.php';</script>";

?>