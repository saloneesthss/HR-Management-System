<?php
session_start();

unset($_SESSION['manager_login']);
unset($_SESSION['email']);
unset($_SESSION['managerid']);

unset($_SESSION['employee_login']);
unset($_SESSION['email']);
unset($_SESSION['employeeid']);

header("Location:login.php?success=You are logged out successfully.");
die;
?>