<?php
require_once "logincheck.php";
require_once "../connection.php";

$depId = isset($_GET['Dep_Id']) ? $_GET['Dep_Id'] : '';
$where='';
if (!empty($depId)) {
    $where="WHERE manager.Dep_Id=$depId";
}

$sql="SELECT department.Dep_Name as Dep_Name, manager.* FROM manager INNER JOIN department ON department.Dep_ID=manager.Dep_Id $where";
$stmtMan=$con->prepare($sql);
$stmtMan->execute();
$managers=$stmtMan->fetchAll(PDO::FETCH_ASSOC);
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
            <h2>Managers</h2>
            <div class="card">
                <div class="card-header">
                    Manager Listing
                    <a href="add_manager.php" class="btn btn-primary">Add New</a>
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Photo</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($managers as $manager) {
                            ?>
                            <tr>
                                <td><?php echo $manager['ManagerID'];?></td>
                                <td><?php echo $manager['Man_Name'];?></td>
                                <td><?php echo $manager['Email'];?></td>
                                <td><?php echo $manager['Contact'];?></td>
                                <td>
                                    <?php if (!empty($manager['Image']) && file_exists('../manager_images/' . $manager['Image'])) { ?>
                                        <img width="100" src="../manager_images/<?php echo $manager['Image']; ?>" alt="">
                                    <?php } ?>
                                </td>
                                <td><?php echo $manager['Dep_Name'];?></td>
                                <td>
                                    <a class="btn btn-primary" href="edit_manager.php?id=<?php echo $manager['ManagerID']; ?>">Edit</a> 
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this manager?')"
                                    href="delete_manager.php?id=<?php echo $manager['ManagerID']; ?>">Delete</a>
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