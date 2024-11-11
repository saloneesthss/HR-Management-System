<?php
require_once "../logincheck.php";

$stmtDep=$con->prepare("select * from payroll");
$stmtDep->execute();
$departments=$stmtDep->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once "sidebar.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payroll</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>
<body>  
    <div class="container" style="padding-left:250px; padding-top:100px;">
     
        <div class="main">
            <h2>Payroll Details</h2>
            <div class="card">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Paydate</th>
                                <th>Salary amount</th>
                                <th>Account number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($departments as $department) {
                            ?>
                            <tr>
                                <td><?php echo $department['EmployeeID'];?></td>
                                <td><?php echo $department['Pay date'];?></td>
                                <td><?php echo $department['Salary amount'];?></td>
                                <td><?php echo $department['Account number'];?></td>
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