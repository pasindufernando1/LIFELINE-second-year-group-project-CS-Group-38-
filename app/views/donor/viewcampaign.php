<?php
$_SESSION['selected_campid'] = $_GET['camp'];
$metaTitle = 'Donor Dashboard';
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
    <?php
// If the current user is registered to the campaign
?>
    <?php if ($_SESSION['if_registered'] == 0) {
        if ($_SESSION['okayed'] == true) {
            echo '<div class="view-campaign-box">
        <p class="campaign-head">' .
                $_SESSION['campaign_array'][1] .
                '</p><br>
        <p class="campaign-details">Organized By : ' .
                $_SESSION['org_name'] .
                '<br><br>
            Date : ' .
                $_SESSION['campaign_array'][4] .
                '<br><br>
            Starting Time : ' .
                $_SESSION['campaign_array'][5] .
                '<br><br>
            Ending Time : ' .
                $_SESSION['campaign_array'][6] .
                '<br><br>
            Location : ' .
                $_SESSION['campaign_array'][2] .
                '<br><br>
            Number of Beds : ' .
                $_SESSION['campaign_array'][3] .
                '</p><br>
        <a href="/getcampaign/reg_to_campaign?camp=' .
                $_SESSION['selected_campid'] .
                '"><button class="to-reg-btn">Register</button>
            <img src="./../../public/img/donordashboard/camp_ad.jpg" class="campaign-img" alt="campaigns">
    </div>';
        } else {
            echo '<div class="view-campaign-box">
        <p class="campaign-head">' .
                $_SESSION['campaign_array'][1] .
                '</p><br>
        <p class="campaign-details">Organized By : ' .
                $_SESSION['org_name'] .
                '<br><br>
            Date : ' .
                $_SESSION['campaign_array'][4] .
                '<br><br>
            Starting Time : ' .
                $_SESSION['campaign_array'][5] .
                '<br><br>
            Ending Time : ' .
                $_SESSION['campaign_array'][6] .
                '<br><br>
            Location : ' .
                $_SESSION['campaign_array'][2] .
                '<br><br>
            Number of Beds : ' .
                $_SESSION['campaign_array'][3] .
                '</p><br>
        <p class="to-reg-btn">Cannot Register</p>
            <img src="./../../public/img/donordashboard/camp_ad.jpg" class="campaign-img" alt="campaigns">

    </div>';
        }
    }
    // If the current user is registered to the campaign
    elseif ($_SESSION['if_registered'] == 1) {
        echo '<div class="view-camp-div-box">
        <div class="left-box">
            <div class="left-head">
                <h1>' .
            $_SESSION['campaign_array'][1] .
            '</h1>
            </div>
            <div class="left-q">
                <p>Organized By
                    <br>
                <p>Date
                    <br>
                <p>Starting Time
                    <br>
                <p>Ending Time
                    <br>
                <p>Location
                    <br>
                <p>Number of Beds</p>
            </div>
            <div class="right-a">
                <p> : ' .
            $_SESSION['org_name'] .
            '<br>
                <p> : ' .
            $_SESSION['campaign_array'][4] .
            '<br>
                <p> : ' .
            $_SESSION['campaign_array'][5] .
            '<br>
                <p> : ' .
            $_SESSION['campaign_array'][6] .
            '<br>
                <p> : ' .
            $_SESSION['campaign_array'][2] .
            '<br>
                <p> : ' .
            $_SESSION['campaign_array'][3] .
            '</p>
            </div>
        </div>
        <div class="right-box">
            <div class="left-head">
                <h1>Registration Details</h1>
            </div>
            <div class="r-left-q">
                <p>Emergency Contact Number </br>
                <p>Contact Number </p>
            </div>
            <div class="r-right-a">
                <p> : ' .
            $_SESSION['reg_info'][0] .
            ' </br>
                <p>: ' .
            $_SESSION['reg_info'][1] .
            '</p>
            </div>
            <br>
            <a class="outline-regedit-button" href="updatereg">Update
                <img src="./../../public/img/donordashboard/edit-btn.png" class="reg-edit-btn"></a>
            <a class="outline-regdelete-button" href="deletereg">Delete
                <img src="./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
        </div>';
        // echo '<div class="div-box">
        // <div class="left-box">
        // <h1>' .
        // $_SESSION['campaign_array'][1] .
        // '</h1>
        // <p>Organized By : ' .
        // $_SESSION['org_name'] .
        // '</p>
        // <p>Date : ' .
        // $_SESSION['campaign_array'][4] .
        // '</p>
        // <p>Starting Time : ' .
        // $_SESSION['campaign_array'][5] .
        // '</p>
        // <p>Ending Time : ' .
        // $_SESSION['campaign_array'][6] .
        // '</p>
        // <p>Location : ' .
        // $_SESSION['campaign_array'][2] .
        // '</p>
        // <p>Number of Beds : ' .
        // $_SESSION['campaign_array'][3] .
        // '</p>
        // </div>
        // <div class="right-box">
        // <h1>Registration Details</h1>
        // <p>Emergency Contact Number : ' .
        // $_SESSION['reg_info'][0] .
        // '</p>
        // <p>Contact Number : ' .
        // $_SESSION['reg_info'][1] .
        // '</p>
        // <br>
        // <a class="outline-regedit-button" href="getcampaign/updatereg/">Update
        // <img src="./../../public/img/donordashboard/edit-btn.png" class="reg-edit-btn"></a>
        // <a class="outline-regdelete-button" href="#">Delete
        // <img src="./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
        // </div>';
    } ?>
    </div>
    </div>
</body>

</html>