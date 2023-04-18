<?php
$connections = mysqli_connect("mysql.hostinger.ph", "u972052303_olasoivan82342", "Hd4e*ne@M9]u", "u972052303_quiz");
// $con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));

if(mysqli_connect_errno()){
    echo "Failed to connect to my MySQL: " . mysqli_connect_error();
}else{
   #echo 'connected';
}



$id = $_POST["id"];
$new_headline = $_POST["new_headline"];
$new_context = $_POST["new_context"];
$new_content = $_POST["new_content"];
$new_ending = $_POST["new_ending"];

mysqli_query($connections, "UPDATE lesson4 SET headline='$new_headline', context='$new_context', content='$new_content' , ending='$new_ending' WHERE id='$id'");
echo "<script>window.location.href='lessons4.php';</script>";

?>