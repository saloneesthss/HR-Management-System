<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location:departments.php?error=Please provide a valid ID for the department.");
    die;
}
$id=(int) $_GET['id'];

$sql="select * from `department` where Dep_ID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$department=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$department) {
    header("Location:departments.php?error=No department found with the given ID.");
    die;
}

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $dep_id=$_POST['dep_id'];
    $name=$_POST['name'];
    $location=$_POST['location'];
    
    $sql="update department set Dep_Name='$name', Location='$location', Dep_ID='$dep_id' where Dep_ID='$dep_id'";
    $depStmt=$con->prepare($sql);
    $depStmt->execute();

    //redirect the admin to department listing page
    header("Location:departments.php?success=Department updated successfully.");
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
            <h2>Edit Department</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="dep_id">Department ID:</label>
                            <input type="text" 
                            value="<?php echo $department['Dep_ID'] ?>"
                            class="form-control" 
                            name="dep_id" 
                            id="dep_id">
                        </div>
                        <div class="form-group">
                            <label for="name">Department Name:</label>
                            <input type="text" 
                            value="<?php echo $department['Dep_Name'] ?>"
                            class="form-control" 
                            name="name" 
                            id="name">
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="location" 
                            value="<?php echo $department['Location'] ?>"
                            class="form-control" 
                            name="location" 
                            id="location">
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