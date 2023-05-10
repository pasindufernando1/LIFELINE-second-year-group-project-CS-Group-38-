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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
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
        </div>
    </div>
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
        <a><img class="r-arrow-img" src="./../../public/img/donordashboard/right-arrow.jpg" alt="dashboard"></a>
        <a href="/getcampaign/view_campaign?camp=4"><img class="dash-img"
                src="./../../public/img/donordashboard/dash-ad.jpg" alt="dashboard"></a>
        <a><img class="l-arrow-img" src="./../../public/img/donordashboard/left-arrow.jpg" alt="dashboard"></a>

    </div>
    <div class="bo7">
        <div class="male">
            <img class="malepic" src="./../../public/img/donordashboard/male.png" alt="male">
            <p class="matex">35%</p>

        </div>

        <div class="female">
            <img class="femalepic" src="./../../public/img/donordashboard/female.png" alt="male">
            <p class="matex">65%</p>

        </div>
        <p class="tebar">Donor Composition</p>
        <canvas id="pie-chart" width="800" height="450"></canvas>
        <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'doughnut',
            data: {

                datasets: [{
                    label: "Donor Composition",
                    backgroundColor: ["#BF1B16", "#BF1B16"],
                    data: [2478, 5267]

                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Predicted world population (millions) in 2050',
                    hoverOffset: 4
                }
            },

        });
        </script>
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
                    $count++;
                    if ($count > 4) {
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
    <div class="container2">
        <h2>Things You need to know about Donating Blood in Sri Lanka</h2>
        <div>
            <h3>Who can donate blood?</h3>
            <p>
                The person must fulfill several criteria to be accepted as a blood donor. These criteria are set forth
                to
                ensure the safety of the donor as well as the quality of donated blood.</p>

            <h4>Donor Selection Criteria</h4>
            <ul>
                <li>Age above 18 years and below 60 years.</li>
                <li>If previously donated, at least 4 months should be elapsed since the date of previous donation.
                <li>Hemoglobin level should be more than 12g/dL. (this blood test is done prior to each blood donation)
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