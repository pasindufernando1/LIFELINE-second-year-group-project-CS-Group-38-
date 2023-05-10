<?php
    $metaTitle = "DonorSignUp" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/views/layout/header.php');
    require_once(__ROOT__.'/views/layout/navigation.php');    
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/login.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    </head>
    

    <body>
        <div class="signup-container">
            <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
            <div class="title">
                <p>Blood Banks & Management System</p>
            </div>
            <div class="sub-1">
                <p>Donor Sign-Up</p>
            </div>
            <div class="sub-2">
                <p>Enter your username and password below</p>
            </div>
            <form class="donorsignup-form" action="/donoruser/dashboard" method="post" id="user-login" name="donorsignup-form">
                <label class="name-lable" for="name">NAME</label>
                <br>
                <input id="fname" class="fname-input" type="text" name="fname" autofocus placeholder="First Name" required>
                <input id="lname" class="lname-input" type="text" name="lname" autofocus placeholder="Last Name" required>
                <br>
                <label class="nic-lable" for="nic">NIC NUMBER</label>
                <br>
                <input id="nic" class="nic-input" type="text" name="nicno" autofocus placeholder="NIC number" required>
                <br>
                <label class="btype-lable" for="btype">BLOOD TYPE</label>
                <br>
                <input id="btype" class="btype-input" type="text" name="btype" autofocus placeholder="Blood Type" required>
                <br>
                <label class="dob-lable" for="dob">DATE OF BIRTH</label>
                <br>
                <input id="dob" class="dob-input" type="text" name="dob" autofocus placeholder="Date of Birthr" required>
                <br>
                <label class="gender-lable" for="btype">GENDER</label>
                <br>
                <input id="gender" class="gender-input" type="text" name="gender" autofocus placeholder="Gender" required>
                <br>
                <label class="address-lable" for="address">ADDRESS</label>
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

                <button class='signup-button' type='submit' name='signup'>SUBMIT</button>
                
                <div class="signup-p">
                    <p>Already have an account? <a href="#">Login</a></p>

                </div>
                
            </form>

        </div>
          
    </body>
</html>
