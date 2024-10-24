<?php
require_once "logincheck.php";

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
    
    $sql="insert into employees set Emp_Name='$name', DOB='$dob', Gender='$gender', Contact='$contact', Email='$email', Password='$password', Salary='$salary', Dep_ID='$dep_id'";
    $manStmt=$con->prepare($sql);
    $manStmt->execute();

    //redirect the user to employee
    header("Location:dashboard.php?success=Employee added successfully.");
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
            <h2>Add New Employee</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="dob">DOB:</label>
                            <input type="date" class="form-control" name="dob" id="dob">
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="number" class="form-control" name="contact" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="number" class="form-control" name="salary" id="salary">
                        </div>
                        <div class="form-group">
                            <label for="status">Department ID:</label>
                            <select name="dep_id" id="dep_id" class="form-control">
                                <option value="">Select Department</option>
                                <option value="HR001">HR001</option>
                                <option value="HR002">HR002</option>
                                <option value="HR003">HR003</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="add_employee.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>