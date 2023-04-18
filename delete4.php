<?php
$connections = mysqli_connect("mysql.hostinger.ph", "u972052303_olasoivan82342", "Hd4e*ne@M9]u", "u972052303_quiz");
// $con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));

if(mysqli_connect_errno()){
    echo "Failed to connect to my MySQL: " . mysqli_connect_error();
}else{
   echo 'connected';
}

$id = isset($_GET['id']) ? $_GET['id'] : '';                        
mysqli_query($connections, "DELETE FROM lesson4 WHERE id = '$id'");
echo "<script>window.location.href='lessons4.php';</script>";

?>