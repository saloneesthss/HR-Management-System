<?php
require_once "../logincheck.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=dashboard" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=calendar_month" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=payments" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=event_upcoming" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['email']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
    
        <div class="sidebar">
            <a href="dashboard.php">
                <!-- <span class="material-symbols-outlined">
                dashboard
                </span> -->
                <h3>Dashboard</h3>
            </a>

            <a href="profile.php" class="active">
                <!-- <span class="material-symbols-outlined">
                person 
                </span> -->
                <h3>Profile</h3>
            </a>

            <a href="attendance.php">
                <!-- <span class="material-symbols-outlined">
                calendar_month
                </span> -->
                <h3>Attendance</h3>
            </a>

            <a href="payroll.php">
                <!-- <span class="material-symbols-outlined">
                payments
                </span> -->
                <h3>Payroll Details</h3>
            </a>

            <a href="leave.php">
                <!-- <span class="material-symbols-outlined">
                event_upcoming
                </span> -->
                <h3>Leave Request</h3>
            </a>
        </div>
        
        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>