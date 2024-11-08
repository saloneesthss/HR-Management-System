<?php
session_start();
require_once "../connection.php";

if (!isset($_SESSION['admin_login'])) {
    header("Location:admin_login.php?error=You are not logged in, please login first." );
    die;
}
