<?php
    $metaTitle = "AdminLogin" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/login.css" rel="stylesheet">
    </head>
    

    <body>
        <div class="container">
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Management System</p>
            </div>
            <div class="sub-1">
                <p>Log In to LIFELINE</p>
            </div>
            <div class="sub-2">
                <p>Enter your username and password below</p>
            </div>

            <form class="login-form" action="/adminuser/dashboard" method="post" id="user-login" name="login-form">
                <label class="username-lable" for="username">User Name:</label>
                <br>
                <input id="username" class="username-input" type="text" name="username" autofocus placeholder="Enter Username" required>
                <br>
                <label class="password-lable" for="password">Password:</label>
                <br>
                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Enter Password" required>
                <p class="forget-password">Forgot password?</p>
                <br>
                <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='login'>Login</button>
                
            </form>

        </div>
          
    </body>
</html>