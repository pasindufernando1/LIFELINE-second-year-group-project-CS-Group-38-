<?php
$metaTitle = "Login";
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/views/layout/header.php');
require_once(__ROOT__ . '/views/layout/navigation.php');


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
            <p>Enter your Email below</p>
        </div>
        <?php if (isset($_SESSION['email_error'])) {
            echo '<div class="sub-3">
            <p class="otp-error">' . $_SESSION['email_error'] . '</p>';
        } ?>

        <form class="donor-form" action="/signup/get_otp" method="post" id="email-form" name="login-form">
            <label class="username-lable" for="email">Email</label>
            <br>
            <input id="email" class="username-input" type="email" name="email" autofocus placeholder="Enter Email"
                required>
            <p id="email-error" class="email-error"></p>
            <button id="email-submit" class='login-button' type='submit' >Get OTP</button>

        </form>

    </div>
    <div class="img-container">
        <img class="login-img" src="../../../public/img/6262.jpg" alt="">
    </div>
    <script src="../../../public/js/validation/donoruservalidation.js"></script>

</body>

</html>