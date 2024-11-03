<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leave Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container">
        <p class="text-right">
            Hello;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>    
    </div>
</body>
</html>