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
// print_r($category);
// die;

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    
    $sql="update categories set name='$name', description='$description', status='$status' where id=$id";
    $catStmt=$con->prepare($sql);
    $catStmt->execute();

    //redirect the admin to manager listing page
    header("Location:managers.php?success=Manager updated successfully.");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrative Panel - HR Management System</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['username']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="logout.php">Logout</a>
        </p>

        <?php require_once("menus.php"); ?>

        <div class="main">
            <h2>Categories</h2>
            <div class="card">
                <div class="card-header">
                    Edit Category
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" 
                            value="<?php echo $category['name'] ?>"
                            class="form-control" 
                            name="name" 
                            id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" 
                            id="description" 
                            rows="5" 
                            class="form-control"> <?php echo $category['description'] ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option <?php echo $category['status']==1?'selected':'';?> value="1">Active</option>
                                <option <?php echo $category['status']==0?'selected':'';?> value="0">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="categories.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>