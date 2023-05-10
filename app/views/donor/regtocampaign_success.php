<?php

$metaTitle = 'Campaign Register'; ?>

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

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>

    <div class="camp-success-box">
        <div class="message-container">
            <img class="success-msg-img" src="./../../public/img/dashboard/success-msg-img.png" alt="success-msg-img">
            <p class="success-msg-txt"><?php echo $_SESSION['camp_success_msg']?></p>

            <?php unset($_SESSION['camp_success_msg']); ?>
            <!-- Campaign Registration Success -->
            <?php if($_SESSION['succ_type'] == 'reg') { ?>
            <a href="/getcampaign?page=1" class="brown-button back-to-campaigns">Back to campaigns <img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } 
            // Campaign Registration Edit Success
            else if($_SESSION['succ_type'] == 'edit'){ ?>
            <a href="<?php echo '/getcampaign/view_campaign?camp='.$_SESSION['selected_campid']?>" class="brown-button back-to-campaigns">Back to campaign<img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } 
            // Campaign Registration Delete Success
            else if($_SESSION['succ_type'] == 'delete') {?>
            <a href="/getcampaign?page=1" class="brown-button back-to-campaigns">Back to campaigns <img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } 
            // Timeslot Registration Reserve Success
            else if($_SESSION['succ_type'] == 'reserve') {?>
            <a href="/getcampaign/display_timeslot" class="brown-button back-to-campaigns">View Time Slot<img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } 
            // Timeslot Reservation Change Success
            else  if($_SESSION['succ_type'] == 'reservation_change'){?>
            <a href="/getcampaign/display_timeslot" class="brown-button back-to-campaigns">View Time Slot<img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } 
            // Timeslot Reservation Delete Success
            else  if($_SESSION['succ_type'] == 'reservation_delete'){?>
            <a href="/getcampaign?page=1" class="brown-button back-to-campaigns">Back to campaigns<img src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img"></a>
            <?php } ?>
            <?php unset($_SESSION['succ_type']); ?>
        </div>
    </div>

</body>

</html>