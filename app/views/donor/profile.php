<?php
// print_r($_SESSION['donor_contact']);
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
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard-non menu-item">
                <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                <img class="reservation-non-active dash" src="./../../public/img/donordashboard/active/dashboard.png"
                    alt="dashboard">
                <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                    alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                    alt="reservation">
                <p class="reservation-nav menu-item"><a href="/donationhistory">History</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png"
                    alt="donor-cards">
                <p class="users-nav "><a href="/card">Donor Card</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                    alt="inventory">
                <p class="inventory-nav "><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                    alt="reports">
                <p class="reports-nav "><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/donordashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/campaigns.png"
                    alt="campaigns">
                <p class="campaigns-nav "><a href="/getcampaign?page=1">Campaigns</a></p>

            </div>
            <div class="line"></div>
            <div class="profile-s menu-item">
                <div class="profile-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/profile.png" alt="profile">
                <p class="reservation-act"><a href="/donorprofile">Profile</a></p>
            </div>
        </div>
    </div>



    <div class="profile-container">
        <img id="donor_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']); ?>"><br>
        <img id="change_img" src="../../../public/img/donordashboard/lil_cam.png"><br>
        <?php echo '<h3>' . $_SESSION['donor_info']['Fullname'] . '</h3>'; ?>
        <a href="/donorprofile/editprofile">Edit Profile<img
                src="../../../public/img/donordashboard/edit_btn_img.png"></a>
        <a onclick="showalert()" id="email-edit">Edit Email<img
                src="../../../public/img/donordashboard/edit_btn_img.png"></a>
        <!-- href="/donorprofile/c_password" -->
        <div id="myDialog" class="dialog">
            <div class="dialog-content">
                <form action="/donorprofile/confirm_password" method="POST">
                    <?php if (isset($_SESSION['p_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['p_error'] . "</p>";
                    } ?>
                    <label for="password">Please enter your password :</label>
                    <input type="password" id="password" name="password">
                    <button type="submit" name='confirm'>Enter</button>
                    <button id="cancelButton" onclick="hidealert()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myEmail" class="dialog">
            <div class="dialog-content">
                <form action="/donorprofile/get_email" method="POST">
                    <p class="ppp">After submitting the new email, you will receive an OTP code...</p>
                    <?php if (isset($_SESSION['e_error'])) {
                        echo "<p class='pass_error'>" . $_SESSION['e_error'] . "</p>";
                    } ?>
                    <label for="email">Please enter your new email :</label>
                    <input type="text" id="email" name="email">
                    <button type="submit" name="confirm">Enter</button>
                    <button onclick="hidealert()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myOTP" class="dialog">
            <div class="dialog-content">
                <!-- <p>After submitting the new email, you will receive an OTP code...</p> -->
                <form action="/donorprofile/confirm_OTP" method="POST">
                    <?php if (isset($_SESSION['otp_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['otp_error'] . "</p>";
                    } ?>
                    <label for="otp">Please enter the received OTP :</label>
                    <input type="text" id="otp" name="otp">
                    <button type="submit" name="confirm">Enter</button>
                    <button onclick="hidealert()">Cancel</button>
                </form>
            </div>
        </div>

        <script>
            // Get the dialog box
            var dialog = document.getElementById("myDialog");
            var email = document.getElementById("myEmail");
            var otp = document.getElementById("myOTP")
            // var otp = document.getElementById("myOTP");
            // Get the input field and buttons 
            var input = document.getElementById("name");
            var okButton = document.getElementById("okButton");
            var cancelButton = document.getElementById("cancelButton"); // Show the dialog box whenthe page loads

            function showalert() {
                dialog.style.display = "block";
            } //Show the email dialog box when the page loads

            function showemail() {
                email.style.display = "block";
            } //Show the otp dialog box when the page loads
            function showotp() {
                otp.style.display = "block";
            }
            // When the user clicks the OKbutton, get the input value and close the dialog box 

            // When the user clicks the Cancelbutton, close the dialog box

            function hidealert() {
                dialog.style.display = "none";
            }

            function hideemail() {
                email.style.display = "none";
            }

            function hideotp() {
                otp.style.display = "none";
            }
        </script>
        <div class="main">
            <div class="left">
                <p>
                    NIC Number
                    <br>
                    <br>
                    Date of Birth
                    <br>
                    <br>
                    Telephone Number
                    <br>
                    <br>
                    Email
                    <br>
                    <br>
                    Address
                </P>
            </div>
            <div class="right">
                <p>
                    <?php echo '<p>
                    : ' .
                        $_SESSION['donor_info']['NIC'] .
                        '
                    <br>
                    <br>
                    : ' .
                        $_SESSION['donor_info']['DOB'] .
                        '
                    <br>
                    <br>
                    : ' .
                        $_SESSION['donor_contact']['ContactNumber'] .
                        '
                    <br>
                    <br>
                    : ' .
                        $_SESSION['email'] .
                        '
                    <br>
                    <br>
                    : ' .
                        $_SESSION['donor_info']['Number'] .
                        ', ' .
                        $_SESSION['donor_info']['LaneName'] .
                        ', ' .
                        $_SESSION['donor_info']['City'] .
                        ', ' .
                        $_SESSION['donor_info']['District'] .
                        ', ' .
                        $_SESSION['donor_info']['Province'] .
                        '</p>'; ?>
                </P>
            </div>
        </div>
    </div>
</body>

</html>