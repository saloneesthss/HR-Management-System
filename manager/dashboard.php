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
        <aside class="sidebar">
            <h2>Dashboard</h2>
            <ul>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="leaveapprove.html">Leave Request</a></li>
                <li><a href="settings.html">Settings</a></li>
            </ul>
        </aside>

        <main class="main-content">
            <header>
                <h1>Welcome, Mr.Manager</h1>
                <p>Here's a summary of the employees of your department.</p>
            </header>

            <section id="profile" class="card">
                <h2>Profile of employees:</h2>
                <p>Name:</p>
                <p>Position:</p>
                <p>Department:</p>
            </section>

            <section id="leaverequest" class="card">
                <h2>Leave Requests</h2>
                <p>No new leave requests</p>
            </section>

            <section id="settings" class="card">
                <h2>Settings</h2>
                <p>Manage your account settings here.</p>
            </section>
        </main>
    </div>
</body>
</html>
