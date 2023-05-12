<?php

$metaTitle = 'Donor Profile'; ?>

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

    <!-- Popups -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/includes/email_update.php'); ?>


    <div class="profile-container">

        <img id="donor_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']); ?>"><br>
        <img id="change_img" src="../../../public/img/donordashboard/lil_cam.png"><br>

        <?php echo '<h3>' . $_SESSION['donor_info']['Fullname'] . '</h3>'; ?>

        <a href="/donorprofile/editprofile">Edit Profile<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>
        <a onclick="showalert()" id="email-edit">Edit Email<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>

        <script src="../../../public/js/donor/email_edit.js"></script>
        <script src="../../../public/js/validation/donorupdatevalidation.js"></script>

        <div class="main">
            <div class="left">
                <p>
                    NIC Number<br><br>
                    Date of Birth<br><br>
                    Telephone Number<br><br>
                    Email<br><br>
                    Address
                </P>
            </div>
            <div class="right">
                <p>
                    <?php echo '<p>
                    : ' .$_SESSION['donor_info']['NIC'] .'<br><br>
                    : ' .$_SESSION['donor_info']['DOB'] .'<br><br>
                    : ' .$_SESSION['donor_contact']['ContactNumber'] .'<br><br>
                    : ' .$_SESSION['email'] .'<br><br>
                    : ' .$_SESSION['donor_info']['Number'] .', 
                    ' .$_SESSION['donor_info']['LaneName'] .',
                    ' .$_SESSION['donor_info']['City'] .', 
                    ' .$_SESSION['donor_info']['District'] .', 
                    ' .$_SESSION['donor_info']['Province'] .
                        '</p>'; ?>
                </P>
            </div>
        </div>
        <a id="delete-profile" class="update" onclick="showPassword()">Delete Profile</a>
    </div>
</body>

</html>