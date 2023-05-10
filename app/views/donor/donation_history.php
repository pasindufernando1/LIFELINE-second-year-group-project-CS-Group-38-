<?php

$metaTitle = 'Donation History'; ?>

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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/history_active.php'); ?>

    <div class="history-box">
        <h1>Your Donations</h1>
        <div class="content">

            <div class="don-type">
                <button><a href="donationhistory/atcampaigns">At Campaigns<a></button>
            </div>

            <div class="pie-chart">
                <p class="title">Your Blood Donations</p>
                <p>
                    <?php echo 'Total Donations : ' . ($_SESSION['no_of_bank_donations'] + $_SESSION['no_of_camp_donations']); ?>
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
                            <?php echo json_encode($_SESSION['no_of_bank_donations']) . ',' . json_encode($_SESSION['no_of_camp_donations']); ?>
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