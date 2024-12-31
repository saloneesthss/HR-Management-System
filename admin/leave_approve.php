<?php
require_once "logincheck.php";
require_once "../connection.php";

$manId = isset($_GET['Man_Name']) ? $_GET['Man_Name'] : '';
$where='';
if (!empty($manId)) {
    $where="WHERE `manager`.`Man_Name`=$manId";
}

$sql="SELECT `manager`.`Man_Name` as `Approved by`, `leave`.* FROM `leave` INNER JOIN `manager` ON `manager`.`Man_Name`=`leave`.`Approved by` $where";
$stmtLeave=$con->prepare($sql);
$stmtLeave->execute();
$leaves=$stmtLeave->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
<?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
        <div class="main">
            <h2>Leave Requests</h2>
            <div class="card">
                <div class="card-header">
                    Leave Request Listing
                </div>
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
                                <th>Requested by</th>
                                <th>Leave Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Approved by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($leaves as $leave) {
                            ?>
                            <tr>
                                <td><?php echo $leave['Request by'];?></td>
                                <td><?php echo $leave['Leave type'];?></td>
                                <td><?php echo $leave['Start date'];?></td>
                                <td><?php echo $leave['End date'];?></td>
                                <td><?php echo $leave['Reason'];?></td>
                                <td>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="approved">Approve</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Reject</option>
                                    </select>
                                </td>
                                <td><?php echo $leave['Approved by'];?></td>
                                <td><button type="submit" class="btn btn-success">Submit</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php require_once "../footer.php"; ?>

    </div>

</body>
</html>