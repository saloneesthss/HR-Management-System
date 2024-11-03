<!DOCTYPE html>
<html lang="en">
<head>
    <title>Attendance</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script>
        function handleCheckIn() {
            document.getElementById("check_in_form").submit();
        }

        function handleCheckOut() {
            document.getElementById("check_out_form").submit();
        }

        setInterval(function() {
            location.reload();
        }, 60000); // Refresh every 60 seconds to check status
    </script>
</head>
<body>
    <!-- <?php require_once "sidebar.php"; ?> -->

    <div class="container">
        <p class="text-right">
            Hello;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>
<!-- 
    if ($row && $row['Status'] == 'Checked In') {
        echo "<p>You are currently <strong>Checked In</strong>. Time: " . $row['check_in'] . "</p>";
    } else {
        echo "<p>You are currently <strong>Checked Out</strong>. Last Check-Out: " . ($row ? $row['check_out'] : 'N/A') . "</p>";
    }
    ?> -->

    <!-- Check-in Form -->
    <form id="check_in_form" action="" method="POST">
        <input type="hidden" name="check_in" value="1">
        <button type="submit" onclick="handleCheckIn()"> <!-- <?php echo ($row && $row['status'] == 'Checked In') ? 'disabled' : ''; ?> --> 
            Check In
        </button>
    </form>

    <!-- Check-out Form -->
    <form id="check_out_form" action="" method="POST">
        <input type="hidden" name="check_out" value="1">
        <button type="submit" onclick="handleCheckOut()"> <!-- <?php echo (!$row || $row['status'] == 'Checked Out') ? 'disabled' : ''; ?> -->
            Check Out
        </button>
    </form>

        <?php require_once "../footer.php"; ?>
    </div>
</body>
</html>