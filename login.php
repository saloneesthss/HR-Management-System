<?php
session_start();

require_once "connection.php";

if($_SERVER['REQUEST_METHOD']==='POST') {
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        <form action="" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input required type="email" placeholder="Email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div> <br>
            
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input required type="password" placeholder="Password" name="password" class="form-control" id="password">
            </div> <br>

            <div class="form-group">
                <label for="position">Position:</label>
                <select name="position" id="position" class="form-control">
                    <option value="">Select Position</option>
                    <option value="employee">Employee</option>
                    <option value="manager">Manager</option>
                </select>
            </div>

            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="rememberme" name="rememberme">
              <label class="form-check-label" for="rememberme">Remember Me</label>
            </div> <br>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>