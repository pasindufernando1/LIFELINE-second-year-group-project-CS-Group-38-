<?php
    $metaTitle = "Login" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');

    
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/donor/before-signup.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
        <div class="title">
            <p>Blood Banks & Management System</p>
        </div>
        <div class="sub-1">
            <p>Sign Up to LIFELINE</p>
        </div>
        <div class="sub-2">
            <p>Enter the OTP code You Received below</p>
        </div>
        <?php if(isset($_SESSION['otp_error'])){
            echo '<div class="sub-3">
            <p class="otp-error">'.$_SESSION['otp_error'].'</p>';
        } ?>

        <form action="/donorsignup/verify_otp" method="post" id="user-login" name="login-form">
            <label class="username-lable" for="otp">OTP:</label>
            <br>
            <input id="otp" class="username-input" type="text" name="otp" autofocus placeholder="Enter OTP"
                required>
            <button class='login-button' type='submit' name='login'>Submit</button>

        </form>

    </div>
    <div class="img-container">
        <img class="login-img" src="../../../public/img/6262.jpg" alt="">
    </div>

</body>

</html>