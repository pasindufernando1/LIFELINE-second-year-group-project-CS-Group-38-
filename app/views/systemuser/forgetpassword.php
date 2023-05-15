<?php
    $metaTitle = "Reset Password" ;
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
                <p>Did you forget your password?</p>
            </div>
            <div class="sub-2">
                <p>Enter your email to reset it!</p>
            </div>

            <form class="login-form" action="/forgetpassword/reset" method="post" id="user-login" name="login-form">
                <label class="username-lable" for="username">EMAIL:</label>
                <br>
                <input id="username" class="username-input" type="text" name="username" autofocus placeholder="Enter Email" required>
                <br>
                
                <a href="/login" class="forget-password">LOGIN</a>
                <br>
                <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='Reset'>Reset</button>
                
            </form>
            <div class="signup-p">
                 <p>Don’t have an account? <a href="/signup">Sign up</a></p>

            </div>

        </div>
          
    </body>
</html>