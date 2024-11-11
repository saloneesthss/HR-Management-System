<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Sidebar</title>
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
            <a href="managers.php">
                <i class='bx bx-user-circle'></i>
                Manager
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
    </ul>
</div>

<div class="topnav">        
	<a onclick="return confirm('Are you sure to logout?');" 
    href="logout.php">Logout</a>
</div>

</body>
</html>