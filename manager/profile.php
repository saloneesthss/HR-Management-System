<?php
require_once "../logincheck.php";
require_once "../connection.php";

$stmtManager=$con->prepare("select * from employees");
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
    <!-- <a href="addemployee.html">Add new employee</a>
    <section id="profile" class="card">
        <h2>Profile of employees:</h2>
        <p>Name:</p>
        <p>Position:</p>
        <p>Department:</p>
    </section> -->

    <div class="container">
        <p class="text-right">
            Hello Manager;
            <a onclick="return confirm('Are you sure to logout?');" href="../logout.php">Logout</a>
        </p>

        <div class="main">
            <h2>Profile of Employees</h2>
            <div class="card">
                <!-- <div class="card-header">
                    Add New Employee
                    <a href="addemployee.php" class="btn btn-primary">Add New</a>
                </div> -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employees as $employee) {
                            ?>
                            <tr>
                                <td><?php echo $employee['id']; ?></td>
                                <td><?php echo $employee['name']; ?></td>
                                <td><?php echo $employee['email']; ?></td>
                                <td><?php echo $employee['password']; ?></td>
                                <td><?php echo $employee['contact']; ?></td>
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