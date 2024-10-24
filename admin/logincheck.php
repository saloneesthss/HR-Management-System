<?php
require_once "../connection.php";

session_start();

if (!isset($_SESSION['admin_login'])) {
    header("Location:loginform.php?error=You are not logged in, please login first." );
    die;
}
