<?php
require_once "../logincheck.php";
require_once "../connection.php";

$depId = isset($_GET['Dep_Id']) ? $_GET['Dep_Id'] : '';
$where='';
if (!empty($depId)) {
    $where="WHERE employees.Dep_Id=manager.Dep_Id and employees.Dep_Id=$depId";
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
            <h2>Employees</h2>
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