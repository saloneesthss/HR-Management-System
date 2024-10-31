<?php
require_once "../logincheck.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once "sidebar.php"; ?>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['email']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
    
        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>