<?php
include '../logincheck.php';
include_once 'sidebar.php';

$date = date('Y-m-d');

$stmtEmp = $con->prepare("SELECT * FROM employees");
$stmtEmp->execute();
$employees = $stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $employee_id = $_POST['employee_id'];
    $check_in = isset($_POST['check_in']);
    $check_out = isset($_POST['check_out']);

    // Check if the employee already has an attendance record for today
    $stmt = $con->prepare("SELECT * FROM attendance WHERE EmployeeID = :employee_id AND Date = :date");
    $stmt->execute(['employee_id' => $employee_id, 'date' => $date]);
    $attendance = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($attendance) {
        // If already checked in, update check-out if requested
        if ($check_out) {
            $updateSql = "UPDATE attendance SET `Check out` = NOW() WHERE EmployeeID = :employee_id AND Date = :date";
            $updateStmt = $con->prepare($updateSql);
            $updateStmt->execute(['employee_id' => $employee_id, 'date' => $date]);
            $message = "Check-out recorded successfully!";
        } else {
            $message = "You have already checked in.";
        }
    } else {
        // Insert new attendance record if checking in
        if ($check_in) {
            $insertSql = "INSERT INTO attendance (EmployeeID, `Check in`, Date) VALUES (:employee_id, NOW(), :date)";
            $insertStmt = $con->prepare($insertSql);
            $insertStmt->execute(['employee_id' => $employee_id, 'date' => $date]);
            $message = "Check-in recorded successfully!";
        } else {
            $message = "Please check in first.";
        }
    }

    // Redirect with success message
    header("Location: attendance.php?success=" . urlencode($message));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container" style="padding-left:250px; padding-top:100px;">
        <div class="main">
            <h2>Record Attendance</h2>
            <div class="card">
                <div class="card-body">
                    <?php if (isset($_GET['success'])) { ?>
                        <div class="alert alert-success">
                            <?php echo $_GET['success']; ?>
                        </div>
                    <?php } ?>
                    
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="employee_id">Employee Name:</label>
                            <select name="employee_id" id="employee_id" class="form-control">
                                <option value="">Select your Name</option>
                                <?php foreach ($employees as $employee) { ?>
                                    <option value="<?php echo $employee['EmployeeID']; ?>">
                                        <?php echo $employee['Emp_Name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="display:flex; align-items:center;">
                            <label for="check_in" style="white-space:nowrap; padding-right:20px;">Check in:</label>
                            <input type="checkbox" name="check_in" id="check_in" class="form-control">
                        </div>
                        <div class="form-group" style="display:flex; align-items:center;">
                            <label for="check_out" style="white-space:nowrap; padding-right:20px;">Check out:</label>
                            <input type="checkbox" name="check_out" id="check_out" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="managers.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
