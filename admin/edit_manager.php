<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location:managers.php?error=Please provide a valid ID for the manager.");
    die;
}
$id=(int) $_GET['id'];

$sql="select * from `manager` where ManagerID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$manager=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$manager) {
    header("Location:managers.php?error=No manager found with the given ID.");
    die;
}

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];
    $dep_id=$_POST['dep_id'];
    
    $sql="update manager set Man_Name='$name', Email='$email', Password='$password', Contact='$contact', Dep_ID='$dep_id' where ManagerID=$id";
    $manStmt=$con->prepare($sql);
    $manStmt->execute();

    //redirect the admin to manager listing page
    header("Location:managers.php?success=Manager updated successfully.");
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
            <h2>Edit Manager</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" 
                            value="<?php echo $manager['Man_Name'] ?>"
                            class="form-control" 
                            name="name" 
                            id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" 
                            value="<?php echo $manager['Email'] ?>"
                            class="form-control" 
                            name="email" 
                            id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" 
                            value="<?php echo $manager['Password'] ?>"
                            class="form-control" 
                            name="password" 
                            id="password">
                        </div>
                        <div class="form-group">
                            <label for="contact">Contact:</label>
                            <input type="number" 
                            value="<?php echo $manager['Contact'] ?>"
                            class="form-control" 
                            name="contact" 
                            id="contact">
                        </div>
                        <div class="form-group">
                            <label for="dep_id">Department ID:</label>
                            <input type="text" 
                            value="<?php echo $manager['Dep_ID'] ?>"
                            class="form-control" 
                            name="dep_id" 
                            id="dep_id">
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