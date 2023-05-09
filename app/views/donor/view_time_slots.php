<?php

$metaTitle = 'Campaign Timeslots'; ?>
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



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>




    <div class="timeslot-container">
        <h2>Time Slots of
            <?php echo $_SESSION['camp_info']['Name'] ?>
        </h2>
        <table class="timeslot-table" style="width:90%">
            <tr>
                <th>Time Slot</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Action</th>
            </tr>
            <hr class="blood-types-line">
            <div class="table-content-types">
                <?php
                $count = 0;
                foreach ($_SESSION['camp_timeslots'] as $timeslot) {
                    $stime = substr($_SESSION['timeslot_period'][$count][0], 0, 2);
                    $mins = substr($_SESSION['timeslot_period'][$count][0], 3, 2);

                    $stimeval = intval($stime);
                    if ($stimeval >= 12) {
                        $st = 24 - $stime;
                        //appent minutes next to the time
                        if ($mins == 00) {

                            $_SESSION['timeslot_period'][$count][0] = strval($st) . ' PM';
                        } else {
                            $_SESSION['timeslot_period'][$count][0] = strval($st) . ':' . $mins . ' PM';
                        }
                    } else {
                        if ($mins == 00) {
                            $_SESSION['timeslot_period'][$count][0] = strval($stimeval) . ' AM';
                        } else {
                            $_SESSION['timeslot_period'][$count][0] = strval($stimeval) . ':' . $mins . ' AM';
                        }

                    }
                    $etime = substr($_SESSION['timeslot_period'][$count][1], 0, 2);
                    $mins = substr($_SESSION['timeslot_period'][$count][1], 3, 2);
                    $etimeval = intval($etime);
                    if ($etimeval >= 12) {
                        $et = 24 - $etime;
                        if ($mins == 00) {
                            $_SESSION['timeslot_period'][$count][1] = strval($et) . ' PM';
                        } else {
                            $_SESSION['timeslot_period'][$count][1] = strval($et) . ':' . $mins . ' PM';
                        }
                    } else {
                        if ($mins == 00) {
                            $_SESSION['timeslot_period'][$count][1] = strval($etimeval) . ' AM';
                        } else {
                            $_SESSION['timeslot_period'][$count][1] = strval($etimeval) . ':' . $mins . ' AM';
                        }
                    }

                    if ($_SESSION['reserved_timeslots'][$count] == $_SESSION['beds']) {
                        echo '<tr>
                    <td>' . $timeslot[0] . '</td>
                    <td>' . $_SESSION['timeslot_period'][$count][0] . '</td>
                    <td>' . $_SESSION['timeslot_period'][$count][1] . '</td>
                    <td><button id="disable">Reserve</button></td>
                </tr>';
                    } else {
                        echo '<tr>
                    <td>' . $timeslot[0] . '</td>
                    <td>' . $_SESSION['timeslot_period'][$count][0] . '</td>
                    <td>' . $_SESSION['timeslot_period'][$count][1] . '</td>
                    <td><button><a href="/getcampaign/reserve_timeslot?slotid=' . $timeslot[0] . '&stime=' . $_SESSION['timeslot_period'][$count][0] . '&etime=' . $_SESSION['timeslot_period'][$count][1] . '" >Reserve</a></button></td>
                </tr>';
                    }

                    $count++;
                }

                ?>
            </div>
        </table>
    </div>
</body>

</html>