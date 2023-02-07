<?php
    $metaTitle = "organizationLogin" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
       
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/hospitals/login.css" rel="stylesheet">
    </head>
    

    <body>
    
    <div class="container">
            <div id="bg"></div>
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Management System</p>
            </div>
            <div class="sub-1">
                <p>Log In to Organizations/Societies</p>
            </div>
            
            <center>
            <form class="login-form" action="/organizationuser/dashboard" method="post" id="user-login" name="login-form">
            <?php if (isset($_SESSION['error'])) {  ?>
                <p class="error-pwd"><?php echo ($_SESSION['error']); ?></p>
                <?php $_SESSION['error'] = '';
                } ?>
                
                <label class="username-lable" for="username">User Name:</label>
                <br>
                <input class="username-input" id="username"  type="text" name="username" autofocus placeholder="Enter Username" required>
                <br>
                <label class="password-lable" for="password">Password:</label>
                <br>
                <input class="password-input" id="password"  type="password" name="password" autofocus placeholder="Enter Password" required>
                <a href="/organizationuser/forgetPassword" class="forget-password">Forgot password?</a>
                <br>
                
                
                <br>
                <br>
                <br>
                <br>
                <br>
                <button class='login-button' type='submit' name='login'>Login</button>
            
                
            </form></center>
            
            <div class="signup-p">
                <p>Don’t have an account?<a href="/organization/signup/"> Sign up</p>

            </div>

        </div>
          
    </body>
</html>