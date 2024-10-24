<?php
require_once "logincheck.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <title>Administrative Panel - HR Management System</title>
</head>

<body>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['username']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="logout.php">Logout</a>
        </p>

        <div class="col">
            <div class="col-12 bg-secondary text-white">
                <a href="managers.php" class="text-white">Managers</a>
                |
                <a href="employees.php" class="text-white">Employees</a>
            </div>
        </div>

        <div class="main" style="height:300px;">
            <h1>Welcome to administrative panel of HR Management System.</h1>
        </div>

        <div class="footer">
            Copyright @ HR Management System
        </div>
    </div>
</body>
</html>