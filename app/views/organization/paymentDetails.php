<?php 

$metaTitle = "Organizations Dashboard" 
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
                <img src="../../../public/img/hospitalsdashboard/hospital logo.png" alt="profile-pic">
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
                        <img src="./../../public/img/orgdashboard/non-active/dashboard.png" alt="campaigns">
                        <img class="reservation-non-active dash" src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/requestApproval/dashboard">Dashboard</a></p>
                    </div>

                    <div class="campaigns menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
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

                    <div class="cash-donations-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations"> -->
                        <img class="cash-donations-active" src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-act "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png" alt="inventory donations">
                        <img class="inventory-donations-non-active" src="./../../public/img/orgdashboard/active/inventory donations.png" alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewBloodbanks">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Feedback</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>

                </div>

            </div>
            <div class="box">
                <p class="paymentDetails">Your payment Details</p>
                <img class="cardLogo-img" src="./../../public/img/orgdashboard/card logos.jpg" alt="req" >
                <form action="/requestApproval/donateNow/" method="post" id="addform">
                <label id="cardNo-label" class="cardNo-label" for="cardNo">Card Number:</label>
                <br>
                <input class="cardNo-input" id="cardNo"  type="text" name="cardNo" autofocus placeholder="Card Number" required>
                <br>
                <label id="cardHolder-label" class="cardHolder-label" for="cardHolder">Card Holder Name:</label>
                <br>
                <input class="cardHolder-input" id="cardHolder"  type="text" name="cardHolder" autofocus placeholder="Card Holder Name" required>
                <br>
                <label id="expiryDate-label" class="expiryDate-label" for="expiryDate">Expiry Date:</label>
                <br>
                <input class="expiryDate-input" id="expiryDate"  type="text" name="expiryDate" autofocus placeholder="Expiry Date" required>
                <br>
                <label id="cvc-label" class="cvc-label" for="cvc">CVC:</label>
                <br>
                <input class="cvc-input" id="cvc"  type="text" name="cvc" autofocus placeholder="CVC" required>
                <br>

                <label class="tik">Save my details for future payments
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <button class='donateNow-btn' type='submit' name='request' id="donateNow-btn">Donate Now</button>
                </form>
            </div>