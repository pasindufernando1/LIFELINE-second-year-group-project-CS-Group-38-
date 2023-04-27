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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


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
    <div class="history-box">
        <h1>Your Donations</h1>
        <div class="content">

            <div class="don-type">
                <button><a href="donationhistory/atcampaigns">At Campaigns<a></button>
            </div>

            <div class="pie-chart">
                <p class="title">Your Blood Donations</p>
                <p>
                    <?php echo 'Total Donations : ' . $_SESSION['no_of_bank_donations'] + $_SESSION['no_of_camp_donations']; ?>
                </p>
                <canvas id="myDoughnutChart"></canvas>
            </div>
            <script>
                // Get the canvas element
                var ctx = document.getElementById('myDoughnutChart').getContext('2d');

                // Define the data for the chart
                var data = {
                    labels: ['Blood Banks', 'Campaigns'],
                    datasets: [{
                        data: [
                            <?php echo $_SESSION['no_of_bank_donations'] . ',' . $_SESSION['no_of_camp_donations']; ?>
                        ],
                        backgroundColor: [
                            'rgba(245, 174, 172, 1)',
                            'rgba(115, 29, 29, 1)'
                        ]
                    }]
                };

                var options = {
                    legend: {
                        display: false,
                        position: 'bottom',
                        labels: {
                            fontColor: '#333',
                            fontSize: 19
                        }
                    }
                };

                // Create the doughnut chart
                var myDoughnutChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: data,
                    options: options
                });
            </script>




            <div class="don-type" id="bank">
                <button><a href="donationhistory/atbloodbanks">At Blood Banks</a></button>
            </div>
        </div>

    </div>
</body>

</html>