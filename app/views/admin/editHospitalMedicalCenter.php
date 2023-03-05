<?php 

$metaTitle = "Edit Hos/Med" 
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
    <link href="../../../public/css/admin/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/users_active_sidebar.php'); ?>

    <div class="box">
        <p class="update-user-title">Update Hospital/Medical Center details</p>

        
        <?php echo '<form action="/usermanage/editHospitalMedCenter/'.$_SESSION['user_id']. '" method="post" id="addform">' ?>
            <div class="quantity-container">
                <label class="quantity-lable" for="name">Name:</label>
                <br>
                <input id="quantity" class="quantity-input" type="text" name="name" value="<?php echo $_SESSION['Name'] ?>" required>
            </div>
            <div class="reg-container">
                <label id="reg-label" class="reg-lable" for="regno">Registration number:</label>
                <br>
                <input id="regno" class="reg-input" type="text" name="regno" value="<?php echo $_SESSION['Registration_no'] ?>" required>
            </div>
            <div class="status-container">
                <label class="status-lable" for="status">Status</label>
                <br>
                <select id="status" class="status-input" type="text" name="status" autofocus placeholder="Status" required>
                    <option value="<?php echo $_SESSION['Status'] ?>" hidden><?php if($_SESSION['Status']==1) {echo "Verified";} else {echo "Pending";}?></option>
                        <option value="1">Verified</option>
                        <option value="0">Pending</option>
                </select>
            </div>
            <div class="location-container">
                <label class="location-lable" for="location">Location:</label>
                <br>
                <input id="number" class="number-input" type="text" name="number" value="<?php echo $_SESSION['Number'] ?>" required>
                <input id="lane" class="lane-input" type="text" name="lane" value="<?php echo $_SESSION['LaneName'] ?>" required>
                <input id="city" class="city-input" type="text" name="city" value="<?php echo $_SESSION['City'] ?>" required>
                <select id="district" class="district-input custom-select" name="district" type="text" required>
                        <!-- Show placeholder -->
                        <option value="<?php echo $_SESSION['District'] ?>" hidden><?php echo $_SESSION['District'] ?></option>
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
                <select id="province" class="province-input custom-select" type="text" name="province" required>
                        <!-- Show placeholder -->
                        <option value="<?php echo $_SESSION['Province'] ?>" hidden><?php echo $_SESSION['Province'] ?></option>
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
                <input id="email" class="email-input" type="text" name="email" value="<?php echo $_SESSION['Email'] ?>" required>
            </div>
            <div class="contact-container">
                <label id="contact-label" class="contact-lable" for="contact">Contact No</label>
                <br>
                <input id="contact" class="contact-input" type="text" name="contact" value="<?php echo $_SESSION['Contact_no'] ?>" required>
            </div>
            <div class="uname-container">
                <label class="uname-lable" for="uname">Username</label>
                <br>
                <input id="uname" class="uname-input" type="text" name="uname" value="<?php echo $_SESSION['Username'] ?>" required>
            </div>
            <div class="password-container">
                <label id="password-label" class="password-lable" for="password">Password</label>
                <br>
                <input id="password" class="password-input" type="password" name="password" autofocus placeholder="New Password" >
            </div>
            
            <div>
                <button id="submit-btn" class='brown-button-update' type='submit' name='update-hosmed'>Update Hospital/Medical Center</button>
                <img class="addbutton" src="./../../public/img/admindashboard/updateuser.png" alt="edit-button">
                <a class='outline-button' type='reset' name='cancel-adding' href="/usermanage/type?page=1">Cancel Updating</a>
                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
            </div>
        </form>
    </div>
    <script src="../../../public/js/validation/uservalidation.js"></script>

</body>
</html>