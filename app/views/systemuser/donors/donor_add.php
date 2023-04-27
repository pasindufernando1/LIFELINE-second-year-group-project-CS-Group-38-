<?php 
$metaTitle = "Donors - Add New" 
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
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/donor.css" rel="stylesheet">
    <link href="../../../public/css/admin/add.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>       
                    <div class="box">
                        <p class="add-user-title">Add Donor</p>
                        
                        <!-- <a href="/reservation/add" class="brown-button addnew-user">Add New</a>
                        <img class="adduser-pic" src="./../../public/img/dashboard/add-button.png" alt="add-button">

                        <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img"> -->

                        <form action="/sys_donors/storeDonor" method="post" enctype="multipart/form-data">
                            <div class="quantity-container">
                                <label class="quantity-lable" for="name">Full name</label>
                                <br>
                                <input id="quantity" class="quantity-inputs" type="text" name="name" autofocus placeholder="Full name" required>
                            </div>
                            <div class="nic-container">
                                <label id="nic-label" class="nic-lable" for="nic">NIC no</label>
                                <br>
                                <input id="nic" class="nic-input" type="text" name="nic" autofocus placeholder="NIC no" required>
                            </div>
                            <div class="gender-container">
                                <label id="gender-label" class="gender-lable" for="gender">Gender</label>
                                <br>
                                <input id="gender" class="gender-input" type="text" name="gender" autofocus placeholder="Gender" required>
                            </div>
                            <div class="dob-container">
                                <label id="dob-label" class="dob-lable" for="dob">DOB</label>
                                <br>
                                <input id="dob" class="dob-input" type="date" name="dob" autofocus placeholder="Date of birth" required>
                            </div>
                            <div class="bloodtype-container">
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
                                <input id="number" class="number-input" type="text" name="number" autofocus placeholder="Number" required>
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
                            <!-- <div class="uid-container">
                                <label class="uid-lable" for="userID">UserID</label>
                                <br>
                                <input id="uid" class="uid-input" type="text" name="uid" autofocus placeholder="UserID">
                            </div> -->
                            <div class="password-container">
                                <label id="password-label" class="password-lable" for="password">Password</label>
                                <br>
                                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password" required>
                            </div>
                            <!-- <div class="reserve-id-container">
                                <label class="reserve-id-lable" for="reserve_id">Reserve ID:</label>
                                <br>
                                <input id="reserve_id" class="reserve-id-input" type="text" name="reserve_id" autofocus placeholder="<?php echo $_SESSION['rowCount']+1 ?>" disabled>
                            </div>
                            <div class="blood-group-container">
                                <label class="blood-group-lable" for="blood_group">Blood Group/Type:</label>
                                <br>
                                
                                <div class="custom-select">
                                    <select name="blood_group" id="blood_group" class="blood-group-input" autofocus placeholder="Blood Group/Type" required>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB+">AB+</option>
                                    </select>
                                </div>
                                <script src="../../../public/js/custom-select.js"></script>
                            </div>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="quantity">Quantity:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Quantity" required>
                            </div> -->
                            <!-- <div class="expiry-constraints-container">
                                <label class="expiry-constraints-lable" for="expiry_constraints">Expiry Constraints:</label>
                                <br>
                                <input id="expiry_constraints" class="expiry-constraints-input" type="text" name="expiry_constraints" autofocus placeholder="Expiry Constraints" required> -->
                            <div>
                                <button id="submit-btn" class='brown-button' type='submit' name='add-donor'>Add Donor</button>
                                <img class="addbutton" src="./../../public/img/admindashboard/add-button.png" alt="add-button">
                                <a class='outline-button' type='reset' name='cancel-adding' href="/sys_donors?page=1">Cancel Adding</a>
                                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                    </div>
                

</body>
</html>