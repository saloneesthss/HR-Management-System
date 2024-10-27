<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>

<div class="container">
<p class="text-right">
    Hello Manager;
    <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
</p>

<?php require_once "../footer.php"; ?>
</div>

</body>
</html>