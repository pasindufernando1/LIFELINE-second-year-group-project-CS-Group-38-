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

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/feedback_active.php'); ?>


    <div class="feedback-box">
        <h2 class="header2">Your Feedbacks</h2>
        <div class="view-campaign-container">
            <?php
            $result = $_SESSION['all_feedback'];
            $count = 0;

            if (count($_SESSION['all_feedback']) > 0) {
                foreach ($result as $row) {
                    echo '<div class="view-camp-feedback">
            <img class="feed-ad" src="../../../public/img/advertisements/' . $_SESSION['camp_ads_feedback'][$count] . '" alt="camp ad">
            <div class="feed-info">
            <h2>' . $_SESSION['camp_names'][$count] . '</h2>
            <p>Rating :</p>
            <div class="feedback-stars">';
                    for ($i = 0; $i < $_SESSION['all_feedback'][$count]['Rating']; $i++) {
                        echo '<img src="./../../public/img/donordashboard/yellow_star.png" alt="y_star">';
                    }
                    for ($i = 0; $i < 5 - $_SESSION['all_feedback'][$count]['Rating']; $i++) {
                        echo '<img src="./../../public/img/donordashboard/grey_star.png" alt="g_star">';
                    }
                    echo '</div>
            <br>';
                    if (strlen($_SESSION['all_feedback'][$count]['Feedback']) > 30) {
                        echo '<p id="fbv">Feedback : ' . substr($_SESSION['all_feedback'][$count]['Feedback'], 0, 30) . '... <a href="/ratecampaign/viewrating?camp=' . $row['CampaignID'] . '">see more</a> </p>';
                    } else {
                        echo '<p id="fbv">Feedback : ' . $_SESSION['all_feedback'][$count]['Feedback'] . ' </p>';

                    }
                    echo '</div>
            
            <a href="editrating?camp=' . $row['CampaignID'] . '"> <button>Edit</button> </a>
                <a href="remove_rating?camp=' . $row['CampaignID'] . '" onclick="showPopup(event, this.href)"> <button id = "fbd-btn">Delete</button></a>
                
            </div>
            ';
                    $count++;
                }
            } else {
                echo 'You Have Not Yet Provided feedBack';
            }
            ?>
            <script src="../../../public/js/getcampname.js"></script>
        </div>
    </div>

    <div class="popup">
        <div>
            <p>Are you sure you want to cancel this feedback?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>


            <img class="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">

        </div>
    </div>

    <script>
        function showPopup(event, href) {
            console.log(href);

            event.preventDefault(); // prevent following the link
            var popup = document.querySelector(".popup");
            popup.style.display = "block"; // show the pop-up box
            var yesButton = document.querySelector(".yes-button");
            yesButton.onclick = function () {
                window.location.href = href; // follow the link
            };
            var noButton = document.querySelector(".no-button");
            noButton.onclick = function () {
                popup.style.display = "none"; // hide the pop-up box
            };
        }

        function hidealert() {
            var popup = document.querySelector(".popup");
            popup.style.display = "none";
        }
    </script>

</body>

</html>