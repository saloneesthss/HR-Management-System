<?php
require_once "../logincheck.php";

$id=$_GET['id'];
$sql="select * from `employees` where id=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$category=$stmt->fetch(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $id=$_POST['id'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $department_id=$_POST['department_id'];
    
    $sql="update employees set EmployeeID='$id' EmployeeName='$name', Email='$email', Password='$password', Contact='$contact', DepartmentID='$department_id'";
    $empStmt=$con->prepare($sql);
    $empStmt->execute();

    //redirect the manager to employee list
    header("Location:./profile.php?success=Employee updated successfully.");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile of Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <p class="text-right">
            Hello  
            <a onclick="return confirm('Are you sure to logout?');" href="">Logout</a>
        </p>

        <div class="main">
            <h2>Employees</h2>
            <div class="card">
                <div class="card-header">
                    Add New Employee
                    <a href="addemployee.php" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="id">ID:</label>
                            <input type="number" value="<?php echo $category['id'] ?>" class="form-control" name="id" id="id">
                        </div>
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" value="<?php echo $category['name'] ?>" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" value="<?php echo $category['email'] ?>" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" value="<?php echo $category['password'] ?>" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="number" value="<?php echo $category['contact'] ?>" class="form-control" name="contact" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="department_id">Department ID:</label>
                            <input type="text" value="<?php echo $category['department_id'] ?>" class="form-control" name="department_id" id="department_id">
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="profile.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>