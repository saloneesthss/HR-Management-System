<?php
session_start();

require_once "connection.php";

if($_SERVER['REQUEST_METHOD']==='POST' ) {
    //handle login submit
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql = "SELECT * FROM employees WHERE Email='$username' AND Password='$password'";
    $loginStmt = $con->prepare($sql);
    $loginStmt->execute();

    $loginUser=$loginStmt->fetch(PDO::FETCH_ASSOC);
    if ($loginUser) {
        if (isset($_POST['rememberme'])) {
            setcookie('rememberme',$loginUser['EmployeeID'],time()+3600*24,'/');
        }
            
        $_SESSION['employee_login']=true;
        $_SESSION['username']=$loginUser['Email'];
        $_SESSION['employeeid']=$loginUser['EmployeeID'];  //stores employee id in session
        header("Location: employee/dashboard.php?id=" . $_SESSION['employeeid']);
        die;
    } else {
        header("Location:login.php?error=Your entered credintials do not match our records.");
        die;
    }
}

if (isset($_COOKIE['rememberme'])) {
    header("Location:employee/dashboard.php");
    die;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>HR Management System</title>
    <link rel="stylesheet" href="login1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="font-family:Arial;	background-size:cover;	overflow:hidden;">
    <div class="container" style="justify-content:center">
        <h1 style="padding: 40px; margin:10px; margin-bottom: 30px; text-align: center; 
            background:#05223d; color: white; font-size: 40px; overflow:hidden;">
            HR Management System
        </h1>
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <form action="" method="POST" style="display:flex; flex-direction:column; justify-content:center">
            <div id="div_login">
                <h1 style="text-align:center;">Employee Login</h1>
            <div>
              <input required type="email" placeholder="Email" name="username" class="textbox" style="margin-left:10px;">
            </div> 
            
            <div>
              <input required type="password" placeholder="Password" name="password" class="textbox" style="margin-left:10px;">
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme" style="margin-left:10px;">
              <label class="form-check-label" for="rememberme">Remember Me</label>
            </div> 

            <input type="submit" value="Submit" name="submit" id="submit" style="padding:12px 20px;margin-left:8px;">
            <a href="./admin/admin_login.php" 
            style="background-color: #05223d; color: white; padding: 12px 20px; 
            border: none; border-radius: 4px; display:inline-block; margin-top:5px;">
                Click here for Admin Login
            </a>

            </div>
        </form>
    </div>
</body>
</html>