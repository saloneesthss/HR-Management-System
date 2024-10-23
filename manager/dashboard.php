<?php
require_once "../logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                
            <div class="logo">
             <h2>C<span class="danger">BABAR</span></h2>
</div>
<div class="close">
    <span class="material-symbols-sharp">close</span>
</div>
</div>
<div class="sidebar">
    <a href="#">
        <span class="material-symbols-sharp">grid_view</span>
        <h3>Dashboard</h3>
</a>
<a href="#" class="active">
    <span class="material-symbols-sharp">person_outline</span>
    <h3>Profile</h3>
</a>
<a href="#">
<span class="material-symbols-sharp">pen-to-square</span>
<h3>Leave Request</h3>
</a>
<a href="#">
<span class="material-symbols-sharp">receipt_long</span>
<h3>Leave Subsitution</h3>
</a>





            <ul>
        <li><a href="profile.php">Profile</a></li>
                <li><a href="leave_approve.html">Leave Request</a></li>
                <li><a href="leave_substitute.html">Leave Substitution</a></li>
            </ul>
        </aside>
    </div>
</body>
</html>

