<?php
    $metaTitle = "Reset Password" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');

    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/hospitals/newpassword.css" rel="stylesheet">
    </head>
    

    <body>
        <div class="container">
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Management System</p>
            </div>
            <div class="sub-1">
                <p>Reset Password</p>
            </div>
            <div class="sub-2">
                <p>Provide the new password</p>
            </div>

            <form class="login-form" action="/hospitaluser/password_set" method="post" id="user-login" name="login-form">
                <label class="username-lable" for="username">New Password:</label>
                <br>
                <input id="username" class="username-input" type="password" name="new_pwd" autofocus placeholder="New Password"  minlength="8" required>
                <br>

                <label class="password-lable" for="password">Confirm Password:</label>
                <br>
                <input id="password" class="password-input" type="password" name="con_pwd" autofocus placeholder="New Password" required>
                
                <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <button class='login-button' type='submit' name='Submit'>Submit</button>
                
            </form>

        </div>
          
    </body>
</html>