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
// print_r($_SESSION['complication_camps']);
// die();

$metaTitle = 'Donor Dashboard';?>

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
        <h2 class="header2">Your Donations At Campaigns</h2>

        <div class="content">
            <?php
$result = $_SESSION['camp_donations'];
$_SESSION['rowCount'] = sizeof($_SESSION['camp_donations']);
$count = 0;

if ($_SESSION['rowCount'] > 0) {
    foreach ($result as $row) {
        if (empty($_SESSION['camp_donations'][$count][2]) == 1) {
            echo '<div class="view-campdon-card">
                <img src="../../../public/img/ads/' . $_SESSION['advetisements'][$count] . '" alt="campaign1">
                <div class="info">
                <h4>' . $_SESSION['camp_names'][$count] . '</h4>
                <h3>' . $row['Date'] . '</h3>
                <p>
                    <b>Organized By :</b> ' . $_SESSION['org_names'][$count] . '<br>
                    <b>At :</b> ' . $_SESSION['camp_locations'][$count] . '<br><br>
                    <b>Amount You Donated :</b> ' . $_SESSION['camp_donation_amounts'][$count] . ' ml<br>
                    <b>Total Donation at the Campaign :</b> ' . $_SESSION['total_donations_campaign'][$count] . ' ml
                </p>

                <a href="/ratecampaign/addrating?camp=' . $row['CampaignID'] . '"> <button>FeedBack</button> </a>
                </div>
                </div>';
        } else {
            echo '<div class="view-campdon-card">
                <img src="../../../public/img/ads/' . $_SESSION['advetisements'][$count] . '" alt="campaign1">
                <div class="info">
                <h4>' . $_SESSION['camp_names'][$count] . '</h2>

                <h3>' . $row['Date'] . '</h3>
                <p>
                    <b>Organized By :</b> ' . $_SESSION['org_names'][$count] . '<br>
                    <b>At :</b> ' . $_SESSION['camp_locations'][$count] . '<br><br>
                    <b>Amount You Donated :</b> ' . $_SESSION['camp_donation_amounts'][$count] . ' ml<br>
                    <b>Total Donation at the Campaign :</b> ' . $_SESSION['total_donations_campaign'][$count] . ' ml
                </p>

                <a href="/ratecampaign/viewrating?camp=' . $row['CampaignID'] . '"> <button>View FeedBack</button> </a>
                </div>
                </div>';
        }
        $count++;
    }
} else {
    echo 'You Have Not Yet Donated Blood at a Blood Donation Campaign';
}
?>
        </div>

    </div>
    <div class="camp-summary">
        <h2>Summary of Your Donations</h2>
        <?php
echo '<h3>Total Donation Campaigns Attended</h3><p>' . $_SESSION['camp_donation_number'] . '</p>
    <h3>Your Total Donations </h3><p>' . $_SESSION['all_donations_camps'] . 'ml</p>
    <h3>Complications You Had </h3>';
$scount = 0;
foreach ($_SESSION['complications'] as $complications) {
    echo '<p>' . $complications . '<span> At </span>' . $_SESSION['complication_camps'][$scount] . '</p>';
    $scount++;
}
?>
    </div>
</body>

</html>