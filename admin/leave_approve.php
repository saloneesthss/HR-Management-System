<?php
require_once "logincheck.php";
require_once "../connection.php";

// $depId = isset($_GET['username']) ? $_GET['username'] : '';
// $where='';
// if (!empty($depId)) {
//     $where="WHERE admin.username=$depId";
// }

// $sql="SELECT leave.`Id`, leave.`Leave type`, leave.`Start date`, leave.`End date`, leave.`Reason`, leave.`Status`, leave.`Request by`, `admin`.`username` as `Approved by` FROM `admin` INNER JOIN `leave` ON leave.`Approved by`=`admin`.`username` $where";
$sql="select * from `leave`";
$stmtEmp=$con->prepare($sql);
$stmtEmp->execute();
$leaves=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrative Panel - HR Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
     
        <div class="main">
            <h2>Leave Requests </h2>
            <div class="card">
                <div class="card-body p-0">
                    <?php if(isset($_GET['error'])) { ?>
                    <div class="alert alert-danger">
                        <?php echo $_GET['error']; ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Request by</th>
                                <th>Leave type</th>
                                <th>Start date</th>
                                <th>End date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($leaves as $leave) {
                            ?>
                            <tr>
                                <td><?php echo $leave['Id'];?></td>
                                <td><?php echo $leave['Request by'];?></td>
                                <td><?php echo $leave['Leave type'];?></td>
                                <td><?php echo $leave['Start date'];?></td>
                                <td><?php echo $leave['End date'];?></td>
                                <td><?php echo $leave['Reason'];?></td>
                                <td>
                                   <form method="POST">
                                        <input type="hidden" name="leave_id" value="<?php echo $leave['Id']; ?>">
                                        <select name="status" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="approved">Approve</option>
                                            <option value="rejected">Reject</option>
                                        </select>
                                        <!-- <button type="submit" class="btn btn-success" style="margin-top: 5px;">Update</button> -->
                                    </form>
                                </td>
                                <!-- <td>
                                    <?php if (!empty($leave['Image']) && file_exists('../employee_images/' . $employee['Image'])) { ?>
                                        <img width="100" src="../employee_images/<?php echo $employee['Image']; ?>" alt="">
                                    <?php } ?>
                                </td> -->
                                <td>
                                    <button title="Save" alt="Save" type="submit" class="btn btn-danger">Submit</button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</body>
</html>