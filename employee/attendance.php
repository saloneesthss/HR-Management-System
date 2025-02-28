<?php
include '../logincheck.php';
include_once 'sidebar.php';

// $employee_id=isset($_POST['employee_id']);
// $check_in = isset($_POST['check_in']);
// $check_out = isset($_POST['check_out']);
// $date = date('Y-m-d');

// try {
//     // Check if employee already has attendance for today
//     $sql = "SELECT * FROM attendance WHERE EmployeeID = :employee_id AND Date = :date";
//     $stmt = $con->prepare($sql);
//     $stmt->execute(['EmployeeID' => $employee_id, 'Date' => $date]);

//     // Use rowCount() with PDO
//     if ($stmt->rowCount() > 0) {
//         // Update record if check-out is marked
//         if ($check_out) {
//             $updateSql = "UPDATE attendance SET `Check out` = NOW() WHERE EmployeeID = :employee_id AND Date = :date";
//             $updateStmt = $con->prepare($updateSql);
//             $updateStmt->execute(['EmployeeID' => $employee_id, 'date' => $date]);
//             echo "Check-out recorded successfully!";
//         } else {
//             echo "You have already checked in.";
//         }
//     } else {
//         // Insert new record if check-in is marked
//         if ($check_in) {
//             $insertSql = "INSERT INTO attendance (EmployeeID, `Check in`, Date) VALUES (:employee_id, NOW(), :date)";
//             $insertStmt = $con->prepare($insertSql);
//             $insertStmt->execute(['EmployeeID' => $employee_id, 'Date' => $date]);
//             echo "Check-in recorded successfully!";
//         } else {
//             echo "Please check in first.";
//         }
//     }

$date = date('Y-m-d');

$stmtEmp=$con->prepare("select * from employees");
$stmtEmp->execute();
$employees=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $employee_id=$_POST['employee_id'];
    $date=$_POST['date'];
    
    $sql="insert into `attendance` set `EmployeeID`='$employee_id', `Date`='$date'";
    $leaveStmt=$con->prepare($sql);
    $leaveStmt->execute();

    if ($leaveStmt->rowCount() > 0) {
      // Update record if check-out is marked
      if ($check_out) {
          $updateSql = "UPDATE attendance SET `Check out` = NOW() WHERE EmployeeID = :employee_id AND Date = :date";
          $updateStmt = $con->prepare($updateSql);
          $updateStmt->execute(['EmployeeID' => $employee_id, 'date' => $date]);
          echo "Check-out recorded successfully!";
      } else {
          echo "You have already checked in.";
      }
  } else {
      // Insert new record if check-in is marked
      if ($check_in) {
          $insertSql = "INSERT INTO attendance (EmployeeID, `Check in`, Date) VALUES (:employee_id, NOW(), :date)";
          $insertStmt = $con->prepare($insertSql);
          $insertStmt->execute(['EmployeeID' => $employee_id, 'Date' => $date]);
          echo "Check-in recorded successfully!";
      } else {
          echo "Please check in first.";
      }
  }

    //redirect the user to leave
    header("Location:attendance.php?success=Your attendance has been recorded successfully.");
    die;
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
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>
                    
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="employeeid">Employee ID:</label>
                            <select name="employeeid" id="employeeid" class="form-control">
                                <option value="">Select your ID</option>
                                <?php foreach ($employees as $employee) { ?>
                                    <option value="<?php echo $employee['EmployeeID']; ?>">
                                        <?php echo $employee['EmployeeID']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group" style="display:flex; align-items:center;">
                            <label for="check_in" style="white-space:nowrap; padding-right:20px;">Check in:</label>
                            <input type="checkbox" class="form-control" name="check_in" id="check_in">
                        </div>
                        <div class="form-group" style="display:flex; align-items:center;">
                            <label for="check_out" style="white-space:nowrap; padding-right:20px;">Check out:</label>
                            <input type="checkbox" class="form-control" name="check_out" id="check_out">
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