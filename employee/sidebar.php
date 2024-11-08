<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manager - Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="sidebar">
	<h2> EMPLOYEE  </h2>
	
    <ul>
        <li>
            <a href="dashboard.php">
                <i class='bx bxs-dashboard'></i>
                Dashboard
            </a>
        </li>

        <li>
            <a href="profile.php">
                <i class='bx bx-user-circle'></i>
                Profile
            </a>
        </li>
        
        <li>
            <a href="leave.php">
                <i class='bx bx-calendar-event'></i>
                Leave Request
            </a>
        </li>
        
        <li>
            <a href="payroll.php">
                <i class='bx bx-wallet-alt'></i>
                Payroll Details
            </a>    
        </li>
        
        <li>
            <a href="attendance.php">
                <i class='bx bx-user-check'></i>
                Attendance
            </a>
        </li>
    </ul>
</div>

<div class="topnav">        
	<a onclick="return confirm('Are you sure to logout?');" 
    href="logout.php">Logout</a>
</div>

</body>
</html>