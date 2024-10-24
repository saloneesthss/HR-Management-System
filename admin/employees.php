<?php
require_once "logincheck.php";
require_once "../connection.php";

$ManagerID = isset($_GET['ManagerID']) ? (int) $_GET['ManagerID'] : '';
$where='';
if (!empty($ManagerId)) {
    $where="WHERE employees.ManagerID=$ManagerID";
}

$sql="SELECT manager.Man_Name as manager_name, employees.* FROM employees INNER JOIN manager ON manager.ManagerID=employees.manager_id";
$stmtEmp=$con->prepare($sql);
$stmtEmp->execute();
$employees=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrative Panel - HR Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['username']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="logout.php">Logout</a>
        </p>

        <div class="main">
            <h2>Employees</h2>
            <div class="card">
                <div class="card-header">
                    Employee Listing
                    <a href="add_employee.php" class="btn btn-primary">Add New</a>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Manager</th>
                                <th>Salary</th>
                                <th>Department ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employees as $employee) {
                            ?>
                            <tr>
                                <td><?php echo $employee['id'];?></td>
                                <td><?php echo $employee['name'];?></td>
                                <td><?php echo $employee['contact'];?></td>
                                <td><?php echo $employee['email'];?></td>
                                <td><?php echo $employee['manager_name'];?></td>
                                <td><?php echo number_format($employee['salary'],2);?></td>
                                <td><?php echo $employee['dep_id'];?></td>
                                <td><?php echo $product['status']==1?'Active':'Inactive';?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit_employee.php?id=<?php echo $employee['id']; ?>">Edit</a> 
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this employee?')"
                                    href="delete_employee.php?id=<?php echo $employee['id']; ?>">Delete</a>
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