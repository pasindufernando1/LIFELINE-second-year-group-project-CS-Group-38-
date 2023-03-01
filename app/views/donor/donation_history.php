<?php
// $eh = empty($_SESSION['camp_donations'][0][1]);
// // print_r($eh);
// $result = $_SESSION['camp_donations'];
// $_SESSION['rowCount'] = sizeof($result);
// // print_r(sizeof($_SESSION['bank_donations']));
// print_r($_SESSION['rowCount']);
// die();
// $_SESSION['rowCount'] = sizeof($_SESSION['camp_donations']);
// print_r(sizeof($_SESSION['camp_donations']));
// die();
// print_r($_SESSION['camp_locations']);
// die();

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
    </div>

    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard-non menu-item">
                <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                <img class="reservation-non-active dash" src="./../../public/img/donordashboard/active/dashboard.png"
                    alt="dashboard">
                <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
            </div>
            <div class="history menu-item">
                <div class="history-marker"></div>
                <img id="hist-s" src="./../../public/img/donordashboard/active/history.png" alt="reservation">
                <p class="reservation-act menu-item"><a href="/donationhistory">History</a></p>

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
    <div class="history-campaign-box">
        <h2 class="header2">Your Donations</h2>
        <p class="header31">At Campaigns</p>
        <div class="view-campaign-container">
            <?php
            $result = $_SESSION['camp_donations'];
            $_SESSION['rowCount'] = sizeof($_SESSION['camp_donations']);
            $count = 0;

            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    if (empty($_SESSION['camp_donations'][$count][2]) == 1) {
                        echo '<div class="view-campdon-card">
                                            <h3>' .
                            $row['Date'] .
                            '</h3>
                                            <h2>' .
                            $_SESSION['camp_names'][$count] .
                            '</h2><p>
                                            Organized By : ' .
                            $_SESSION['org_names'][$count] .
                            '<br>
                                            At : ' .
                            $_SESSION['camp_locations'][$count] .
                            '<br>
                                            <br>
                                            Amount You Donated : ' .
                            $_SESSION['camp_donation_amounts'][$count] .
                            ' ml
                                            <br>
                                            Total Donation at the Campaign : ' .
                            $_SESSION['total_donations_campaign'][$count] .
                            ' ml
                                            </p>
                                             <a href="/ratecampaign/addrating?camp=' .
                            $row['CampaignID'] .
                            '"> <button>FeedBack</button> </a>

                                            </div>';
                    } else {
                        echo '<div class="view-campdon-card">
                                        <h3>' .
                            $row['Date'] .
                            '</h3>
                                        <h2>' .
                            $_SESSION['camp_names'][$count] .
                            '</h2><p>
                                        Organized By : ' .
                            $_SESSION['org_names'][$count] .
                            '<br>
                                        At : ' .
                            $_SESSION['camp_locations'][$count] .
                            '<br>
                                        <br>
                                        Amount You Donated : ' .
                            $_SESSION['camp_donation_amounts'][$count] .
                            ' ml
                                        <br>
                                        Total Donation at the Campaign : ' .
                            $_SESSION['total_donations_campaign'][$count] .
                            ' ml
                                        </p>
                                         <a href="/ratecampaign/viewrating?camp=' .
                            $row['CampaignID'] .
                            '"> <button>View FeedBack</button> </a>

                                        </div>';
                    }
                    $count++;
                }
            } else {
                echo 'You Have Not Yet Donated Blood at a Blood Donation Campaign';
            }
            ?>
            <script src="../../../public/js/getcampname.js"></script>
        </div>
        <p class="header32">At BloodBanks</p>
        <div class="view-bloodbank-container">
            <?php
            $count = 0;
            $result = $_SESSION['bank_donations'];
            $_SESSION['rowCount'] = sizeof($_SESSION['bank_donations']);
            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    echo '<div class="view-bankdon-card">
                                            <h3>' .
                        $row['Date'] .
                        '</h3>
                                           <h2>' .
                        $_SESSION['bank_names'][$count] .
                        '</h2><p>
                                            Amount You Donated : ' .
                        $_SESSION['bank_donation_amounts'][$count] .
                        ' ml
                                            <br>
                                            Total Donations that Day : ' .
                        $_SESSION['total_donations_bank'][$count] .
                        ' ml
                                            </p>
                                            </p>
                                            
                                            </div>';
                    $count++;
                }
            } else {
                echo 'You Have Not Yet Donated Blood at a Blood Bank';
            }
            ?>
        </div>

    </div>

    </div>
    </div>
</body>

</html>