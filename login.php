<?php
session_start();

require_once "connection.php";

if($_SERVER['REQUEST_METHOD']==='POST' ) {
    //handle login submit
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $position=$_POST['position'];
    
    if($position === 'employee') {
        $sql="select * from employees where Email='$email' and Password='$password'";
        $loginStmt=$con->prepare($sql);
        $loginStmt->execute();

        $loginUser=$loginStmt->fetch(PDO::FETCH_ASSOC);
        if ($loginUser) {
            if(isset($_POST['rememberme'])) {
                setcookie('rememberme',1,time()+3600*24);
            }
            
            $_SESSION['employee_login']=true;
            $_SESSION['email']=$loginUser['email'];
            $_SESSION['employeeid']=$loginUser['id'];  //stores employee id in session
            header("Location:employee/dashboard.php");
            die;
        } else {
            header("Location:login.php?error=Your entered credintials do not match our records.");
            die;
        }
    } 
    elseif($position === 'manager') {
        $sql="select * from manager where Email='$email' and Password='$password'";
        $loginStmt=$con->prepare($sql);
        $loginStmt->execute();

        $loginUser=$loginStmt->fetch(PDO::FETCH_ASSOC);
        if ($loginUser) {
            if(isset($_POST['rememberme'])) {
                setcookie('rememberme',1,time()+3600*24);
            }

            $_SESSION['manager_login']=true;
            $_SESSION['email']=$loginUser['email'];
            $_SESSION['managerid']=$loginUser['id'];  //stores manager id in session
            header("Location:manager/dashboard.php");
            die;
        } else {
            header("Location:login.php?error=Your entered credintials do not match our records.");
            die;
        }
    } 
    else {
        header("Location:login.php?error=Please enter your position first.");
        die;
    }
}

if (isset($_SESSION['rememberme']) && !empty($_SESSION['rememberme'])) {
    if($position === 'employee') {
        header("Location:employee/dashboard.php");
        die;
    } else {
        header("Location:manager/dashboard.php");
    }
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
				<h1>Employees Login</h1>
				
				<div>
					<input type="email" class="textbox" id="email" name="email" placeholder="Email" />
				</div>
				<div>
					<input type="password" class="textbox" id="password" name="password" placeholder="Password"/>
				</div>
                <div>
                <select name="position" class="textbox" >
                    <option value="">Select Position</option>
                    <option value="employee">Employee</option>
                    <option value="manager">Manager</option>
                </select>
                </div>
                <div>
                    <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
                    <label class="form-check-label" for="rememberme">Remember Me</label>
                </div>
				<div>
					<input type="submit" value="Submit" name="submit" id="submit" />
					<input type="submit" value="Click here for Admin Login" name="psubmit" href="./admin/admin_login.php" id="submit"/>
				</div>
            </form>
    </div>
</body>
</html>