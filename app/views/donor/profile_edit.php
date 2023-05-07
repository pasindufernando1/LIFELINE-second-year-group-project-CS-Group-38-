<?php
// print_r($_SESSION['donor_info']['DOB']);
// die();

$metaTitle = 'Donor Dashboard'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $metaTitle; ?>
    </title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

    <!-- CSS Files -->
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/profile_active.php'); ?>


    <div id="profile-edit-form" class="profile-container">
        <form action="/donorprofile/update_profile" method="post" id="profile_update" name="profileupdate-form"
            enctype="multipart/form-data">

            <img id="donor_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']); ?>"><br>

            <label for="fileToUpload"> <img id="change_img"
                    src="../../../public/img/donordashboard/lil_cam.png"></label>
            <?php echo '<h3>' . $_SESSION['donor_info']['Fullname'] . '</h3>'; ?>
            <input style="display:none;" type="file" name="fileToUpload" id="fileToUpload" onchange="readURL(this)">

            <script>
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

            <input id="name" class="full-l-input" type="text" name="name" autofocus value="<?php echo $_SESSION[
                'donor_info'
            ]['Fullname']; ?>" required>
            <p class="name-error" id="name-error"></p>

            <label class="nic-lable" for="nic">NIC NUMBER</label>

            <input id="nic" class="nic-input" type="text" name="nicno" autofocus value="<?php echo $_SESSION[
                'donor_info'
            ]['NIC']; ?>" required>
            <p class="nic-error" id="nic-error"></p>

            <label class="dob-lable" for="dob">DATE OF BIRTH</label>

            <input id="dob" class="dob-input" type="date" name="dob" autofocus
                value="<?php echo $_SESSION['donor_info']['DOB']; ?>" required>
            <p class="dob-error" id="dob-error"></p>

            <label class="address-lable" for="address">ADDRESS</label>
            <div class="address-div">
                <input id=" number" class="number-input" type="text" name="number" autofocus value="<?php echo $_SESSION[
                    'donor_info'
                ]['Number']; ?>" required>
                <p class="number-error" id="number-error"></p>
                <input id="lane" class="lane-input" type="text" name="lane" autofocus value="<?php echo $_SESSION[
                    'donor_info'
                ]['LaneName']; ?>" required>
                <p class="lane-error" id="lane-error"></p>
                <input id="city" class="city-input" type="text" name="city" autofocus value="<?php echo $_SESSION[
                    'donor_info'
                ]['City']; ?>" required>
                <p class=" city-error" id="city-error"></p>
            </div>
            <select id="district" class="district-input custom-select" type="text" name="district" autofocus required>
                <!-- Show placeholder -->
                <option value="<?php echo $_SESSION['donor_info'][
                    'District'
                ]; ?>" hidden><?php echo $_SESSION['donor_info'][
                     'District'
                 ]; ?></option>
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
            <select id="province" class="province-input custom-select" type="text" name="province" value="" required>
                <!-- Show placeholder -->
                <option value="<?php echo $_SESSION['donor_info'][
                    'Province'
                ]; ?> " hidden><?php echo $_SESSION['donor_info'][
                      'Province'
                  ]; ?> </option>
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
            <label class="tel-lable" for="tel">Telephone</label>

            <input id="tel" class="tel-input" type="text" name="tel" autofocus value="<?php echo $_SESSION[
                'donor_contact'
            ]['ContactNumber']; ?>" required>
            <p class="tel-error" id="tel-error"></p>

            <label class="uname-lable" for="uname">USERNAME</label>

            <input id="uname" class="uname-input" type="text" name="uname" autofocus value="<?php echo $_SESSION[
                'username'
            ]; ?>" required>
            <p class="uname-error" id="uname-error"></p>

            <label class="password-lable" for="password">PASSWORD</label>

            <input id="password" class="password-input" type="password" name="password" autofocus
                placeholder="New Password">
            <p class="password-error" id="password-error"></p>

            <label class="passwordcheck-lable" for="password-check">RE-ENTER PASSWORD</label>
            <input id="passwordcheck" class="password-check-input" type="password" name="password-check" autofocus
                placeholder="Confirm New Password">
            <p class="passwordcheck-error" id="passwordcheck-error"></p>
            <div class="buttons">
                <button id="submit" class="submit" type="submit" name='update'>Save Changes<img src="../../../public/img/donordashboard/saved.png"></button>
                <button href="/donorprofile" class="cancel">Cancel Editing<img class="cbtn" src="../../../public/img/donordashboard/delete-btn.png"></button>
            </div>
        </form>
    </div>
    <script src="../../../public/js/validation/donorupdatevalidation.js"></script>
</body>

</html>