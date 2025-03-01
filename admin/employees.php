<?php
require_once "logincheck.php";
require_once "../connection.php";

$depId = isset($_GET['Dep_Id']) ? $_GET['Dep_Id'] : '';
$where='';
if (!empty($depId)) {
    $where="WHERE employees.Dep_Id=$depId";
}

$sql="SELECT department.Dep_Name as Dep_Name, employees.* FROM employees INNER JOIN department ON department.Dep_ID=employees.Dep_Id $where";
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
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
     
        <div class="main">
            <h2>Employees
                <a href="add_employee.php" title="Add New">
                    <img src="./resources/plus.png" alt="Add New" style="width:35px;padding:3px;">
                </a>
            <!-- <a href="add_employee.php" class="btn btn-primary">Add New</a> -->
            </h2>
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
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Email</th>
                                <th>Photo</th>
                                <th>Salary</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($employees as $employee) {
                            ?>
                            <tr>
                                <td><?php echo $employee['EmployeeID'];?></td>
                                <td><?php echo $employee['Emp_Name'];?></td>
                                <td><?php echo $employee['Contact'];?></td>
                                <td><?php echo $employee['Email'];?></td>
                                <td>
                                    <?php if (!empty($employee['Image']) && file_exists('../employee_images/' . $employee['Image'])) { ?>
                                        <img width="100" src="../employee_images/<?php echo $employee['Image']; ?>" alt="">
                                    <?php } ?>
                                </td>
                                <td><?php echo number_format($employee['Salary'],2);?></td>
                                <td><?php echo $employee['Dep_Name'];?></td>
                                <td>
                                    <a title="Edit" href="edit_employee.php?id=<?php echo $employee['EmployeeID']; ?>">
                                        <img src="./resources/edit.png" alt="Edit" style="width:25px;">
                                    </a> 
                                    <a title="Delete" onclick="return confirm('Are you sure to delete this employee?')"
                                    href="delete_employee.php?id=<?php echo $employee['EmployeeID']; ?>">
                                        <img src="./resources/delete.png" alt="Delete" style="width:25px;">
                                    </a>
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