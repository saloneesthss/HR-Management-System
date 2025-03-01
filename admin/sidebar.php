<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Sidebar</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="sidebar">
	<h2> A D M I N  </h2>
	
    <ul>
        <li>
            <a href="dashboard.php">
                <i class='bx bxs-dashboard'></i>
                Dashboard
            </a>
        </li>
        
        <li>
            <a href="departments.php">
                <i class='bx bx-buildings'></i>
                Department
            </a>    
        </li>
        
        <li>
            <a href="employees.php">
                <i class='bx bxs-user-account'></i>
                Employee
            </a>
        </li>
        
        <li>
            <a href="leave_approve.php">
                <i class='bx bx-calendar-event'></i>                
                Leave Requests
            </a>
        </li>

        <li>
            <a href="add_salary.php">
            <i class='bx bx-money-withdraw'></i>                
                Payroll
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