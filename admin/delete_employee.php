<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location: employees.php?error=No employee found with the given ID.");
    die;
}

$id=(int) $_GET['id'];

$sql="delete from `employees` where id=$id";
$stmt=$con->prepare($sql);
$stmt->execute();

header("Location:employees.php?success=Selected employee is deleted successfully.");
die;