<?php
    session_start();
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER_NAME']);
    header('location:../index.php');
    die();
?>