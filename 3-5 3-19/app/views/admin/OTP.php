<?php
    $metaTitle = "OTP" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/admin/login.css" rel="stylesheet">
    </head>
    

    <body>
        <div class="container">
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Donation Management System</p>
            </div>
            <div class="sub-1">
                <p>Did you forget your password ?</p>
            </div>
            <div class="sub-2">
                <p>Enter the verification code send to your email!</p>
            </div>

            <form class="login-form" action="/adminuser/update_password" method="post" id="user-login" name="login-form">
                <label class="username-lable" for="username">Verification code:</label>
                <br>
                <input id="username" class="username-input" type="text" name="OTP" autofocus placeholder="Enter the verification code sent to your email" required>
                <br>
                <?php if (isset($_SESSION['pw_error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['pw_error']); ?></p>
                <?php $_SESSION['pw_error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='Submit'>Submit</button>
                
            </form>
            <div class="image">
                <img src="../../../public/img/admindashboard/adminloginpagered.jpg" alt="">
            </div>

        </div>
          
    </body>
</html>