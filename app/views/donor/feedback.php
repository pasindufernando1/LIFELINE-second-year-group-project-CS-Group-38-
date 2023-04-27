<?php
// $eh = empty($_SESSION['camp_donations'][0][1]);
// print_r($eh);
// // print_r($_SESSION['camp_donations'][1][1]);

// die();

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
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard-non menu-item">
                <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                <img class="reservation-non-active dash" src="./../../public/img/donordashboard/active/dashboard.png"
                    alt="dashboard">
                <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                    alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                    alt="reservation">
                <p class="reservation-nav menu-item"><a href="/donationhistory">History</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png"
                    alt="donor-cards">
                <p class="users-nav "><a href="/card">Donor Card</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                    alt="inventory">
                <p class="inventory-nav "><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

            </div>
            <div class="feedback menu-item">
                <div class="feedback-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/reports.png" alt="reports">
                <p class="reservation-act"><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/donordashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/campaigns.png"
                    alt="campaigns">
                <p class="campaigns-nav "><a href="/getcampaign?page=1">Campaigns</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png"
                    alt="profile">
                <p class="profile-nav "><a href="/donorprofile">Profile</a></p>

            </div>
        </div>
    </div>
    <div class="feedback-box">
        <h2 class="header2">Your Feedbacks</h2>
        <div class="view-campaign-container">
            <?php
            $result = $_SESSION['all_feedback'];
            $count = 0;

            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    echo '<div class="view-camp-feedback">
            <img src="../../../public/img/ads/' . $_SESSION['camp_ads'][$count] . '" alt="camp ad">
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
            <br>
            <p id="fbv">Feedback : ' . $_SESSION['all_feedback'][$count]['Feedback'] . ' </p>
            </div>
            
            <a href="editrating?camp=' . $row['CampaignID'] . '"> <button>Edit</button> </a>
                <a href="remove_rating?camp=' . $row['CampaignID'] . '""> <button id = "fbd-btn">Delete</button></a>
                
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
</body>

</html>