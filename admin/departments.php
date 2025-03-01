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
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
     
        <div class="main">
            <h2>Departments
                <a href="add_department.php" title="Add New">
                <img src="./resources/plus.png" title="Add New" style="width:35px;padding:3px;">
                </a>
            </h2>
            
            <div class="card">
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
                                    <a title="Edit" href="edit_department.php?id=<?php echo $department['Id']; ?>">
                                        <img src="./resources/edit.png" alt="Edit" style="width:25px;margin-right:10px;">
                                    </a> 
                                    <a title="Delete" onclick="return confirm('Are you sure to delete this department?')"
                                    href="delete_department.php?id=<?php echo $department['Id']; ?>">
                                        <img src="./resources/delete.png" alt="Delete" style="width:25px;">
                                    </a>
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