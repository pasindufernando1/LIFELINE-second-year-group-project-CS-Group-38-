<?php

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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- <iframe src="<?php echo $_SESSION['bb_info']['Location'] ?>" width="910" height="300"
        style="border:0;position: absolute;z-index: 3;top: 563px;left: 638px;border: 1px solid;border-radius: 6px;"
        allowfullscreen="" loading="lazy"></iframe> -->




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
            <div class="contactus menu-item">
                <div class="contactus-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/inventory.png" alt="inventory">
                <p class="reservation-act"><a href="/contactus">Contact Us</a></p>

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

    <div class="contact-container">
        <p>
            <?php echo $_SESSION['bb_info']['BloodBank_Name'] ?>
        </p>
        <div class="contact-card">
            <img src="../../../public/img/bloodbanks/<?php echo $_SESSION['bb_info'][8]; ?>" alt="profile-pic">
            <div>
                <p>
                    <b>Phone : </b>
                    <?php echo $_SESSION['bb_contact'][0] ?><br>
                    <b>Email : </b>
                    <?php echo $_SESSION['bb_info']['Email'] ?><br>
                    <b>Address</b> :
                    <?php echo $_SESSION['bb_info']['Number'] . ', ' . $_SESSION['bb_info']['LaneName'] . ', ' . $_SESSION['bb_info']['City'] ?><br>
                    <b>District : </b>
                    <?php echo $_SESSION['bb_info']['District'] ?><br>
                    <b>Province : </b>
                    <?php echo $_SESSION['bb_info']['Province'] ?><br>
                </p>
            </div>
        </div>
        <p style="font-size: 21px;position: absolute;left: 255px;top: 369px;color: black;">Blood Reserves at
            <?php echo $_SESSION['bb_info']['BloodBank_Name'] ?>
        </p>
        <div class="blood_rchart" width="400" height="400">
            <canvas id="myBarChart"></canvas>
        </div>
        <script>
            var ctx = document.getElementById('myBarChart').getContext('2d');
            window.myBar = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'],
                    datasets: [{
                        label: 'Blood Group',
                        backgroundColor: [
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                            '#BF1B16',
                        ],

                        // data: [10, 20, 5, 15, 10, 20, 5, 15],
                        data: [<?php echo $_SESSION['b_reserves_ap'] . ',' . $_SESSION['b_reserves_an'] . ',' . $_SESSION['b_reserves_bp'] . ',' . $_SESSION['b_reserves_bn'] . ',' . $_SESSION['b_reserves_abp'] . ',' . $_SESSION['b_reserves_abn'] . ',' . $_SESSION['b_reserves_op'] . ',' . $_SESSION['b_reserves_on'] ?>],

                        borderRadius: 8,
                        borderSkipped: false,
                        barpercentage: 1,
                        borderWidth: 2,

                        borderSkipped: false,
                        hoverOffset: 4
                    }]
                },
                options: {

                    title: {
                        display: true,
                        text: 'Donation Received ',
                        // Align the chart title to the top left
                        position: 'top',
                        fontSize: 30,
                        fontColor: '#000000',
                        fontFamily: 'Poppins',
                        fontStyle: 'bold',
                        hoverOffset: 4
                    },
                    scales: {
                        x: {

                            grid: {
                                display: false,
                                tickBorderDash: [10, 15]

                            }
                        },
                        y: {
                            grid: {
                                display: true,
                                borderDash: [5, 5],
                            },
                            ticks: {
                                beginAtZero: true
                            },

                        }
                    }
                }
            });
        </script>
        <a id="btb" href="/contactus">Back to Blood Banks</a>
    </div>
</body>

</html>