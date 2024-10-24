<?php
session_start();

require_once "../connection.php";

if($_SERVER['REQUEST_METHOD']==='POST') {
    //handle login submit
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $sql="select * from admin where username='$username' and password='$password'";
    $loginStmt=$con->prepare($sql);
    $loginStmt->execute();

    $loginAdmin=$loginStmt->fetch(PDO::FETCH_ASSOC);
    if ($loginAdmin) {
        $_SESSION['admin_login']=true;
        $_SESSION['username']=$loginUser['username'];
        // $_SESSION['adminid']=$loginUser['id'];  //stores user id in session
        header("Location:dashboard.php");
        die;
    } else {
        header("Location: admin_login.php?error=Your entered credintials do not match our records.");
        die;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <title>Admin login</title>
</head>
<body>
  <div class="container">
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger">
        <?php echo $_GET['error']; ?>
      </div>
    <?php } ?>
    <form action="" method="POST">
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input required type="username" name="username" class="form-control" id="username" aria-describedby="usernameHelp">
        </div> <br>
            
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input required type="password" name="password" class="form-control" id="password">
        </div> <br>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>
</html>