<?php
include_once 'dbConnection.php';
ob_start();
$name1     = $_POST['name'];
$name     = strtolower($name1);
$gender   = $_POST['gender'];
$username = $_POST['username'];
$phone     = $_POST['phno'];
$password = $_POST['password'];
$branch   = $_POST['branch'];

$insert = mysqli_query($con, "INSERT INTO user VALUES  (NULL,'$name','','$branch','$gender' ,'$username' ,'$phone', '$password')");
if ($insert) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['name'] = $name;
    
    header("location:account2.php");
} else {
    header("location:index.php?q7=Username already exists. Please choose another&name=$name&username=$username&gender=$gender&phno=$phno&branch=$branch");
}
ob_end_flush();


?>