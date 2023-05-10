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

    <div class="box">
        <div class="message-container">
            <img class="success-msg-img" src="./../../public/img/donordashboard/unsuccess-msg-img.jpg"
                alt="success-msg-img">
            <p class="success-msg-txt">Sorry your registration was declined!</p>
            <a href="/getcampaign?page=1" class="brown-button back-to-reserve">Back to campaigns</a>
            <img class="success-reserve-img" src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img">
        </div>
    </div>


</body>

</html>