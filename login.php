<?php
require_once('configs/connection.php');
require_once('configs/functions.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']!=''){
    header('location:index.php');
    die();
}
if(isset($_POST['submit'])){
    $email=get_safe_value($con,$_POST['email']);
    $password=get_safe_value($con,$_POST['pass']);
    $res=mysqli_query($con,"SELECT * FROM `users` WHERE `users`.`email`='$email' and `users`.`pass`='$password'");
    $check_user=mysqli_num_rows($res);
    if($check_user>0){
        $row=mysqli_fetch_assoc($res);
        $_SESSION['USER_LOGIN']='yes';
        $_SESSION['USER_ID']=$row['id'];
        $_SESSION['NAME']=$row['name'];
        $_SESSION['EMAIL']=$row['email'];
        $_SESSION['USER_ADDRESS']=$row['address'];
        echo"<script>window.location.href='index.php'</script>";
    }else{
        echo"no";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" />
    <!--Stylesheet-->
    <style media="screen">
    *,
    *:before,
    *:after {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    .background {
        width: 430px;
        height: 520px;
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }

    .background .shape {
        height: 200px;
        width: 200px;
        position: absolute;
        border-radius: 50%;
    }

    form {
        height: 520px;
        width: 400px;
        background-color: rgba(255, 255, 255, 0.13);
        position: absolute;
        transform: translate(-50%, -50%);
        top: 50%;
        left: 50%;
        border-radius: 10px;
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
        padding: 50px 35px;
    }

    form * {
        font-family: "Poppins", sans-serif;
        color: #ffffff;
        letter-spacing: 0.5px;
        outline: none;
        border: none;
    }

    form h3 {
        font-size: 32px;
        font-weight: 500;
        line-height: 42px;
        text-align: center;
    }

    label {
        display: block;
        margin-top: 30px;
        font-size: 16px;
        font-weight: 500;
    }

    input {
        display: block;
        height: 50px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        padding: 0 10px;
        margin-top: 8px;
        font-size: 14px;
        font-weight: 300;
    }

    ::placeholder {
        color: #e5e5e5;
    }

    button {
        margin-top: 50px;
        width: 100%;
        background-color: #ffffff;
        color: #080710;
        padding: 15px 0;
        font-size: 18px;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
    }

    .social {
        margin-top: 30px;
        display: flex;
    }

    .social div {
        background: red;
        width: 150px;
        border-radius: 3px;
        padding: 5px 10px 10px 5px;
        background-color: rgba(255, 255, 255, 0.27);
        color: #eaf0fb;
        text-align: center;
    }

    .social div:hover {
        background-color: rgba(255, 255, 255, 0.47);
    }

    .social .fb {
        margin-left: 25px;
    }

    .social i {
        margin-right: 4px;
    }

    .signup {
        margin-top: 20px;
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" name="email" placeholder="Email" id="username" />

        <label for="password">Password</label>
        <input type="password" name="pass" placeholder="Password" id="password" />

        <button type="submit" name="submit" value="submit">Log In</button>

        <div class="signup">
            Don't have an account? <a href="register.php">Sign Up</a>
        </div>
        <!-- <div class="social">
        <div class="go"><i class="fab fa-google"></i> Google</div>
        <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
      </div> -->
    </form>
</body>

</html>