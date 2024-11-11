<?php
require_once "logincheck.php";

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $dep_id=$_POST['dep_id'];
    $name=$_POST['name'];
    $location=$_POST['location'];
    
    $sql="insert into department set Dep_ID='$dep_id', Dep_Name='$name', Location='$location'";
    $manStmt=$con->prepare($sql);
    $manStmt->execute();

    //redirect the user to department
    header("Location:departments.php?success=Department added successfully.");
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
            <h2>Add New Department</h2>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="dep_id">Department ID:</label>
                            <input type="text" class="form-control" name="dep_id" id="dep_id">
                        </div>
                        <div class="form-group">
                            <label for="name">Department Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" name="location" id="location">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="departments.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>