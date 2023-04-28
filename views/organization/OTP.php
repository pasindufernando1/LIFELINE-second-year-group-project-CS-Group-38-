<?php
    $metaTitle = "Reset Password" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');

    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/hospitals/OTP.css" rel="stylesheet">
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
                <p>Enter the verification code provided to your email</p>
            </div>

            <form class="login-form" action="/organizationuser/update_password" method="post" id="user-login" name="login-form">
                <label class="username-lable" for="username">Verification Code:</label>
                <br>
                <input id="username" class="username-input" type="text" name="OTP" autofocus placeholder="Enter Verification Code" maxlength="6" minlength="6" required>
                <br>
                
                <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='Submit'>Submit</button>
                
            </form>

        </div>
          
    </body>
</html>