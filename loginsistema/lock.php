<?php session_start();
    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || !isset($_SESSION['pass'])){
        header('location:index.php?codigo=1');
    }
?>