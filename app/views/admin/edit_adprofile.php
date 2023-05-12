<?php
$metaTitle = "Edit profile";

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
    <link href="../../../public/css/admin/profile.css" rel="stylesheet">
    <link href="../../../public/css/extra/custom-select.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>




</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/profile_active_sidebar.php'); ?>
    <!-- main content -->
    <div class="box">
        <form action="/adprofile/update" method="POST" enctype="multipart/form-data" id="addform">
            <div class="user-details">
                <div class="image-1">
                    <img id="user_pic" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
                    <div class="image-upload">
                        <label for="file-input">
                        <img class="camera-icon" src="../../../public/img/admindashboard/camera.png" />
                        </label>
                        <input id="file-input" name="fileToUpload" type="file" onchange="readURL(this);">
                    </div>
                </div>

                <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        document.getElementById("user_pic").src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                    }
                }
                </script>

                <div class="user">
                    <p class="u-name"><?php echo ($_SESSION['username']); ?></p>
                    <p class="r-type"><?php echo ($_SESSION['type']); ?> <br></p>
                </div>
            </div>

            <div class="profile-det">
                <div class="reserve-id-container">
                    <label class="reserve-id-lable" for="Name">Username:</label>
                    <br>
                    <input id="Name" class="reserve-id-input" type="text" name="Name" value="<?php echo $_SESSION['username'] ?>">
                </div>
                <div class="blood-group-container">
                    <label id="email-label" class="blood-group-lable" for="Email">Email:</label>
                    <br>
                    <input id="email" class="blood-group-input" type="text" name="email" value="<?php echo ($_SESSION['useremail']); ?>">

                </div>
                <div class="quantity-container">
                    <label id="password-label" class="quantity-lable" for="email">Password:</label>
                    <br>
                    <input id="password" class="quantity-input" type="password" name="password" autofocus placeholder="New Password">
                </div>
                <div class="quantitys-container">
                    <label id="confirmPassword-label" class="quantitys-lable" for="email">Confirm Password:</label>
                    <br>
                    <input id="confirmPassword" class="quantitys-input" type="password" name="password" autofocus placeholder="New Password">
                </div>
                <div class="expiry-constraints-container">
                    <label id="contact-label" class="expiry-constraints-lable" for="contact">Contact No:</label>
                    <br>
                    <input id="contact" class="expiry-constraints-input" type="text" name="contact" value="<?php echo ($_SESSION['user_contact']); ?>">

                </div>
                <button id = "submit-btn" class='brown-button' type='submit' name='update-profile'>Update Profile</button>
                <img class="addbutton" src="./../../public/img/admindashboard/add-button.png" alt="add-button">
                <a class='outline-button' type='reset' name='cancel-adding' href="/adprofile">Cancel Updating</a>
                <img class="cancelbutton" src="./../../public/img/dashboard/cancel-button.png" alt="cancel-button">
        </form>

    </div>
    </div>
    <script src="../../../public/js/validation/uservalidation.js"></script>                        
</body>

</html>