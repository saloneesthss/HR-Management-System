<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location: managers.php?error=No manager found with the given ID.");
    die;
}

$id=(int) $_GET['id'];

$sql="delete from `manager` where ManagerID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();

header("Location:managers.php?success=Selected manager is deleted successfully.");
die;