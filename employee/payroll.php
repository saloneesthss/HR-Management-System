<?php
require_once "../logincheck.php";
require_once "../connection.php";

$salary = isset($_GET['Salary']) ? $_GET['Salary'] : '';
$where='';
if (!empty($salary)) {
    $where="WHERE payroll.Salary=$salary";
}

$sql="SELECT employees.Salary as Salary, payroll.* FROM payroll INNER JOIN employees ON employees.Salary=payroll.Salary $where";
$stmtEmp=$con->prepare($sql);
$stmtEmp->execute();
$payrolls=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);
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
                            foreach ($payrolls as $payroll) {
                            ?>
                            <tr>
                                <td><?php echo $payroll['EmployeeID'];?></td>
                                <td><?php echo $payroll['Pay date'];?></td>
                                <td><?php echo $payroll['Salary'];?></td>
                                <td><?php echo $payroll['Account number'];?></td>
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