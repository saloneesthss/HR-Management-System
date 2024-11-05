<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr_management_system";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userId = $_POST['userId'];
$currentDate = date("Y-m-d");
$currentTime = date("H:i:s");

// Check if user exists
$userCheck = $conn->query("SELECT * FROM attendance WHERE EmployeeID = '$userId'");
if ($userCheck->num_rows == 0) {
    echo "Invalid User ID";
    exit;
}

// Check if user has already timed in today
$attendanceCheck = $conn->query("SELECT * FROM attendance WHERE EmployeeID = '$userId' AND Date = '$currentDate'");

if ($attendanceCheck->num_rows == 0) {
    // Record time in
    $conn->query("INSERT INTO attendance (EmployeeID, Date, Check in) VALUES ('$userId', '$currentDate', '$currentTime')");
    echo "Time In recorded successfully!";
} else {
    // Update time out
    $conn->query("UPDATE attendance SET Check out = '$currentTime' WHERE EmployeeID = '$userId' AND Date = '$currentDate'");
    echo "Time Out recorded successfully!";
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
   <link rel="stylesheet" href="style.css">
   <style>
    * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

body {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #eaf4fd;
}

.container {
  text-align: center;
}

.attendance-panel {
  background-color: #ffffff;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  max-width: 400px;
  width: 100%;
}

.buttons {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-bottom: 20px;
}

button {
  padding: 10px 15px;
  font-size: 16px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#timeInBtn {
  background-color: #007bff;
  color: white;
}

#timeOutBtn {
  background-color: #d1d1d1;
  color: black;
}

.clock {
  background-color: #007bff;
  color: white;
  border-radius: 50%;
  padding: 30px;
  margin: 20px auto;
  width: 200px;
}

#day {
  font-size: 18px;
  font-weight: bold;
}

#time {
  font-size: 24px;
  margin: 10px 0;
}

#date {
  font-size: 16px;
}

.input-section {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 20px;
}

input[type="text"] {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  width: 150px;
}

button {
  padding: 10px;
  font-size: 16px;
  background-color: #28a745;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

   </style>
   <script>
    
function updateClock() {
    const clockElement = document.getElementById("clock");
    const now = new Date();
    const day = now.toLocaleDateString('en-US', { weekday: 'long' });
    const time = now.toLocaleTimeString('en-US', { hour12: true });
    const date = now.toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' });
    
    document.getElementById("day").textContent = day.toUpperCase();
    document.getElementById("time").textContent = time;
    document.getElementById("date").textContent = date;
}

setInterval(updateClock, 1000); // Update clock every second

function confirmAttendance() {
    const userId = document.getElementById("userId").value;
    if (userId) {
        // Send attendance request to PHP script
        fetch("attendance.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `userId=${userId}`
        })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error("Error:", error));
    } else {
        alert("Please enter your ID.");
    }
}

    </script>
</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container">
        <p class="text-right">
            Hello;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
        <div class="attendance-panel">
            <div class="buttons">
                <button id="timeInBtn" onclick="timeIn()">Time In</button>
                <button id="timeOutBtn" onclick="timeOut()">Time Out</button>
            </div>
            <div class="clock" id="clock">
                <div id="day">THURSDAY</div>
                <div id="time">01:27:36 AM</div>
                <div id="date">March 5, 2020</div>
            </div>

        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>