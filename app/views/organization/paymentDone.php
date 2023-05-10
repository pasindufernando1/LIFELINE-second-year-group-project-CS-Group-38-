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
    <!-- Style in head  -->
    <style>
    .title {
        font-family: 'Poppins';
        position: absolute;
        font-size: 34px;
        top: 40px;
        left: 574px;
        width: 964px;
        font-weight: bold;
        /* background: blanchedalmond; */
        text-align: center;
    }

    .p-err {
        font-family: Poppins;
        font-size: 23px;
        position: absolute;
        top: 479px;
        left: 575px;
        color: #bf1b16;
        font-weight: bold;
        width: 962px;
        text-align: center;
    }

    .x-img {
        position: absolute;
        left: 963px;
        top: 241px;
        width: 182px;
    }

    .para3 {
        font-size: 20px;
        font-family: Poppins;
        position: absolute;
        left: 710px;
        top: 445px;
        text-align: center;
        width: 700px;
    }

    .but {
        position: absolute;
        left: 930px;
        top: 598px;
        width: 268px;
        font-family: Poppins;
        font-size: 20px;
        /* font-weight: bold; */
        color: #ffffff;
        background: #640e0b;
        border-radius: 10px;
        border: none;
        padding: 7px;
        cursor: pointer;
    }

    .but:hover {
        cursor: pointer
    }

    .but a {
        text-decoration: none;
        color: #ffffff;
    }
    </style>
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard-non menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/dashboard.png" alt="campaigns">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/requestApproval/dashboard">Dashboard</a></p>
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
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewAdvertisements">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active"
                            src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png"
                            alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Feedback</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>

                </div>

            </div>
            <div class="box">
                <p class="donate-today">Donate Today</p>
                <img class="donation-img" src="./../../public/img/orgdashboard/donation.png" alt="req">
                <p class="para1">We are proudly non-profit, non-corporate and non-compromised. we rely on donations
                    to carry out our mission. <b>Will you give today? </b></p>
                <!-- <p class="para2">Your donation will help us to continue our work to save lives, and to provide
                        support to those affected by blood cancer.</p> -->
                <p class='title'>Payement successful!!</p>
                <img class="x-img" src="./../../public/img/success-msg-img.png" alt="req">
                <!-- <p class="p-err"><?php echo $_SESSION['PaymentError']; ?></p> -->
                <p class="para3"><b>Thank you for your donation.</b><br> Your donation will help us to continue our work
                    to
                    save
                    lives,<br> and to provide support to those in need.</p>
                <button class="but"><a href="/requestApproval/donateCash">Go to Donation Page</a></button>


            </div>