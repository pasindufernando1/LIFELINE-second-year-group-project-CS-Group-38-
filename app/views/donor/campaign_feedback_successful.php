<?php

$metaTitle = 'Donor Feedback'; ?>

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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/feedback_active.php'); ?>

    <div class="success-box">
        <div class="message-container">
            <img class="success-msg-img" src="./../../public/img/dashboard/success-msg-img.png" alt="success-msg-img">
            <p class="success-msg-txt">Your FeedBack was
                <?php echo $_SESSION['operation'] ?> successfully!
            </p>
            <div class="rate_success">
                <a href="/donationhistory/atcampaigns">Back to History<img src="../../../public/img/donordashboard/reservation.png"></a>
                <a href="/ratecampaign/feedback_page">Back to FeedBack<img src="../../../public/img/donordashboard/feedback.png"></a>
            </div>
        </div>
    </div>

</body>

</html>