<?php
include 'dbConnection.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';                         
mysqli_query($con, "UPDATE lesson SET isArchive = '1' WHERE id = '$id'");
echo "<script>
        alert('Lesson Removed');
        window.location.href='lessons.php';
    </script>";

?>