<?php
session_start();
require_once "logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <title>Administrative Panel - HR Management System</title>
</head>
<body>
<div class="container">
<p class="text-right">
    Hello <?php echo $_SESSION['username']; ?> 
    <a onclick="return confirm('Are you sure to logout?');" href="logout.php">Logout</a>
</p>
<div class="card-header">
    Add New Employee
    <a href="add_employee.php" class="btn btn-primary">Add New</a>
</div>

<div class="card-header">
    Add New Manager
    <a href="add_manager.php" class="btn btn-primary">Add New</a>
</div>

<div class="card-header">
    Edit Employee
    <a href="edit_employee.php" class="btn btn-primary">Edit</a>
</div>

<div class="card-header">
    Delete Employee
    <a href="delete_employee.php" class="btn btn-primary">Delete</a>
</div>

<div class="card-header">
    Edit Manager
    <a href="edit_manager.php" class="btn btn-primary">Edit</a>
</div>

<div class="card-header">
    Delete Manager
    <a href="delete_manager.php" class="btn btn-primary">Delete</a>
</div>
</div>
</body>
</html>