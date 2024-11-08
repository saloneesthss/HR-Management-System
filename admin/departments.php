<?php
require_once "logincheck.php";
require_once "../connection.php";

$stmtDep=$con->prepare("select * from department");
$stmtDep->execute();
$departments=$stmtDep->fetchAll(PDO::FETCH_ASSOC);
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
            <h2>Departments</h2>
            <div class="card">
                <div class="card-header">
                    Department Listing
                    <a href="add_department.php" class="btn btn-primary">Add New</a>
                </div>
                <div class="card-body p-0">
                    <?php if(isset($_GET['error'])) { ?>
                    <div class="alert alert-danger">
                        <?php echo $_GET['error']; ?>
                    </div>
                    <?php } ?>
                    <?php if(isset($_GET['success'])) { ?>
                    <div class="alert alert-success">
                        <?php echo $_GET['success']; ?>
                    </div>
                    <?php } ?>

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Department ID</th>
                                <th>Department Name</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($departments as $department) {
                            ?>
                            <tr>
                                <td><?php echo $department['Dep_ID'];?></td>
                                <td><?php echo $department['Dep_Name'];?></td>
                                <td><?php echo $department['Location'];?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit_department.php?id=<?php echo $department['Id']; ?>">Edit</a> 
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this department?')"
                                    href="delete_department.php?id=<?php echo $department['Dep_ID']; ?>">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
</html>