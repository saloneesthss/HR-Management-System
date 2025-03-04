<?php
require_once "logincheck.php";

$stmtEmp=$con->prepare("select * from employees");
$stmtEmp->execute();
$employees=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $employee_id=$_POST['employee_id'];
    $paydate=$_POST['paydate'];
    $salary=$_POST['salary'];
    $account_no=$_POST['account_no'];
    
    $tax_amount = $salary*0.01;
    $tax_deducted_salary = $salary - ($salary * 0.01);

    $sql="insert into payroll set EmployeeID='$employee_id', `Pay date`='$paydate', Salary='$salary', `Account number`='$account_no', `Tax Amount`='$tax_amount', `Net Salary`='$tax_deducted_salary'";
    $depStmt=$con->prepare($sql);
    $depStmt->execute();

    //redirect the user to payroll
    header("Location:add_salary.php?success=Payroll added successfully.");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrative Panel - HR Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script>
        function calculateTax() {
            let salary = document.getElementById("salary").value;
            let taxAmount = salary * 0.01;
            let netSalary = salary - taxAmount;

            document.getElementById("tax_amount").value = taxAmount.toFixed(2);
            document.getElementById("net_salary").value = netSalary.toFixed(2);
        }
    </script>
</head>
<body>	
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
      
        <div class="main">
            <h2>Add Payroll</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="employee_id">Employee ID:</label>
                            <select name="employee_id" id="employee_id" class="form-control">
                                <option value="">Select Employee</option>
                                <?php foreach ($employees as $employee) { ?>
                                    <option value="<?php echo $employee['EmployeeID']; ?>">
                                        <?php echo $employee['Emp_Name']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paydate">Pay date:</label>
                            <input type="date" class="form-control" name="paydate" id="paydate">
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary amount:</label>
                            <input type="number" class="form-control" name="salary" id="salary">
                        </div>
                        <div class="form-group">
                            <label for="tax_amount">Tax Amount (1% Deducted):</label>
                            <input type="text" class="form-control" id="tax_amount" readonly>
                        </div>
                        <div class="form-group">
                            <label for="net_salary">Net Salary:</label>
                            <input type="number" class="form-control" id="net_salary" readonly>
                        </div>
                        <div class="form-group">
                            <label for="account_no">Account number:</label>
                            <input type="number" class="form-control" name="account_no" id="account_no">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="add_salary.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>