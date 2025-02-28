<?php
session_start();
require_once "../connection.php";

if (!isset($_SESSION['employee_login'])) {
    header("Location:../login.php?error=You are not logged in, please login first." );
    die;
}
