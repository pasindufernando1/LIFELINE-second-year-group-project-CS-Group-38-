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
            <form class="orgsignup-form" action="/organizationuser/processSignup/" method="post" id="addform" name="orgsignup-form">
                <label class="username-lable" for="name">ORGANIZATION / SOCIETY NAME</label>
                <br>
                <input id="username" class="username-input" type="text" name="name" autofocus placeholder="Organization / Society Name" required>
                <br>
                <label id="regnum-label" class="reg-lable" for="regno">REGISTRATION NUMBER</label>
                <br>
                <input id="regnum" class="reg-input" type="text" name="regno" autofocus placeholder="Registration number" required>
                <br>
                <label class="address-lable" for="address">POSTAL ADDRESS</label>
                <br>
                <input id="number" class="number-input" type="text" name="number" autofocus placeholder="First line" required>
                <input id="lane" class="lane-input" type="text" name="lane" autofocus placeholder="Lane" required>
                <input id="city" class="city-input" type="text" name="city" autofocus placeholder="City" required>
                <!-- <input id="district" class="district-input" type="text" name="district" autofocus placeholder="District" required> -->
                <select id="district" class="district-input custom-select" type="text" name="district" autofocus placeholder="District"required>
                                        <!-- Show placeholder -->
                                        <option value="" disabled selected hidden>District</option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                        <option value="Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mullaitivu">Mullaitivu</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavuniya">Vavuniya</option>
                                </select>
                <!-- <input id="province" class="province-input" type="text" name="province" autofocus placeholder="Province" required> -->
                <select id="province" class="province-input custom-select" type="text" name="province" autofocus placeholder="Province" required>
                                        <!-- Show placeholder -->
                                        <option value="" disabled selected hidden>Province</option>
                                        <option value="Central">Central</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="North Central">North Central</option>
                                        <option value="Northern">Northern</option>
                                        <option value="North Western">North Western</option>
                                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                                        <option value="Southern">Southern</option>
                                        <option value="Uva">Uva</option>
                                        <option value="Western">Western</option>
                </select>
                <br>
                <label id="email-label" class="email-lable" for="email">EMAIL</label>
                <br>
                <input id="email" class="email-input" type="email" name="email" autofocus placeholder="Email" required>
                <br>
                <label id="contact-label" class="tel-lable" for="tel">Telephone</label>
                <br>
                <input id="contact" class="tel-input" type="text" name="tel" autofocus placeholder="Telephone number" required>
                <br>
                <label class="uname-lable" for="uname">USERNAME</label>
                <br>
                <input id="uname" class="uname-input" type="text" name="uname" autofocus placeholder="Username" required>
                <br>
                <label id="password-label" class="password-lable" for="password">PASSWORD</label>
                <br>
                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password" required>
                <br>
                <label id="confirmPassword-label" class="confirmPassword-lable" for="confirmPassword">CONFIRM PASSWORD</label>
                <br>
                <input id="confirmPassword" class="confirmPassword-input" type="password" name="confirmPassword" autofocus placeholder="Confirm Password" required>
                <br>
                <button id="submit-btn" class='login-button' type='submit' name='signup'>SUBMIT</button>
                <div class="signup-p">
                    <p>Already have an account? <a href="/organization/login/">Login</a></p>

                </div>
                
                
            </form>

            
        </div>
        <script src="../../../public/js/validation/uservalidation.js"></script> 
    </body>
</html>
