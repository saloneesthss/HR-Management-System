<?php
require_once "../logincheck.php";
?>

<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>
    Manager Dashboard
</title>
</head>

<body>
	<?php require_once "sidebar.php"; ?>
	
	<center>
	<div class="head">
	<h2> MANAGER DASHBOARD </h2>
	</div>
	</center>
	
	<a href="profile.php" title="View Profile">
	<img src="https://cdn0.iconfinder.com/data/icons/seo-web-4-1/128/Vigor_User-Avatar-Profile-Photo-01-512.png" style="padding:8px;margin-left:500px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Profile">
	</a>
		
	<a href="leave_approve.php" title="Leave Requests">
	<img src="https://cdn3.iconfinder.com/data/icons/digital-marketing-filled-outline-3/64/time-128.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Leave Requests">
	</a> <br>
	
	<a href="leave_substitute.php" title="Leave Substitution">
	<img src="https://cdn3.iconfinder.com/data/icons/growth-marketing-8/66/27-512.png" style="padding:8px;margin-left:500px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Leave Substitution">
	</a>

	<a href="employees.php" title="View employees">
	<img src="https://cdn2.iconfinder.com/data/icons/business-874/70/directory__contactbook__library__employees__records-256.png" style="padding:8px;margin-left:100px;margin-top:40px;width:200px;height:200px;border:2px solid black;" alt="Employees List">
	</a>
	<?php require_once "../footer.php"; ?>

</body>
</html>