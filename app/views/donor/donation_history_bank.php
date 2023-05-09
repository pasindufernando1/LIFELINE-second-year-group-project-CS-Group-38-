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
        <h2 class="header2">Your Donations At BloodBanks</h2>

        <div class="content">
            <?php
            $result = $_SESSION['banks'];
            $_SESSION['rowCount'] = sizeof($_SESSION['banks']);
            $count = 0;

            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    echo '<div class="view-campdon-card">
                            <img class="bb-img"src="../../../public/img/bloodbanks/' . $_SESSION['bank_pics'][$count] . '" alt="blood bannk image">
                            <div class="b-info">
                                <h4>' . $_SESSION['bank_names'][$count] . '</h4>
                                <h3>Latest Donation ' . $_SESSION['latest_bank_donation_amounts'][$count] . ' ml At ' . $_SESSION['latest_bank_donation_dates'][$count] . '</h3>
                                <p>
                                    <b>Your Total Donations :</b> ' . $_SESSION['bank_donation_total_amounts'][$count] . '</p>
                                    <h3>Past Donations</h3>
                                    <div class="past-donations">';
                    $d_count = 0;
                    foreach ($_SESSION['past_bank_donations'][$count] as $dates) {
                        echo '<p>' . $_SESSION['past_bank_donation_amounts'][$count][$d_count] . ' ml <b>Donated On </b> ' . $dates . '<br></p>';
                        $d_count++;
                    }

                    echo '</div>
                            </div>
                         </div>';

                    $count++;
                }
            } else {
                echo 'You Have Not Yet Donated Blood at a Blood Bank';
            }
            ?>
        </div>

    </div>
    <div class="camp-summary">
        <h2>Summary of Your Donations</h2>
        <?php
        echo '<h3>Total Blood Banks Attended : ' . sizeof($_SESSION['banks']) . '</h3>
              <h3>Number of Donations : ' . $_SESSION['no_of_bank_donations'] . '</h3>
              <h3>Your Total Donations : ' . $_SESSION['total_bank_donation_amount'] . 'ml</h3>
              <h3 id="titt">Complications You Had </h3>';
        $scount = 0;
        //make a table for the complications and the camp they happened at
        if (empty($_SESSION['bank_complications']) != 1) {
            echo '<table id="sumt">
                    <tr>
                        <th>Complication</th>
                        <th>Blood Bank</th>
                        <th>Date</th>
                    </tr>';
            foreach ($_SESSION['bank_complications'] as $complications) {
                echo '<tr>
                        <td>' . $complications[2] . '</td>
                        <td>' . $_SESSION['complication_banks'][$scount] . '</td>
                        <td>' . $complications[1] . '</td>
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