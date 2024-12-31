<?php
// Database connection
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'hr_management_system';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch employee data
$employee_id = isset($_GET['EmployeeID']) ? $_GET['EmployeeID'] : 1; // Example employee ID
$sql = "SELECT * FROM employees WHERE EmployeeID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $employee_id);
$stmt->execute();
$result = $stmt->get_result();
$employee = $result->fetch_assoc();

if (!$employee) {
    echo "Employee not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding-left: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .profile-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 60%;
            overflow: hidden;
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
<body>
  <?php include "sidebar.php" ?>
    <div class="profile-container">
        <div class="profile-header">
            <img src="<?php echo $employee['Image'] ?>">
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
                <h3><?= htmlspecialchars($employee['Dep_ID']) ?></h3>
                <p>Department</p>
            </div>
        </div>
    </div>
</body>
</html>
