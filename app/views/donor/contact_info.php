<?php

$metaTitle = 'Blood Banks'; ?>

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

</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/contactus_active.php'); ?>


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
        <p class="bb-name-info" style="">Blood Reserves at
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

                        data: [
                            <?php echo $_SESSION['b_reserves_ap'] . ',' . $_SESSION['b_reserves_an'] . ',' . $_SESSION['b_reserves_bp'] . ',' . $_SESSION['b_reserves_bn'] . ',' . $_SESSION['b_reserves_abp'] . ',' . $_SESSION['b_reserves_abn'] . ',' . $_SESSION['b_reserves_op'] . ',' . $_SESSION['b_reserves_on'] ?>
                        ],

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
                            title: {
                                display: true,
                                text: 'Bloood Group'
                            },

                            grid: {
                                display: false,
                                tickBorderDash: [10, 15]

                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Blood Packs'
                            },
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