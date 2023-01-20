<?php
    require('configs/connection.php');
    require('configs/functions.php');

    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_ID']);
    unset($_SESSION['NAME']);
    echo "<script>window.location.href='index.php'</script>";
    die();
?>