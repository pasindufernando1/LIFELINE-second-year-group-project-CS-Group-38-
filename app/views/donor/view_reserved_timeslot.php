<?php

$metaTitle = 'Campaign Timeslots'; ?>

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

    <!-- Popups -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/includes/timeslots_popup.php'); ?>


    <div class="timeslot-container">
        <h2>Reserved Time Slot</h2>

        <button class="c-card"><a href="/getcampaign/change_timeslot" onclick="showPopupc(event)">Change Time
                Slot</a></button><br>
        <button id="cc" class="cancel-card"><a id="cca" href="/getcampaign/cancel_timeslot" onclick="showPopup(event)">Cancel</a></button>

        <div class="timeslot-card">
            <img id="card_logo" src="../../../public/img/logo/logo-horizontal.jpg"><br>
            
            <div>
                <h3>TIME SLOT
                    <?php echo $_SESSION['selected_stime']; ?> to
                    <?php echo $_SESSION['selected_etime']; ?>
                </h3><br>
                <p>
                    <b>CAMPAIGN : </b><?php echo $_SESSION['camp_na'][0]; ?><br>
                    <b>ADDRESS : </b><?php echo $_SESSION['camp_na'][1]; ?><br>
                    <b>DONOR NAME : </b><?php echo $_SESSION['donor_name']; ?><br>
                    <b>CONTACT NUMBER : </b><?php echo $_SESSION['reg_info'][1] ?><br>
                    <b>EMERGENCY CONTACT NUMBER : </b><?php echo $_SESSION['reg_info'][0] ?><br>
                </p>
            </div>
        </div>
        <button id="to_campaigns"><a href="/getcampaign">Back to Campaigns</a></button>
    </div>
    <script src="../../../public/js/donor/timeslot.js"></script>
</body>

</html>