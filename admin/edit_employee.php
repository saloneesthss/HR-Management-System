<?php
require_once "./logincheck.php";

if (!isset($_GET['id'])) {
    header("Location:employees.php?error=Please provide a valid ID for the employee.");
    die;
}
$id=(int) $_GET['id'];

$sql="select * from `employees` where EmployeeID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$employee=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$employee) {
    header("Location:employees.php?error=No employees found with the given ID.");
    die;
}
// print_r($employee);
// die;

$stmtEmp=$con->prepare("select * from department");
$stmtEmp->execute();
$departments=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $salary=$_POST['salary'];
    $dep_id=$_POST['dep_id'];
    
    $sql="update employees set Emp_Name='$name', DOB='$dob', Gender='$gender', Contact='$contact', Email='$email', Password='$password', Salary='$salary', Dep_ID='$dep_id' where EmployeeID=$id";
    $empStmt=$con->prepare($sql);
    $empStmt->execute();

    //redirect the admin to employee list
    header("Location:employees.php?success=Employee updated successfully.");
    die;
}
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
            <h2>Edit Employee</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" 
                            value="<?php echo $employee['Emp_Name'] ?>"
                            class="form-control" 
                            name="name" 
                            id="name">
                        </div>
                        <div class="form-group">
                            <label for="dob">DOB:</label>
                            <input type="date" 
                            value="<?php echo $employee['DOB'] ?>"
                            class="form-control" 
                            name="dob" 
                            id="dob">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option <?php echo $employee['Gender']=='male'?'selected':'';?> value="male">Male</option>
                                <option <?php echo $employee['Gender']=='female'?'selected':'';?> value="female">Female</option>
                                <option <?php echo $employee['Gender']=='others'?'selected':'';?> value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="number" 
                            value="<?php echo $employee['Contact'] ?>"
                            class="form-control" 
                            name="contact" 
                            id="contact">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" 
                            value="<?php echo $employee['Email'] ?>"
                            class="form-control" 
                            name="email" 
                            id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" 
                            value="<?php echo $employee['Password'] ?>"
                            class="form-control" 
                            name="password" 
                            id="password">
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="number" 
                            value="<?php echo $employee['Salary'] ?>"
                            class="form-control" 
                            name="salary" 
                            id="salary">
                        </div>
                        <div class="form-group">
                            <label for="dep_id">Department:</label>
                            <select name="dep_id" id="dep_id" class="form-control">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option <?php echo $employee['Dep_ID']==$department['Dep_ID']?'selected':'';?> value="<?php echo $department['Dep_ID']; ?>">
                                        <?php echo $department['Dep_Name']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="employees.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>