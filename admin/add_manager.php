<?php
require_once "./logincheck.php";

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $name=$_POST['name'];
    $description=$_POST['description'];
    $status=$_POST['status'];
    
    $sql="insert into categories set name='$name', description='$description', status='$status'";
    $catStmt=$con->prepare($sql);
    $catStmt->execute();

    //redirect the user to category
    header("Location:categories.php?success=Category added successfully.");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administrative Panel - Swastik Ecommerce</title>
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
                    Add New Category
                    <a href="addcategory.php" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status">Status:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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