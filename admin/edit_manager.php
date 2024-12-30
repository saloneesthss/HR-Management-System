<?php
require_once "logincheck.php";

if (!isset($_GET['id'])) {
    header("Location:managers.php?error=Please provide a valid ID for the manager.");
    die;
}

$uploadPath="../manager_images";

$id=(int) $_GET['id'];

$sql="select * from `manager` where ManagerID=$id";
$stmt=$con->prepare($sql);
$stmt->execute();
$manager=$stmt->fetch(PDO::FETCH_ASSOC);
if(!$manager) {
    header("Location:managers.php?error=No manager found with the given ID.");
    die;
}

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
    
    $imageNameOld=$_POST['image_name_old'];
    $imageName=$imageNameOld;
    if(is_uploaded_file($_FILES['image_name']['tmp_name'])) {
        if (!empty($imageNameOld) && file_exists('../manager_images/' . $imageNameOld)) {
            unlink('../manager_images/' . $imageNameOld);
        }
        $imageName=$_FILES['image_name']['name'];
        move_uploaded_file($_FILES['image_name']['tmp_name'], $uploadPath . "/" . $imageName);
    }
    
    $sql="update manager set Man_Name='$name', Email='$email', Password='$password', Contact='$contact', Image='$imageName', Dep_Id='$Dep_Id' where ManagerID=$id";
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
    <?php require_once "sidebar.php"; ?>

    <div class="container" style="padding-left:250px; padding-top:100px;">
   
        <div class="main">
            <h2>Edit Manager</h2>
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
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
                            <label for="">Image:</label>
                            <input type="file" accept=".jpg,.jpeg,.png" class="form-control" name="image_name" id="image_name">
                            <input type="hidden" name="image_name_old" value="<?php echo $manager['Image']; ?>">
                            <?php if (!empty($manager['Image']) && file_exists('../manager_images/' . $manager['Image'])) { ?>
                                <img width="100" src="../manager_images/<?php echo $manager['Image']; ?>" alt="">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label for="Dep_Id">Department:</label>
                            <select name="Dep_Id" id="Dep_Id" class="form-control">
                                <option value="">Select Department</option>
                                <?php foreach ($departments as $department) { ?>
                                    <option <?php echo $manager['Dep_Id']==$department['Dep_ID']?'selected':'';?> value="<?php echo $department['Dep_ID']; ?>">
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