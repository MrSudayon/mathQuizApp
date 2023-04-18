<?php
include_once 'dbConnection.php';
ob_start();
$username = $_POST['username'];
$password = $_POST['password'];
$username = stripslashes($username);
$username = addslashes($username);
$password = stripslashes($password);
$password = addslashes($password);
$q3 = mysqli_query($con, "INSERT INTO admin VALUES (NULL,'$username' , '$password')");
if ($q3) {
 echo 'adding done';
 header("location:admindash.php");
} else {
    
}
ob_end_flush();
?>