<?php
include "../dbConnection.php";

    unset($_SESSION['username']);
    unset($_SESSION['name']);

?>
<script>
    window.location.href="../index.php";
    alert("logged out")
</script>
