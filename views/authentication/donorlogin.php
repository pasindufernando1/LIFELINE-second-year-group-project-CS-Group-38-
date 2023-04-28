<?php
    $metaTitle = "DonorLogin" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    // require_once(__ROOT__.'/views/layout/header.php');
    // require_once(__ROOT__.'/views/layout/navigation.php');    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/donor/login.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>
    

    <body class="body">
        
        
        <div class="container">
            <img class="login-logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="sub-1">
                <p>Log In to LIFELINE</p>
            </div>
            <br>
            <div class="sub-2">
                <p>Enter your username and password below</p>
            </div>
            <br><br>

            <form class="login-form" action="/donoruser/dashboard" method="post" id="user-login" name="login-form" >
                <label class="login-username-lable" for="username">User Name:</label>
                <br>
                <input id="username" class="login-username-input" type="text" name="username" autofocus placeholder="Enter Username" required>
                <br><br>
                <label class="login-password-lable" for="password">Password:</label>
                <br>
                <input id="password" class="login-password-input" type="password" name="password" autofocus placeholder="Enter Password" required>
                <p class="forget-password"><a href="/donoruser/forgetPassword/">Forgot password?</a></p>
                <br>
                <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='login'>Login</button>
                <br/>
                <br/>
                <br/>
                <br/>
                <p class="not-reg">Not Registered?<a href="/donorsignup/signup/">SignUp</a></p>
                
            </form>

        </div>
        <div class = "img-container">
            <div class="login-title">
                <p>Blood Banks & Management System</p>
        </div>
        <img src= "../../../public/img/donorlogin.jpg" class="login-img">
        </div>
          
    </body>
</html>
