<?php 
$metaTitle = "Add Donor" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

     <!-- CSS Files -->
    <link href="../../../public/css/admin/donors.css" rel="stylesheet">
    <link href="../../../public/css/admin/add.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/donors_active_sidebar.php'); ?>
    
    <!-- main content -->
    <div class="box-new">
        <p class="add-user-title">Add Donor</p>
        <form action="/donors/addDonor" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label class="quantity-lable" for="name" id="fullname-label">Full name</label>
                <br>
                <input id="fullname" class="quantity-input" type="text" name="name" autofocus placeholder="Full name" required>
            </div>
            <div class="nic-container">
                <label id="nic-label" class="nic-lable" for="nic">NIC no</label>
                <br>
                <input id="nic" class="nic-input" type="text" name="nic" autofocus placeholder="NIC no" required>
            </div>
            <div class="gender-container">
                <label id="gender-label" class="gender-lable" for="gender">Gender</label>
                <br>
                <select id="gender" class="gender-input" type="text" name="gender" autofocus placeholder="Gender" required>
                <option value="" disabled selected hidden>Select Gender</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                </select>
            </div>

            <div class="dob-container">
                <label id="dob-label" class="dob-lable" for="dob">DOB</label>
                <br>
                <input id="dob" class="dob-input" type="date" name="dob" autofocus placeholder="Date of birth" required>
            </div>
            <div class="bloodtypes-container">
                <label class="bloodtype-lable" for="bloodtype">Blood Type</label>
                <br>
                <select id="bloodtype" class="bloodtype-input" type="text" name="bloodtype" autofocus placeholder="Blood Type" required>
                    <!-- Placeholder -->
                    <option value="" disabled selected hidden>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="location-container">
                <label class="location-lable" for="location">Location:</label>
                <br>
                <input id="number" class="number-input" type="text" name="number" autofocus placeholder="Starting line" required>
                <input id="lane" class="lane-input" type="text" name="lane" autofocus placeholder="Lane" required>
                <input id="city" class="city-input" type="text" name="city" autofocus placeholder="City" required>
                
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
                
                <script src="../../../public/js/custom-select.js"></script>
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

            </div>
            <div class="email-container">
                <label id="email-label" class="email-lable" for="email">Email</label>
                <br>
                <input id="email" class="email-input" type="text" name="email" autofocus placeholder="Email" required>
            </div>
            <div class="contact-container">
                <label id="contact-label" class="contact-lable" for="contact">Contact No</label>
                <br>
                <input id="contact" class="contact-input" type="text" name="contact" autofocus placeholder="Contact number" required>
            </div>
            <div class="uname-container">
                <label class="uname-lable" for="uname">Username</label>
                <br>
                <input id="uname" class="uname-input" type="text" name="uname" autofocus placeholder="Username" required>
            </div>
            <div class="password-container">
                <label id="password-label" class="password-lable" for="password">Password</label>
                <br>
                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password" required>
            </div>
            <div>
                <button id="submit-btn" class='brown-button' type='submit' name='add-donor'>Add Donor</button>
                <img class="addbutton" src="./../../public/img/admindashboard/add-button.png" alt="add-button">
                <a class='outline-button' type='reset' name='cancel-adding' href="/donors/type?page=1">Cancel Adding</a>
                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
            </div>
        </form>
    </div>
<script src="../../../public/js/validation/uservalidation.js"></script>
</body>
</html>