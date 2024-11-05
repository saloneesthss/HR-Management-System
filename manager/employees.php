<?php
require_once "../logincheck.php";
require_once "../connection.php";

$stmtManager=$con->prepare("select * from employees where Dep_ID='HR003'");
$stmtManager->execute();
$employees=$stmtManager->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile of Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <?php require_once "sidebar.php"; ?>

    <div class="container">

        <p class="text-right">
            Hello Manager;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>

        <div class="main">
            <h2>Profile of Employees</h2>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employees as $employee) {
                            ?>
                            <tr>
                                <td><?php echo $employee['EmployeeID']; ?></td>
                                <td><?php echo $employee['Emp_Name']; ?></td>
                                <td><?php echo $employee['Email']; ?></td>
                                <td><?php echo $employee['Contact']; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php require_once "../footer.php"; ?>
        </div>
    </div>
</body>
</html>