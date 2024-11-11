<?php
require_once "logincheck.php";

$stmtEmp=$con->prepare("select * from department");
$stmtEmp->execute();
$departments=$stmtEmp->fetchAll(PDO::FETCH_ASSOC);

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $Dep_Id=$_POST['Dep_Id'];
    
    $sql="insert into manager set Man_Name='$name', Email='$email', Password='$password', Contact='$contact', Dep_Id='$Dep_Id'";
    $depStmt=$con->prepare($sql);
    $depStmt->execute();

    //redirect the user to manager
    header("Location:managers.php?success=Manager added successfully.");
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
            <h2>Add New Manager</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>
                    
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
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
                            <label for="contact">Contact:</label>
                            <input type="number" class="form-control" name="contact" id="contact">
                        </div>
                        <div class="form-group">
                            <label for="Dep_Id">Department ID:</label>
                            <select name="Dep_Id" id="Dep_Id" class="form-control">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option value="<?php echo $department['Id']; ?>">
                                        <?php echo $department['Dep_Name']?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="managers.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>