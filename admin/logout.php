<?php
session_start();

unset($_SESSION['admin_login']);

header("Location:admin_login.php?success=You are logged out successfully.");
die;
?>