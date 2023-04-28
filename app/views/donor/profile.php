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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/profile_active.php'); ?>



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
                <h2>Change Your Email</h2>
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
                <p class="ppp">After submitting the new email, you will receive an OTP code...</p>
                <form action="/donorprofile/get_email" method="POST" id="email_update">
                    <?php if (isset($_SESSION['e_error'])) {
                        echo "<p class='pass_error'>" . $_SESSION['e_error'] . "</p>";
                    } ?>
                    <label for="email">Please enter your new email :</label>
                    <input type="text" id="email" name="email">
                    <p id="email-error"></p>
                    <button id="esub" type="submit" name="confirm">Enter</button>
                    <button id="cancelButton1"
                        onclick="document.getElementById('myEmail').style.display = 'none';return false;">Cancel</button>
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
                    <button id="otpsub" type="submit" name="confirm">Enter</button>
                    <button id="cancelButton2" onclick="hideotp()">Cancel</button>
                </form>
            </div>
        </div>

        <script>
            // Get the dialog box
            var dialog = document.getElementById("myDialog");
            var emaili = document.getElementById("myEmail");
            var otp = document.getElementById("myOTP")
            // Get the input field and buttons 
            var input = document.getElementById("name");
            var okButton = document.getElementById("okButton");
            var cancelButton = document.getElementById("cancelButton"); // Show the dialog box whenthe page loads

            function showalert() {
                dialog.style.display = "block";
            } //Show the email dialog box when the page loads

            function showemail() {
                emaili.style.display = "block";
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
                emaili.style.display = "none";
                return false;
            }

            function hideotp() {
                otp.style.display = "none";
                return false;
            }
        </script>

        <script src="../../../public/js/validation/donorupdatevalidation.js"></script>


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