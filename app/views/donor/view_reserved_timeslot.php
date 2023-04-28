<?php

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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>


    <div class="timeslot-container">
        <h2>Reserved Time Slot</h2>
        <!-- <button class="d-card">Download</button><br> -->
        <button class="c-card"><a href="/getcampaign/change_timeslot" onclick="showPopupc(event)">Change Time
                Slot</a></button><br>
        <button id="cc" class="cancel-card"><a id="cca" href="/getcampaign/cancel_timeslot"
                onclick="showPopup(event)">Cancel</a></button>

        <div class="timeslot-card">
            <img id="card_logo" src="../../../public/img/logo/logo-horizontal.jpg"><br>
            <!-- <img src="../../../public/img/donordashboard/sneha.jpg" alt="profile-pic"> -->
            <div>
                <h3>TIME SLOT
                    <?php echo $_SESSION['selected_stime']; ?> to
                    <?php echo $_SESSION['selected_etime']; ?>
                </h3><br>
                <p>
                    <b>CAMPAIGN : </b>
                    <?php echo $_SESSION['camp_na'][0]; ?><br>
                    <b>ADDRESS : </b>
                    <?php echo $_SESSION['camp_na'][1]; ?><br>
                    <b>DONOR NAME : </b>
                    <?php echo $_SESSION['donor_name']; ?><br>
                    <b>CONTACT NUMBER : </b>
                    <?php echo $_SESSION['reg_info'][1] ?><br>
                    <b>EMERGENCY CONTACT NUMBER : </b>
                    <?php echo $_SESSION['reg_info'][0] ?><br>
                </p>
            </div>
        </div>
        <button id="to_campaigns"><a href="/getcampaign">Back to Campaigns</a></button>
    </div>

    <div class="popup">
        <div>
            <p>Are you sure you want to cancel the reservation for this time slot?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>


            <img class="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">

        </div>
    </div>

    <div class="popup" id="popupc">
        <div>
            <p>Are you sure you want to change this time slot?</p>
            <div><button class="yes-button" id="yes-button">Yes</button>
                <button onclick="hidealertc()">No</button>
            </div>


            <img class="close" onclick="hidealertc()" src="../../../public/img/donordashboard/close.png">

        </div>
    </div>

    <script>
    function showPopup(event) {
        // console.log(href);

        event.preventDefault(); // prevent following the link
        var popup = document.querySelector(".popup");
        popup.style.display = "block"; // show the pop-up box
        var yesButton = document.querySelector(".yes-button");
        yesButton.onclick = function() {
            window.location.href = event.target.href; // follow the link
        };
        var noButton = document.querySelector(".no-button");
        noButton.onclick = function() {
            popup.style.display = "none"; // hide the pop-up box
        };
    }

    function showPopupc(event) {
        console.log(event.target.href);

        // console.log(href);

        event.preventDefault(); // prevent following the link
        var popup = document.getElementById("popupc");
        popup.style.display = "block"; // show the pop-up box
        var yesButton = document.getElementById("yes-button");
        yesButton.onclick = function() {
            window.location.href = event.target.href; // follow the link
        };
        // var noButton = document.querySelector(".no-button");
        // noButton.onclick = function () {
        //     popup.style.display = "none"; // hide the pop-up box
        // };
    }

    function hidealert() {
        var popup = document.querySelector(".popup");
        popup.style.display = "none";
    }

    function hidealertc() {
        var popup = document.getElementById("popupc");
        popup.style.display = "none";
    }
    </script>
</body>

</html>