<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payroll</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>    
    <?php require_once "sidebar.php"; ?>

    <div class="container">
        <p class="text-right">
            Hello;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
        <h2>Payroll</h2>
        <p>View your payroll information and salary details.</p>
        
        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>