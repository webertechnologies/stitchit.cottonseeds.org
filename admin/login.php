<?php
// display errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("connection.php");
require("functions.php");
$msg="";
$user = "to";
if(isset($_POST["submit"])){
  $username= get_safe_value($con, $_POST["username"]);
  $password= get_safe_value($con, $_POST["password"]);
    $sql= "select * from `idadmin-users` where username = '$username' and password = '$password'";  
    $result = $con->query($sql);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    if($count > 0){
        $_SESSION['ADMIN_LOGIN']='yes';
        $_SESSION['USER_TYPE']='admin';
        $_SESSION['ADMIN_USERNAME']=$username;
        $_SESSION['ADMIN_ID']=$row['id'];
        // header('location:dashboard.php');
        echo "<script>window.location.href='index.php'</script>";
    }
    else{
        // also check `tailors` table for tailors login 
        $sql= "select * from `tailors` where username = '$username' and password = '$password'";
        $result = $con->query($sql);
        $count=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        if($count > 0){
            $_SESSION['TAILOR_LOGIN']='yes';
            $_SESSION['USER_TYPE']='tailor';
            $_SESSION['TAILOR_USERNAME']=$username;
            $_SESSION['TAILOR_ID']=$row['id'];
            // header('location:dashboard.php');
            echo "<script>window.location.href='index.php'</script>";
        }
        else{
            $msg="May be you are not regitered, or check details";
        }
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/log-style.css">
</head>

<body>
    <div class="wrapper">
        <div class="title">
            Admin Login</div>
        <form method="POST" action="login">
            <div class="field">
                <input name="username" type="text" required>
                <label>User Name</label>
            </div>
            <div class="field">
                <input name="password" type="password" required>
                <label>Password</label>
            </div>

            <!-- <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
<div class="pass-link">
<a href="#">Forgot password?</a></div>
</div> -->
            <div class="field_error">
                <?php
echo "<p>";
echo $msg;
echo "</p>";
?></div>
            <div class="field">
                <input type="submit" name="submit" value="Login">
            </div>
            <!-- <div class="signup-link">
Not a member? <a href="#">Signup now</a></div> -->

        </form>


    </div>
</body>

</html>