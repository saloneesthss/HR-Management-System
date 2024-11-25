<?php
require_once "logincheck.php";

$stmtEmp=$con->prepare("select * from department");
$stmtEmp->execute();
$departments=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

$uploadPath="../employee_images";
// Used for uploading images to folder

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $salary=$_POST['salary'];
    $Dep_Id=$_POST['Dep_Id'];
    
    $imageName=null;
    if(is_uploaded_file($_FILES['image_name']['tmp_name'])) {
        $imageName=$_FILES['image_name']['name'];
        move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadPath . "/" . $imageName);
    }
    
    $sql="insert into employees set Emp_Name='$name', DOB='$dob', Gender='$gender', Contact='$contact', Email='$email', Password='$password', Image='$imageName', Salary='$salary', Dep_Id='$Dep_Id'";
    $depStmt=$con->prepare($sql);
    $depStmt->execute();

    //redirect the user to employee
    header("Location:employees.php?success=Employee added successfully.");
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
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
      
        <div class="main">
            <h2>Add New Employee</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <form action="" method="POST" enctype="multipart/form-data">
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
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group">
                            <label for="image_name">Image:</label>
                            <input type="file" accept=".jpg,.jpeg,.png" class="form-control" name="image_name" id="image_name">
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="number" class="form-control" name="salary" id="salary">
                        </div>
                        <div class="form-group">
                            <label for="Dep_Id">Department ID:</label>
                            <select name="Dep_Id" id="Dep_Id" class="form-control">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option value="<?php echo $department['Dep_Id']; ?>">
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