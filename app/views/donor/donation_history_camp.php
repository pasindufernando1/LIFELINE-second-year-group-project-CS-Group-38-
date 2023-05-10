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



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/history_active.php'); ?>

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
                <img src="../../../public/img/advertisements/' . $_SESSION['advetisements'][$count] . '" alt="campaign1">
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
                <img src="../../../public/img/advertisements/' . $_SESSION['advetisements'][$count] . '" alt="campaign1">
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
        echo '<h3>Total Donation Campaigns Attended : ' . $_SESSION['camp_donation_number'] . '</h3>
    <h3>Your Total Donations : ' . $_SESSION['all_donations_camps'] . 'ml</h3>
    <h3 id="titt">Complications You Had </h3>';
        $scount = 0;
        //make a table for the complications and the camp they happened at
        
        if (empty($_SESSION['complications']) != 1) {
            echo '<table id="sumt">
            <tr>
                <th>Complication</th>
                <th>Camp</th>
            </tr>';
            foreach ($_SESSION['complications'] as $complications) {
                echo '<tr>
                        <td>' . $complications . '</td>
                        <td>' . $_SESSION['complication_camps'][$scount] . '</td>
            </tr>';
                $scount++;
            }
        } else {
            echo '<p id="sum-noc">You Have Not Had Any Complications so far</p>';
        }

        ?>
    </div>
</body>

</html>