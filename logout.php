<?php
session_start();

unset($_SESSION['admin_login']);
unset($_SESSION['username']);
unset($_SESSION['userid']);

header("Location:loginform.php?success=You are logged out successfully.");
die;
?>