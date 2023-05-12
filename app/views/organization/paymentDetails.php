<?php

$metaTitle = "Organizations Dashboard";
// get type of $_SESSION['donating_amount']
// print_r(gettype($_SESSION['donating_amount']));
// print_r($_SESSION['donating_amount']/100);
// die();

$amount = $_SESSION['donating_amount'] / 100;

?>

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
    <link href="../../../public/css/organization/requestApproval.css" rel="stylesheet">
    <style>
        .stripe-button-el {
            position: absolute;
            top: 499px;
            left: 1000px;
            width: 201px;
        }

        .donation-amount-text {
            font-family: Poppins;
            font-size: 19px;
            /* font-weight: bold; */
            position: absolute;
            top: 332px;
            left: 743px;
            width: 255px;
            color: rgb(84 84 89 / 40%);
        }

        .donation-amount-text-2 {
            font-family: Poppins;
            font-size: 35px;
            font-weight: bold;
            position: absolute;
            top: 343px;
            left: 742px;
            width: 255px;
        }

        .donation-t {
            font-family: Poppins;
            font-size: 17px;
            /* font-weight: bold; */
            position: absolute;
            top: 322px;
            left: 1000px;
            width: 379px;
            /* border-left: 5px solid black;
        padding-left: 10px; */

        }

        .line {
            position: absolute;
            top: 256px;
            left: 936px;
            width: 87px;
            height: 341px;
        }

        .edit:hover {
            cursor: pointer;
            /* color: white; */
        }

        .edit {
            position: absolute;
            top: 447px;
            left: 743px;
            width: 100px;
            height: 28px;
            background-color: #640e0b;
            border: none;
            border-radius: 5px;
            color: white;
            font-family: 'Poppins';
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
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
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

                <p class="donation-amount-text">Donation Amount</p>
                <!-- display donation amount-->
                <p class="donation-amount-text-2">LKR
                    <?php echo $amount ?>
                </p>
                <!-- button to edit the amount -->
                <button class='edit' onclick="goBack()">Edit</button>

                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>
                <!-- Thank the donor -->

                <img class="line" src="./../../public/img/line.png" alt="req">
                <p class="donation-t">
                    <!-- At [Your Organization], we are committed to making a positive impact on the world by supporting
                        causes that make a difference in the lives of many. Your donation is a reflection of your shared
                        commitment to this mission, and we are honored to have supporters like you who share our vision.
                        <br><br> -->
                    Thank you for your generosity and for being a part of our efforts to create a better
                    world. Your donation will make a significant difference, and we appreciate your support in
                    helping us achieve our goals.


                </p>
                <form action="/paymentGateway/submit" method="post" id="addform">
                    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="<?php echo $_SESSION['public_key'] ?>"
                        data-amount="<?php echo $_SESSION['donating_amount'] ?>" data-name="LifeLine"
                        data-description="Donate to Save Lives" data-currency="lkr"
                        data-image="../../../public/img/donordashboard/favicon2.jpg">
                        </script>
                    <img class="cardLogos-img" src="./../../public/img/orgdashboard/card logos.jpg" alt="req">

                </form>
            </div>