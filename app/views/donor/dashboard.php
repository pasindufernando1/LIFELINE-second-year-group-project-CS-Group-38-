<?php

$metaTitle = 'Donor Dashboard';
// print_r($_SESSION['camp_ads'][2][0][0]);
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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard menu-items">
                <div class="dashboard-marker"></div>
                <img src="./../../public/img/donordashboard/active/dashboard.png" alt="dashboard">
                <p class="dashboard-active"><a href="#">Dashboard</a></p>
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

    <div class="container">
        <p class="dash-p">
            Hello <?php echo $_SESSION['username']; ?>
        </p>
        <button onclick="scrollToDiv()">Learn More About Donating</button>
        <div class="dash-div">
            <?php if ($_SESSION['no_of_donations'] == 0) {
    echo "<p>Thank You<br> For Joining With Us<br> to <br>Donate Blood And Save Lives</p>";
} else {
    echo '<p>Your Last Donation Was<br><span id="r"> ' . $_SESSION['days_last_donation'] . '</span><br> Days Ago<br><br>';
    if ($_SESSION['days_last_donation'] < 56) {
        echo 'You Can Donate Blood Again In<br><span> ' . (56 - $_SESSION['days_last_donation']) . '</span> <br>Days</p>';
    } else {
        echo 'You Can Donate Blood <span>Now</span></p>';
    }

}
?>
        </div>

    </div>

    <script>
    function scrollToDiv() {
        console.log("scrolling");
        var div = document.getElementById("see-more-container");
        var offset = 100;
        var bodyRect = document.body.getBoundingClientRect().top;
        var elementRect = div.getBoundingClientRect().top;
        var elementPosition = elementRect - bodyRect;
        var offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }
    </script>

    <div class="dash-ad">
        <a><img class="r-arrow-img" src="./../../public/img/donordashboard/right-arrow.jpg" alt="dashboard"></a>
        <a href="/getcampaign/view_campaign?camp=4"><img class="dash-img"
                src="./../../public/img/donordashboard/dash-ad.jpg" alt="dashboard"></a>
        <a><img class="l-arrow-img" src="./../../public/img/donordashboard/left-arrow.jpg" alt="dashboard"></a>
    </div>

    <div class="dash-badge">
        <p>Your Latest Badge</p>
        <img src="./../../public/img/badges/<?php echo $_SESSION['newest_badge']; ?>" alt="badge">
    </div>

    <div class="dash-don">
        <?php if ($_SESSION['total_donated_amount'] == 0) {
    echo "<p>A SINGLE Donation of Yours can save <span>3 LIVES</span><br>
            You Can Donate Your BLOOD at a Campaign OR a Blood Bank</p>";
} else {
    echo "<p><span>A SINGLE Donation of Yours can save 3 LIVES</span><br><br>
            You have GIVEN<span> " . $_SESSION['total_donated_amount'] . " ml</span> of Your <span>BLOOD</span><br><br>
            You Have DONATED Your BLOOD <br> <span>" . $_SESSION['no_of_donations'] . "</span> times So Far</p>";
}?>
    </div>

    <div id="dash-camp" class="campaign-view-box">
        <div class="hed">
            <button><a id="see-more" href="/getcampaign">See More</a></button>
            <p>Upcoming Campaigns</p>
        </div>
        <div class="view-campaign-container">
            <?php
$number_of_results = $_SESSION['rowCount'];
$result = $_SESSION['upcoming_campaigns'];
$count = 0;
if ($_SESSION['rowCount'] > 0) {
    foreach ($result as $row) {
        if ($count == 4) {
            break;
        }
        $stime = substr($row['Starting_time'], 0, 2);
        // $etime = substr($_SESSION['registrations'][$x][0][6], 0, 2);
        $stimeval = intval($stime);
        if ($stimeval > 12) {
            $st = 24 - $stime;
            $row['Starting_time'] = strval($st) . ' PM';
        } else {
            $row['Starting_time'] = strval($stimeval) . ' AM';
        }
        echo '<div class="view-campaign-card">
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
    <div id="see-more-container" class="container2">
        <h2>Things You need to know about Donating Blood in Sri Lanka</h2>
        <div>
            <h3>Who can donate blood?</h3>
            <p>
                The person must fulfill several criteria to be accepted as a blood donor. These criteria are set
                forth
                to
                ensure the safety of the donor as well as the quality of donated blood.</p>

            <h4>Donor Selection Criteria</h4>
            <ul>
                <li>Age above 18 years and below 60 years.</li>
                <li>If previously donated, at least 4 months should be elapsed since the date of previous donation.
                <li>Hemoglobin level should be more than 12g/dL. (this blood test is done prior to each blood
                    donation)
                </li>
                <li>Free from any serious disease condition or pregnancy.</li>
                <li>Should have a valid identity card or any other document to prove the identity.</li>
                <li>Free from "Risk Behaviours".</li>
            </ul>
            <h4>Risk Behaviours</h4>
            <ul>
                <li>Drug addicts.</li>
            </ul>


            <h4>Type of Donors</h4>
            <ul>
                <li>Voluntory non remunerated donors. (donate for the sake of others and do not expect any benefit.
                    their blood
                    is considered safe and healthy)</li>
                <li>Replacement donors. (donate to replace the units used for their friends or family members)</li>
                <li>Paid donors. (receive payment for donation</li>
                <li>Directed donors. (donate only for a specific patient's requirement)</li>
            </ul>

            <h5>Please Note:</h5>
            <p id="note">
                Replacement and Paid donors are no longer accepted by NBTS. <br>
                Replacement donation was carried out until recently in some blood banks due to the shortage of blood
                stocks.
                <br>Asking patients for replacementdonors
                will lead to more pressure on the relatives, who are already in stress
                and this in turn results inillegalpaid donations.
                <br>
                Directed donations are used in certain conditions such as in rare blood groups.
                <br>
                NBTS achieved the mighty figure of 100% voluntory non-remunerated blood donor base.
            </p>
        </div>
    </div>

</body>

</html>