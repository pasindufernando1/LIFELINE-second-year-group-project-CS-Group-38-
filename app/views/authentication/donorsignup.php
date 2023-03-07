<?php
$metaTitle = 'DonorSignUp';
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/views/layout/header.php';
require_once __ROOT__ . '/views/layout/navigation.php';
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/donor/login.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</head>


<body>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <div class="signup-container">
        <img class="signup-logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
        <div class="title">
            <p>Blood Banks & Management System</p>
        </div>
        <div class="reg-sub-1">
            <p>Donor Sign-Up</p>
        </div>
        <div class="reg-sub-2">
            <p>Enter your information below</p>
        </div>
        <form class="donorsignup-form" action="/donorsignup/send_signup" method="post" id="donor-form"
            name="donorsignup-form" enctype="multipart/form-data">

            <div class="input-img" onmouseover="imgreplace()" onmouseout="back()">
                <label for="fileToUpload"> <img id="upload_img"
                        src="../../../public/img/user_pics/add_profile_pic.png"></label>
                <input style="display:none;" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)">
            </div>

            <script>
            function imgreplace() {
                document.getElementById("upload_img").src = "../../../public/img/user_pics/add_profile_pic_1.png";
            }

            function back() {
                document.getElementById("upload_img").src = "../../../public/img/user_pics/add_profile_pic.png";
            }

            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("donor_img").src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            </script>

            <label class="name-lable" for="name">NAME</label>
            <br>
            <input id="fname" class="fname-input" type="text" name="fname" autofocus placeholder="First Name" required>
            <p class="fname-error" id="fname-error"></p>
            <input id="lname" class="lname-input" type="text" name="lname" autofocus placeholder="Last Name" required>
            <p class="lname-error" id="lname-error"></p>
            <br>
            <label class="nic-lable" for="nic">NIC NUMBER</label>
            <br>
            <input id="nic" class="nic-input" type="text" name="nicno" autofocus placeholder="NIC number" required>
            <p class="nic-error" id="nic-error"></p>
            <br>
            <label class="btype-lable" for="btype">BLOOD TYPE</label>
            <br>
            <select id="btype" class="btype-input custom-select" type="text" name="btype" autofocus
                placeholder="Blood Type" required>
                <!-- Show placeholder -->
                <option value="">Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
            </select>
            <p class="btype-error" id="btype-error"></p>
            <br>
            <label class="dob-lable" for="dob">DATE OF BIRTH</label>
            <br>
            <input id="dob" class="dob-input" type="date" name="dob" autofocus placeholder="Date of Birthr" required>
            <p class="dob-error" id="dob-error"></p>
            <br>
            <label class="gender-lable" for="btype">GENDER</label>
            <br>
            <select id="gender" class="gender-input custom-select" type="text" name="gender" autofocus
                placeholder="Gender" required>
                <!-- Show placeholder -->
                <option value="">Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <p class="gender-error" id="gender-error"></p>
            <br>
            <label class="address-lable" for="address">ADDRESS</label>
            <br>
            <input id="number" class="number-input" type="text" name="number" autofocus placeholder="Number" required>
            <p class="number-error" id="number-error"></p>
            <input id="lane" class="lane-input" type="text" name="lane" autofocus placeholder="Lane" required>
            <p class="lane-error" id="lane-error"></p>
            <input id="city" class="city-input" type="text" name="city" autofocus placeholder="City" required>
            <p class="city-error" id="city-error"></p>
            <select id="district" class="district-input custom-select" type="text" name="district" autofocus required>
                <!-- Show placeholder -->
                <option value="">District</option>
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
            <p class="district-error" id="district-error"></p>
            <select id="province" class="province-input custom-select" type="text" name="province" required>
                <!-- Show placeholder -->
                <option value="">Province</option>
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
            <p class="province-error" id="province-error"></p>
            <br>
            <label class="tel-lable" for="tel">Telephone</label>
            <br>
            <input id="tel" class="tel-input" type="text" name="tel" autofocus placeholder="Telephone number" required>
            <p class="tel-error" id="tel-error"></p>
            <br>
            <label class="uname-lable" for="uname">USERNAME</label>
            <br>
            <input id="uname" class="uname-input" type="text" name="uname" autofocus placeholder="Username" required>
            <p class="uname-error" id="uname-error"></p>
            <br>
            <label class="password-lable" for="password">PASSWORD</label>
            <br>
            <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password"
                required>
            <p class="password-error" id="password-error"></p>
            <br>
            <label class="passwordcheck-lable" for="password-check">RE-ENTER PASSWORD</label>
            <br>
            <input id="passwordcheck" class="password-check-input" type="password" name="password-check" autofocus
                placeholder="Password" required>
            <p class="passwordcheck-error" id="passwordcheck-error"></p>
            <br>
            <table class="reg-table" width="100%">
                <col style="width:70%">
                <col style="width:15%">
                <col style="width:15%">
                <tr>
                    <td colspan="3" style="text-align: center;">Please select the appropriate option to following
                        options</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="options">Yes</td>
                    <td class="options">No</td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever been refused as a blood donor, or told not to donate blood?
                    </td>
                    <td class="options">
                        <fieldset><input type="radio" name="g1" value="on" required>
                    </td>
                    <td class="options"><input type="radio" name="g1" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you or close relatives had an unexplained neurological condition or
                        been diagnosed with Creutzfeldt-Jacob Disease or ‘mad cow disease’?</td>
                    <td class="options">
                        <fieldset><input type="radio" name="g2" value="on" required>
                    </td>
                    <td class="options"><input type="radio" name="g2" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever had injections of human pituitary growth hormone, pituitary
                        gonadotrophin (fertility medicine) or seen a neurosurgeon or neurologist?</td>
                    <td class="options">
                        <fieldset><input type="radio" name="g3" value="on" required>
                    </td>
                    <td class="options"><input type="radio" name="g3" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever had yellow jaundice (excluding jaundice at birth), hepatitis
                        or liver disease or a positive test for hepatitis?</td>
                    <td class="options">
                        <fieldset><input type="radio" name="g4" value="on" required>
                    </td>
                    <td class="options"><input type="radio" name="g4" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                <tr>
                    <td class="reg-question">Have you ever injected yourself or been injected with illegal or
                        non-prescribed drugs including body-building drugs or cosmetics (even if this was only once or a
                        long time ago)?</td>
                    <td class="options">
                        <fieldset><input type="radio" name="g5" value="on" required>
                    </td>
                    <td class="options"><input type="radio" name="g5" value="off"></fieldset>
                    </td>
                </tr>
            </table>

            <button id="signup-button" class='signup-button' type='submit' name='signup'>SUBMIT</button>

            <div class="signup-p">
                <p>Already have an account? <a href="/donor/login">Login</a></p>
            </div>

        </form>
        <script src="../../../public/js/validation/donoruservalidation.js"></script>

    </div>
    </div>
    <br>

</body>


</html>