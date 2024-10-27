<?php
require_once "../logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manager Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dashboard" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=person,dashboard" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=pending_actions" />   
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=edit_calendar" />     
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
<div class="container">

<p class="text-right">
    Hello Manager;
    <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
</p>

<div class="sidebar">
<a href="dashboard.php">
<span class="material-symbols-outlined">
dashboard
</span>
<h3>Dashboard</h3>

</a>
<a href="profile.php" class="active">
<span class="material-symbols-outlined">
person 
</span>
<h3>Profile</h3>
</a>

<a href="leave_approve.php">
<span class="material-symbols-outlined">
pending_actions
</span>
<h3>Leave Requests</h3>
</a>

<a href="leave_substitute.php">
<span class="material-symbols-outlined">
edit_calendar
</span>
<h3>Leave Subsitution</h3>
</a>
</div>
<?php require_once "../footer.php"; ?>
</div>
</body>
</html>
