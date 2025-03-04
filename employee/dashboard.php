<?php
require_once "../logincheck.php"
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>
    Employee Dashboard
</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>
	<?php require_once "sidebar.php"; ?>
	
	<center style="margin-left:-40px;">
	<div class="head">
	<h2> EMPLOYEE DASHBOARD </h2>
	</div>
	</center>
	
	<a href="profile.php" title="View Profile">
	<img src="https://cdn0.iconfinder.com/data/icons/seo-web-4-1/128/Vigor_User-Avatar-Profile-Photo-01-512.png" style="padding:8px;margin-left:570px;margin-top:20px;width:200px;height:200px;border:2px solid black;" alt="Profile">
	</a>
		
	<a href="leave.php" title="View Leave Request">
	<img src="https://cdn3.iconfinder.com/data/icons/calendar-and-date-flat/74/13-512.png" style="padding:8px;margin-left:100px;margin-top:20px;width:200px;height:200px;border:2px solid black;" alt="Leave Requests">
	</a> <br>
	
	<a href="payroll.php" title="View Payroll Details">
	<img src="https://cdn4.iconfinder.com/data/icons/accounting-49/62/Payroll-monthly-calendar-check-income-512.png" style="padding:8px;margin-left:570px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Leave Substitution">
	</a>

	<a href="attendance.php" title="View Attendance Details">
	<img src="https://cdn2.iconfinder.com/data/icons/education-59/128/check_up-512.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Employees List">
	</a>
	<p><?php require_once "../footer.php"; ?></p>

</body>
</html>