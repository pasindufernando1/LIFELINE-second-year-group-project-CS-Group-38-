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
            <form class="donorsignup-form" action="/donorsignup/send_signup" method="post" id="donor-signup" name="donorsignup-form">
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
                <select id="btype" class="btype-input custom-select" type="text" name="btype" autofocus placeholder="Blood Type" required>
                    <!-- Show placeholder -->
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <br>
                <label class="dob-lable" for="dob">DATE OF BIRTH</label>
                <br>
                <input id="dob" class="dob-input" type="date" name="dob" autofocus placeholder="Date of Birthr" required>
                <br>
                <label class="gender-lable" for="btype">GENDER</label>
                <br>
                <select id="gender" class="gender-input custom-select" type="text" name="gender" autofocus placeholder="Gender" required>
                    <!-- Show placeholder -->
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <br>
                <label class="address-lable" for="address">ADDRESS</label>
                <br>
                <input id="number" class="number-input" type="text" name="number" autofocus placeholder="Number" required>
                <input id="lane" class="lane-input" type="text" name="lane" autofocus placeholder="Lane" required>
                <input id="city" class="city-input" type="text" name="city" autofocus placeholder="City" required>
                <select id="district" class="district-input custom-select" type="text" name="district" autofocus placeholder="District" required>
                                        <!-- Show placeholder -->
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
                <select id="province" class="province-input custom-select" type="text" name="province" autofocus placeholder="District" required>
                                        <!-- Show placeholder -->
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
                <table class="reg-table" width="1420px" style="margin-left: auto;margin-right: auto;"  >
                        <col style="width:70%">
                        <col style="width:15%">
                        <col style="width:15%">
                        <tr><td colspan="3" style="text-align: center;">Please select the appropriate option to following options</td></tr>
                        <tr><td></td><td>Yes</td><td>No</td></tr>
                        <tr>
                            <td class = "reg-question" >Have you already given blood in the last 8 weeks?</td>
                            <td><fieldset><input type="radio" name="g1" value="on" required></td>
                            <td><input type="radio" name="g1" value="off"></fieldset></td></tr>
                        <tr>
                            <td class = "reg-question" >Are you pregnant or breastfeeding?</td>
                            <td><fieldset><input type="radio" name="g2" value="on" required></td>
                            <td><input type="radio" name="g2" value="off"></fieldset></td></tr>
                        <tr>
                            <td class = "reg-question" >Have you ever had injections of human pituitary growth hormone, pituitary gonadotrophin (fertility medicine) or seen a neurosurgeon or neurologist?</td>
                            <td><fieldset><input type="radio" name="g3" value="on" required></td>
                            <td><input type="radio" name="g3" value="off"></fieldset></td></tr>
                        </table>

                <button class='signup-button' type='submit' name='signup'>SUBMIT</button>
                
                <div class="signup-p">
                    <p>Already have an account? <a href="#">Login</a></p>

                </div>
                
            </form>

        </div>
          
    </body>
</html>
