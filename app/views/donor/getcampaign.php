<?php

$metaTitle = 'Donor Dashboard'; ?>

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
    <div class="top-bar">
        <div class="logo">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
        </div>
        <div class="search">
            <img src="./../../public/img/donordashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/donordashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/donordashboard/profilepic.jpg" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo $_SESSION['type']; ?> <br>
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/donordashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/donoruser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard-non menu-item">
                        <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/donordashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                            alt="reservation">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                            alt="reservation">
                        <p class="reservation-nav menu-item"><a href="#">History</a></p>

                    </div>
                    <div class="users menu-item">
                        <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png"
                            alt="donor-cards">
                        <p class="users-nav "><a href="/usermanage">Donor Card</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                            alt="inventory">
                        <p class="inventory-nav "><a href="#">Contact Us</a></p>

                    </div>
                    <div class="badges menu-item">
                        <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                        <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                            alt="campaigns">
                        <p class="badges-nav "><a href="#">Badges</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                            alt="reports">
                        <p class="reports-nav "><a href="#">Feedback</a></p>

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
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>
                    <div class="campaign-reg-box">
                        <h2 class="header2">Registered Campaigns</h2>
                        <div class="view-register-container">
                            <?php
                            //$number_of_results = $_SESSION['rowCount'];
                            $number_of_results = count(
                                $_SESSION['registrations']
                            );

                            $result = $_SESSION['registrations'];
                            $countt = 0;
                            if (count($_SESSION['registrations']) > 0) {
                                for ($x = 0; $x < $number_of_results; $x++) {
                                    $stime = substr(
                                        $_SESSION['registrations'][$x][0][5],
                                        0,
                                        2
                                    );
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
                                            <a href="#"> <button class="register-btn" name="view_camp_info" > Time slot </button> </a>
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
                            if ($_SESSION['rowCount'] > 0) {
                                foreach ($result as $row) {
                                    $stime = substr(
                                        $row['Starting_time'],
                                        0,
                                        2
                                    );
                                    // $etime = substr($_SESSION['registrations'][$x][0][6], 0, 2);
                                    $stimeval = intval($stime);
                                    if ($stimeval > 12) {
                                        $st = 24 - $stime;
                                        $row['Starting_time'] =
                                            strval($st) . ' PM';
                                    } else {
                                        $row['Starting_time'] =
                                            strval($stimeval) . ' AM';
                                    }
                                    echo '<div class="view-campaign-card">
                                            <img src = "./../../public/img/donordashboard/donation_campaign.jpg" class="campaign-card-img" alt="campaigns">
                                            <div class="campaign-card-bottom"
                                            <p class="campaign-card-info">
                                            <h3>' .
                                        $row['Name'] .
                                        '</h3>
                                            Starting At :' .
                                        $row['Starting_time'] .
                                        '<br>
                                            Location:' .
                                        $row['Location'] .
                                        '<br>
                                            At:' .
                                        $row['Date'] .
                                        '<br><br>
                                            <a href="/getcampaign/view_campaign?camp=' .
                                        $row['CampaignID'] .
                                        '" name="view_camp_info"> View more... </a></p>
                                            </div>
                                            </div>';
                                }
                            } else {
                                echo '0 results';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>