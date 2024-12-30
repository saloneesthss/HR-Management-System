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
<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HR Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background:linear-gradient(135deg, #e0f7ff, #003d73);">
    <div class="container" style="justify-content:center">
        <h2 style="padding-left:200px; padding-top:170px;">Login</h2>
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <form action="" method="POST" style="padding-bottom:170px; padding-left:200px; padding-right: 200px;">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input required type="text" placeholder="Username" name="username" class="form-control" id="username">
            </div> <br>
            
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input required type="password" placeholder="Password" name="password" class="form-control" id="password">
            </div> <br>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
              <label class="form-check-label" for="rememberme">Remember Me</label>
            </div> <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HR Management System</title>
    <link rel="stylesheet" href="../login1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <div class="header">
            <p>HR Management System</p>
        </div>
        <form action="" method="POST">
            <div id="div_login">
				<h1>Admin Login</h1>
				
				<div>
					<input type="email" class="textbox" id="email" name="email" placeholder="Email" />
				</div>
				<div>
					<input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
				</div>
				<div>
					<input type="submit" value="Submit" name="submit" id="submit" />
				</div>
            </form>
    </div>
</body>
</html>