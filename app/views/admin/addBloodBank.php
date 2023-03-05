<?php 

$metaTitle = "Add Blood Bank"
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
            <p class="add-user-title">Add New Blood Bank</p>
            <form action="/usermanage/addbloodbank_done" method="post" enctype="multipart/form-data" id="addform">
                <div class="quantity-container">
                    <label class="quantity-lable" for="name">Blood Bank Name:</label>
                    <br>
                    <input id="quantity" class="quantity-input" type="text" name="bank-name" autofocus placeholder="Blood Bank Name" required>
                </div>
                <div class="reg-container">
                    <label id = "email-label" class="reg-lable" for="regno">Email:</label>
                    <br>
                    <input id="email" class="regorg-input" type="text" name="email" autofocus placeholder="Email" required>
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
                    <label id="contact-label" class="email-lable" for="email">Contact No:</label>
                    <br>
                    <input id="contact" class="email-input" type="text" name="contact" autofocus placeholder="Contact number" required>
                </div>
                <div class="image-1">
                    <label id="image-label" class="image-lable" for="file-input">Blood Bank Image:</label>
                    <div class="image-upload">
                        <label for="file-input" class="icons">
                            <img class="camera-icon" id="camera-icon" src="../../../public/img/admindashboard/camera.png" src/>
                            <img id="browsepic" class="browsepic" src="../../../public/img/admindashboard/browseimg.png" />
                        </label>

                        <input id="file-input" name="fileToUpload" type="file" onchange="readURL(this);"/>
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    document.getElementById("camera-icon").src = e.target.result;
                                };
                                reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
            </div>
                <div>
                    <button id="submit-btn" class='brown-button' type='submit' name='add-orgsoc'>Add New Blood Bank</button>
                    <img class="addbutton" src="./../../public/img/admindashboard/hospitalicon.png" alt="add-button">
                    <a class='outline-button' type='reset' name='cancel-adding' href="/usermanage/type?page=1">Cancel Adding</a>
                    <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
                </div>
            </form>
        </div>
    <script src="../../../public/js/validation/uservalidation.js"></script>

</body>
</html>