<?php 

$metaTitle = "Organizations Dashboard" ;
require '../vendor/payment_config.php';
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

    <style>
    .ad-holder {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        /* height: 511px; */
        align-items: center;
        margin: 0 4%;
        margin-left: 2%;
        margin-right: 1%;
        background: #f7f7f7;
        margin-top: 8%;
        /* overflow-x: auto; */
        border: #e8e8e8 solid 1px;
        border-radius: 6px;
    }

    .ad-card {
        width: 347px;
        height: 630px;
        background-color: #fff;
        border-radius: 10px;
        margin: 20px 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        /* display: flex; */
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        float: left;
        margin-left: 20px;
        font-family: 'Poppins';
    }

    .ad-img {
        width: 347px;
        height: 341px;
        border-radius: 10px 10px 0 0;
    }

    .ad-box {
        box-sizing: border-box;
        position: absolute;
        width: 1540px;
        /* height: 797px; */
        left: 316px;
        top: 127px;
        background: #ffffff;
        border: 1.81193px solid #ECEEF7;
        border-radius: 6px;
    }

    .ad-card h2 {
        font-size: 21px;
        font-weight: 600;
        color: #000000;
        margin-top: 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    .ad-card p {
        text-indent: 15px;
    }

    .ad-card a {
        margin-top: 13%;
        margin-right: auto;
        margin-left: auto;
        background: #640e0b;
        border-radius: 6px;
        color: white;
        height: 38px;
        display: flex;
        width: 59%;
        align-items: center;
        justify-content: center;
    }
    </style>

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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png"
                    alt="3-dot">
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
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard">Dashboard</a>
                        </p>
                    </div>

                    <div class="campaigns menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png"
                            alt="campaigns">
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>

                    <div class="schedule-time menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active"
                            src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule
                                time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications">
                        <img class="notifications-non-active"
                            src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations"> -->
                        <img class="cash-donations-active"
                            src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-act "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png"
                            alt="inventory donations">
                        <img class="inventory-donations-non-active"
                            src="./../../public/img/orgdashboard/active/inventory donations.png"
                            alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewBloodbanks">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active"
                            src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="feedback-non-active" src="./../../public/img/orgdashboard/active/feedback.png"
                            alt="instructions">
                        <p class="feedback-nav "><a href="/requestApproval/addFeedback">Feedback</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>

                </div>

            </div>
            <div class="ad-box">
                <p class="donate-today">Donate Today</p>
                <div class="ad-holder">
                    <?php 
                    // print_r($_SESSION['cash_received_amounts'][1][0][0]);
                    $count=0;
                    foreach ($_SESSION['cash_ads'] as $ad) {
                        // print_r($ad[0]);
                        echo '<div class="ad-card"><img class="ad-img" src="./../../public/img/ads/'.$_SESSION['cash_adpics'][$count][0]['Advertisement_pic'].'" alt="advertisement">
                        <h2>'.$_SESSION['cash_bbs'][$count][0][0].'</h2>
                        <p>Amount Needed : LKR '.$_SESSION['cash_ads'][$count][3].'</p>
                        <p>Amount Received : LKR '.$_SESSION['cash_received_amounts'][$count][0][0].'</p>
                        <a href="/requestApproval/donationPage?donationID='.$_SESSION['cash_ads'][$count][0].'">Donate</a>
                        </div>';
                    $count++;
                    }
                    ?>

                </div>

            </div>
</body>

</html>