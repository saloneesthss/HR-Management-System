<?php
include '../logincheck.php';

$employee_id = $_SESSION['employeeid']; 
// Fetch employee data
$employee_id = isset($_SESSION['employeeid']) ? $_SESSION['employeeid'] : ''; // Example employee ID
$sql = "SELECT * FROM employees WHERE EmployeeID = :employee_id";
$stmt = $con->prepare($sql);
$stmt->execute(['employee_id' => $employee_id]);
$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    echo "Employee not found.";
    exit;
}

// Fetch employee leave history
$leave_sql = "SELECT `Leave type`, `Start date`, `End date`, Status FROM `leave` WHERE `Request by` = :employee_name ORDER BY `Start date` DESC LIMIT 5";
$leave_stmt = $con->prepare($leave_sql);
$leave_stmt->execute(['employee_name' => $employee['Emp_Name']]);
$leave_records = $leave_stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch last 5 attendance records
$attendance_sql = "SELECT Date, `Check in`, `Check out` FROM attendance WHERE EmployeeID = :employee_id ORDER BY Date DESC LIMIT 5";
$attendance_stmt = $con->prepare($attendance_sql);
$attendance_stmt->execute(['employee_id' => $employee_id]);
$attendance_records = $attendance_stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding-left: 300px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 95%;
            overflow: hidden;
            margin-top: 220px;
            margin-bottom: 40px;
        }

        .profile-header {
            position: relative;
            height: 150px;
            background: linear-gradient(135deg,rgb(30, 57, 145), #05223d);
        }

        .profile-header img {
            position: absolute;
            bottom: -50px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #fff;
            object-fit: cover;
        }

        .profile-body {
            text-align: center;
            padding: 70px 20px 20px;
        }

        .profile-body h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .profile-body p {
            color: #777;
            font-size: 16px;
            margin: 5px 0 15px;
        }

        .profile-stats {
            display: flex;
            justify-content: space-around;
            padding: 15px 0;
            border-top: 1px solid #eee;
        }

        .profile-stats div {
            text-align: center;
        }

        .profile-stats div h3 {
            margin: 0;
            color: #333;
            font-size: 20px;
        }

        .profile-stats div p {
            margin: 0;
            color: #777;
            font-size: 14px;
        }

        .action-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            background: #6e8efb;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .action-buttons button:hover {
            background: #05223d;
        }
    </style>
</head>
<body style="height:730px;">
<?php include "sidebar.php" ?>

<div class="container">

    <div class="profile-container">
        <div class="profile-header">
            <img src="<?= !empty($employee['Image']) ? '../employee_images/' . $employee['Image']:'../employee_images/default.png'; ?>" 
            alt="Profile Picture">
        </div>
        <div class="profile-body">
            <h2><?= htmlspecialchars($employee['Emp_Name']) ?></h2>
            <p><?= htmlspecialchars($employee['Email']) ?></p>
        </div>
        <div class="profile-stats">
            <div>
                <h3><?= htmlspecialchars($employee['DOB']) ?></h3>
                <p>Date of birth</p>
            </div>
            <div>
                <h3><?= htmlspecialchars($employee['Gender']) ?></h3>
                <p>Gender</p>
            </div>
            <div>
                <h3><?= htmlspecialchars($employee['Contact']) ?></h3>
                <p>Contact</p> 
            </div>
            <div>
                <h3><?= htmlspecialchars($employee['Salary']) ?></h3>
                <p>Salary</p>
            </div>
            <div>
                <h3><?= htmlspecialchars($employee['Dep_Id']) ?></h3>
                <p>Department</p>
            </div>
        </div>

        <div class="profile-section" style="text-align:center;margin-top:40px;">
            <h3>Recent Attendance</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align:center;">Date</th>
                        <th style="text-align:center;">Check-In</th>
                        <th style="text-align:center;">Check-Out</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($attendance_records as $record) { ?>
                        <tr>
                            <td><?= htmlspecialchars($record['Date']) ?></td>
                            <td><?= htmlspecialchars($record['Check in']) ?></td>
                            <td><?= htmlspecialchars($record['Check out'] ?? 'Not Checked Out') ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="profile-section" style="text-align:center;margin-top:40px;margin-bottom:20px;">
            <h3>Recent Leave Requests</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align:center;">Leave Type</th>
                        <th style="text-align:center;">Start Date</th>
                        <th style="text-align:center;">End Date</th>
                        <th style="text-align:center;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leave_records as $leave) { ?>
                        <tr>
                            <td><?= htmlspecialchars($leave['Leave type']) ?></td>
                            <td><?= htmlspecialchars($leave['Start date']) ?></td>
                            <td><?= htmlspecialchars($leave['End date']) ?></td>
                            <td>
                                <span class="label label-<?= $leave['Status'] == 'approved' ? 'success' : ($leave['Status'] == 'rejected' ? 'danger' : 'warning') ?>">
                                    <?= ucfirst(htmlspecialchars($leave['Status'])) ?>
                                </span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</body>
</html>
