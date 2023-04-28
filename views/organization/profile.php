<?php 

$metaTitle = "organizations Dashboard" 

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
    <link href="../../../public/css/organization/requestApproval.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <div class="top-bar">
        <div class="logo">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
        </div>
        <div class="search">
            <img src="../../../public/img/hospitalsdashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/hospitalsdashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
            <img src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo ($_SESSION['username']); ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo ($_SESSION['type']); ?> <br> 
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/organizationuser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                <div class="dashboard-non menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard/">Dashboard</a></p>
                    </div>

                    <div class="campaigns menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png" alt="campaigns"> 
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere">Campaigns</a></p>
                    </div>
                
                    <div class="schedule-time menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active" src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications">
                        <img class="notifications-non-active" src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations">
                        <img class="cash-donations-non-active" src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-nav "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png" alt="inventory donations"> 
                        <img class="inventory-donations-non-active" src="./../../public/img/orgdashboard/active/inventory donations.png" alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewAdvertisements">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
                    </div>

                    <div class="profile-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/orgdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>   
                </div>
            </div>
             
            <div class="profileBox">
            <img class="hospital_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic"><br>
            <!-- <img class="change_img" src="../../../public/img/hospitalsdashboard/lil_cam.png"><br> -->
            <?php echo '<p class="usr-name">'.($_SESSION['Username']).'</p><br>
                <p class="usr-type">'.($_SESSION['UserType']).'</p><br>'  ?>
                <a href="/requestApproval/editDetails">Edit Profile<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>
                <a onclick="showalert()" id="email-edit">Edit Email<img src="../../../public/img/donordashboard/edit_btn_img.png"></a>

                <div id="myDialog" class="dialog">
                    <div class="dialog-content">
                        <form action="/requestApproval/confirm_password" method="POST">
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
                        <form action="/requestApproval/get_email" method="POST">
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
                        <form action="/requestApproval/confirm_OTP" method="POST">
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
                    Organization/Society Name
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
                    
                    
                    
                    : ' .$_SESSION['Number'] .', ' .$_SESSION['LaneName'] .', ' .$_SESSION['City'] .', ' .$_SESSION['District'] .', ' .$_SESSION['Province'] . '
                        <br>
                        <br>
                    : ' .$_SESSION['Email'] .'
                    <br>
                    <br>
                        </p>'; ?>
                </P>
            </div>
            
            </div>
            