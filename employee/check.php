<?php
require_once "../logincheck.php";

$employee_id=$_POST['emplo'];
$today = date('Y-m-d'); 

$sql = "SELECT * FROM leave WHERE EmployeeID = $employee_id AND check_in = '$today' ORDER BY Id DESC LIMIT 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['check_in'])) {
        if (!$row) {
            // First check-in for today
            $sql = "INSERT INTO leave (EmployeeID, Date, Check in, Status) VALUES ($employee_id, '$today', NOW(), 'Checked In')";
            $conn->query($sql);
        }
    } elseif (isset($_POST['check_out']) && $row && $row['Status'] == 'Checked In') {
        // Check out for today
        $sql = "UPDATE leave SET Check out = NOW(), Status = 'Checked Out' WHERE id = " . $row['Id'];
        $conn->query($sql);
    }
}

$conn->close();
header("Location: index.php");
exit;
?>