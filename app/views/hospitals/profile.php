<?php 

$metaTitle = "Hospitals Dashboard" 
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
    <link href="../../../public/css/hospitals/requestBlood.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>


            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                <div class="dashboard menu-item">       
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>

                    <div class="requestBlood menu-item">
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/non-active/Request blood.png" alt="requestBlood">
                        <img class="requestBlood-non-active" src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>
                    
                    
                    
                    <div class="profile-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="/requestBlood/viewProfile">Profile</a></p>

                    </div>

                </div>

            </div>
            
            
            <div class="profileBox">
            <img class="hospital_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic"><br>
            <!-- <img class="change_img" src="../../../public/img/hospitalsdashboard/lil_cam.png"><br> -->
            <?php echo '<p class="usr-name">'.($_SESSION['Username']).'</p><br>
                <p class="usr-type">'.($_SESSION['UserType']).'</p><br>'  ?>
                <a href="/requestBlood/editProfile">Edit Profile<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>
                <a onclick="showalert()" id="email-edit">Edit Email<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>

                <div id="myDialog" class="dialog">
                    <div class="dialog-content">
                        <h2>Change your Email</h2>
                        <form action="/requestBlood/confirm_password" method="POST">
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
                        <form action="/requestBlood/get_email" method="POST" id="emailform">
                            
                            <?php if (isset($_SESSION['e_error'])) {
                                echo "<p class='pass_error'>" . $_SESSION['e_error'] . "</p>";
                            } ?>
                            <label id="email-label" >Please enter your new email :</label>
                            <input type="text" id="email" name="email">
                            <button type="submit" name="confirm">Enter</button>
                            <button id="cancelButton1"
                            onclick="document.getElementById('myEmail').style.display = 'none';return false;">Cancel</button>
                            
                        </form>
                    </div>
                </div>

                <div id="myOTP" class="dialog">
                    <div class="dialog-content">
                        <!-- <p>After submitting the new email, you will receive an OTP code...</p> -->
                        <form action="/requestBlood/confirm_OTP" method="POST">
                            <?php if (isset($_SESSION['otp_error'])) {
                                echo "<p id='pass_error'>" . $_SESSION['otp_error'] . "</p>";
                            } ?>
                            <label for="otp">Please enter the received OTP :</label>
                            <input type="text" id="otp" name="otp">
                            <button type="submit" name="confirm">Enter</button>
                            <button id="cancelButton2" onclick="hideotp()">Cancel</button>
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
        <script src="../../../public/js/validation/orgvalidation.js"></script>

        <div id="myEmail" class="dialog">
            <div class="dialog-content">
                <form action="/requestBlood/get_email" method="POST">
                    <p class="ppp">After submitting the new email, you will receive an OTP code...</p>
                    <?php if (isset($_SESSION['e_error'])) {
                        echo "<p class='pass_error'>" . $_SESSION['e_error'] . "</p>";
                    } ?>
                    <label id="email-label2" for="email2">Please enter your new email :</label>
                    <input type="text" id="email2" name="email">
                    <button type="submit" name="confirm">Enter</button>
                    <button onclick="hidealert()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myOTP" class="dialog">
            <div class="dialog-content">
                <!-- <p>After submitting the new email, you will receive an OTP code...</p> -->
                <form action="/requestBlood/confirm_OTP" method="POST">
                    <?php if (isset($_SESSION['otp_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['otp_error'] . "</p>";
                    } ?>
                    <label for="otp2">Please enter the received OTP :</label>
                    <input type="text" id="otp2" name="otp">
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
                    Hospital Name
                    <br>
                    <br>
                    Telephone Number
                    <br>
                    <br>
                    Address
                    <br>
                    <br>
                    Email
                    
                </P>
                </div>
                <div class="right">
                <p>
                    <?php echo '<p>
                    : ' .
                    $_SESSION['Username'] .
                        '
                    <br>
                    <br>
                    : ' .
                    $_SESSION['telno'] .
                        '
                    <br>
                    <br>
                    
                    
                    
                    : ' .
                        $_SESSION['Number'] .
                        ', ' .
                        $_SESSION['LaneName'] .
                        ', ' .
                        $_SESSION['City'] .
                        ', ' .
                        $_SESSION['District'] .
                        ', ' .
                        $_SESSION['Province'] .
                        '
                        <br>
                        <br>
                    : ' .
                    $_SESSION['Email'] .
                    '
                    <br>
                    <br>
                        </p>'; ?>
                </P>
            </div>
            
            </div>   
        </div>
    </div>
    

</body>
</html>

            