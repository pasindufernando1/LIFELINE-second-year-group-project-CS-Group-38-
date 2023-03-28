<?php

$metaTitle = 'Donor Dashboard';
// print_r($_SESSION['camp_ads'][0]);
// die();
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
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/donor/layout/header.php'); ?>

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
            <div class="reports menu-item">
                <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                    alt="reports">
                <p class="reports-nav "><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns-selected">
                <div class="campaigns-marker"></div>
                <img class="campaigns-active" src="./../../public/img/donordashboard/active/campaigns2.png"
                    alt="campaigns">
                <p class="campaigns-act "><a href="/getcampaign?page=1">Campaigns</a></p>

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
    <div class="campaign-reg-box">
        <h2 class="header2">Registered Campaigns</h2>
        <div class="view-register-container">
            <?php
            //$number_of_results = $_SESSION['rowCount'];
            $number_of_results = count($_SESSION['registrations']);

            $result = $_SESSION['registrations'];
            $countt = 0;
            if (count($_SESSION['registrations']) > 0) {
                for ($x = 0; $x < $number_of_results; $x++) {
                    $stime = substr($_SESSION['registrations'][$x][0][5], 0, 2);
                    $stimeval = intval($stime);
                    if ($stimeval > 12) {
                        $st = 24 - $stime;
                        $_SESSION['registrations'][$x][0][5] =
                            strval($st) . ' PM';
                    } else {
                        $_SESSION['registrations'][$x][0][5] =
                            strval($stimeval) . ' AM';
                    }
                    echo '<div class="view-register-card">
                                            <div class="campaign-card-left-box">
                                            <h3>' .
                        $_SESSION['registrations'][$x][0][1] .
                        '</h3>
                                            <p>Starting At :' .
                        $_SESSION['registrations'][$x][0][5] .
                        '<br>
                                            Location:' .
                        $_SESSION['registrations'][$x][0][2] .
                        '<br>
                                            At:' .
                        $_SESSION['registrations'][$x][0][4] .
                        '</p>
                                            </div>
                                            <div class="campaign-card-right-box">
                                            <a href="/getcampaign/view_campaign?camp=' .
                        $_SESSION['registrations'][$x][0][0] .
                        '"> <button class="register-btn" name="view_camp_info" > View </button> </a>
                                            <a href="getcampaign/view_timeslot"> <button class="register-btn" name="view_camp_info" > Time slot </button> </a>
                                            </div>
                                            </div>';
                }
            } else {
                echo 'You are not currently registered to any campaign';
            }
            ?>
        </div>

    </div>
    <div class="campaign-view-box">
        <h2 class="header2">Upcoming Campaigns</h2>
        <div class="view-campaign-container">
            <?php
            $number_of_results = $_SESSION['rowCount'];
            $result = $_SESSION['upcoming_campaigns'];
            $count = 0;

            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    $stime = substr($row['Starting_time'], 0, 2);
                    // $etime = substr($_SESSION['registrations'][$x][0][6], 0, 2);
                    $stimeval = intval($stime);
        if ($stimeval > 12) {
            $st = 24 - $stime;
            $row['Starting_time'] = strval($st) . ' PM';
        } else {
            $row['Starting_time'] = strval($stimeval) . ' AM';
        }
        echo '<div class="view-campaign-card" style="margin-top: 5px; margin-bottom: 5px;">
            <img src = "./../../public/img/ads/' . $_SESSION['camp_ads'][$count][0][0] . '" class="campaign-card-img" alt="campaigns">
            <div class="campaign-card-bottom">
            <h3>' . $row['Name'] . '</h3>
            <p class="campaign-card-info">
            <b>Starting At : </b>' . $row['Starting_time'] . '<br>
            <b>Location : </b>' . $row['Location'] . '<br>
            <b>At : </b>' . $row['Date'] . '<br><br>
            <a href="/getcampaign/view_campaign?camp=' .
            $row['CampaignID'] .
            '" name="view_camp_info"> View more... </a></p>
                                            </div>
                                            </div>';
$count++;

                }
            } else {
                echo '0 results';
            }
            ?>
        </div>
    </div>


</body>

</html>