<?php
    session_start();
    if(!isset($_SESSION["username"])||(trim($_SESSION['username'])=='')) {
        header("Location: auth-login.php");
        exit();
    }
    $session_id=$_SESSION['username'];
?>