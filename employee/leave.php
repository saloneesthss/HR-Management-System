<?php
require_once "../logincheck.php";
require_once "sidebar.php";

$stmtEmp=$con->prepare("select * from employees");
$stmtEmp->execute();
$employees=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $requestby=$_POST['requestby'];
    $leavetype=$_POST['leavetype'];
    $startdate=$_POST['startdate'];
    $enddate=$_POST['enddate'];
    $reason=$_POST['reason'];
    $status=$_POST['status'];
    
    $sql="insert into `leave` set `Request by`='$requestby', `Leave type`='$leavetype', `Start date`='$startdate', `End date`='$enddate', Reason='$reason', Status='$status'";
    $leaveStmt=$con->prepare($sql);
    $leaveStmt->execute();

    //redirect the user to leave
    header("Location:leave.php?success=Your leave request has been sent successfully.");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Leave Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container" style="padding-left:250px; padding-top:100px;">

        <div class="main">
            <h2>Make Leave Request</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>
                    
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="requestby">Requested By:</label>
                            <select name="requestby" id="requestby" class="form-control">
                                <option value="">Select your name</option>
                                <?php foreach ($employees as $employee) { ?>
                                    <option value="<?php echo $employee['Emp_Name']; ?>">
                                        <?php echo $employee['Emp_Name']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="leavetype">Leave Type:</label>
                            <select name="leavetype" id="leavetype" class="form-control">
                                <option value="">Select Leave Type</option>
                                <option value="sick">Sick Leave</option>
                                <option value="festive">Festive Leave</option>
                                <option value="others">Other Leave (Specify reason)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="startdate">Start Date:</label>
                            <input type="date" class="form-control" name="startdate" id="startdate">
                        </div>
                        <div class="form-group">
                            <label for="enddate">End Date:</label>
                            <input type="date" class="form-control" name="enddate" id="enddate">
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason:</label> <br>
                            <textarea name="reason" id="reason" cols="127" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                            <option default value="">Pending</option>
                            </select>
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