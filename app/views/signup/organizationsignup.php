<?php
    $metaTitle = "OragnizationSignUp" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/orgsignup.css" rel="stylesheet">
    </head>
    

    <body>
        <div class="container">
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Donation Management System</p>
            </div>
            <div class="sub-1">
                <p>Organizations/Societies Sign-Up</p>
            </div>
            <div class="sub-2">
                <p>Please complete this form</p>
            </div>
            <form class="orgsignup-form" action="/adminuser/dashboard" method="post" id="user-login" name="orgsignup-form">
                <label class="username-lable" for="name">ORGANIZATION / SOCIETY NAME</label>
                <br>
                <input id="username" class="username-input" type="text" name="name" autofocus placeholder="Organization / Society Name" required>
                <br>
                <label class="reg-lable" for="regno">REGISTRATION NUMBER</label>
                <br>
                <input id="reg" class="reg-input" type="text" name="regno" autofocus placeholder="Registration number" required>
                <br>
                <label class="address-lable" for="address">POSTAL ADDRESS</label>
                <br>
                <input id="number" class="number-input" type="text" name="number" autofocus placeholder="Number" required>
                <input id="lane" class="lane-input" type="text" name="lane" autofocus placeholder="Lane" required>
                <input id="city" class="city-input" type="text" name="city" autofocus placeholder="City" required>
                <input id="district" class="district-input" type="text" name="district" autofocus placeholder="District" required>
                <input id="province" class="province-input" type="text" name="province" autofocus placeholder="Province" required>
                <br>
                <label class="email-lable" for="email">EMAIL</label>
                <br>
                <input id="email" class="email-input" type="email" name="email" autofocus placeholder="Email" required>
                <br>
                <label class="tel-lable" for="tel">Telephone</label>
                <br>
                <input id="tel" class="tel-input" type="text" name="tel" autofocus placeholder="Telephone number" required>
                <br>
                <label class="uname-lable" for="uname">USERNAME</label>
                <br>
                <input id="uname" class="uname-input" type="text" name="uname" autofocus placeholder="Username" required>
                <br>
                <label class="password-lable" for="password">PASSWORD</label>
                <br>
                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password" required>
                <br>

                <button class='login-button' type='submit' name='login'>SUBMIT</button>
                
                <div class="signup-p">
                    <p>Already have an account? <a href="#">Login</a></p>

                </div>
                
            </form>

            
        </div>
          
    </body>
</html>
