<?php
session_start();
require_once "../connection.php";

if (!isset($_SESSION['employeeid']) && isset($_COOKIE['employeeid'])) {
    $_SESSION['employeeid'] = $_COOKIE['employeeid'];
}

if (!isset($_SESSION['employeeid'])) {
    header("Location:../login.php?error=You are not logged in, please login first." );
    die;
}
