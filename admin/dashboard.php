<?php
require_once "logincheck.php";
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>
    Admin Dashboard
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
	<?php require_once "sidebar.php"; ?>
	
	<center>
	<div class="head">
	<h2> ADMIN DASHBOARD </h2>
	</div>
	</center>
	
	<a href="leave_approve.php" title="Leave Requests">
	<img src="https://cdn3.iconfinder.com/data/icons/growth-marketing-8/66/27-512.png" style="padding:8px;margin-left:430px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Leave Requests">	
	</a> 
	
	<!-- <a href="managers.php" title="Manager">
	<img src="https://cdn0.iconfinder.com/data/icons/business-startup-10/50/63-512.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Leave Requests">
	</a>  -->
	
	<a href="departments.php" title="Department">
	<img src="https://cdn2.iconfinder.com/data/icons/building-219/66/3-512.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Departments">
	</a>

	<a href="employees.php" title="Employee">
	<img src="https://cdn4.iconfinder.com/data/icons/accounting-49/62/Bookkeeper-accountant-office-financial-manager-512.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Employees List">
	</a> 

	<!-- <p><?php require_once "../footer.php"; ?></p> -->
	
</body>
</html>
