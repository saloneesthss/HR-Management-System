<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location: departments.php?error=No department found with the given ID.");
    die;
}

$id=(int) $_GET['id'];

$sql="delete from `department` where Dep_ID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();

header("Location:departments.php?success=Selected department is deleted successfully.");
die;