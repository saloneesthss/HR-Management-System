<?php
require_once "logincheck.php";
require_once "../connection.php";

$stmtMan=$con->prepare("select * from manager");
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
    <div class="container">
        <p class="text-right">
            Hello <?php echo $_SESSION['username']; ?> 
            <a onclick="return confirm('Are you sure to logout?');" href="logout.php">Logout</a>
        </p>

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
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($managers as $manager) {
                            ?>
                            <tr>
                                <td><?php echo $manager['id'];?></td>
                                <td><?php echo $manager['name'];?></td>
                                <td><?php echo $manager['contact'];?></td>
                                <td>
                                    <a href="edit_manager.php?id=<?php echo $manager['id']; ?>">Edit</a> |
                                    <a onclick="return confirm('Are you sure to delete this manager?')"
                                    href="delete_manager.php?id=<?php echo $manager['id']; ?>">Delete</a>
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