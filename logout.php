<?php
    session_start();
    if (!isset($_SESSION['logged']))
    {
        header('Location: login.php');
        exit();
    }
    header('Location: index.php');

    session_destroy();
?>