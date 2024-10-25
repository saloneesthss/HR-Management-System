<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['email']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
    </div>
</body>
</html>