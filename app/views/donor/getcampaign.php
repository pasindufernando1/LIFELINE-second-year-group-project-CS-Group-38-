<?php
$metaTitle = 'Donation Campaigns';
?>

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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>


    <!-- filter -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/filter/camp_filter.php'); ?>

    <!-- Registered Campaigns -->
    <?php if (count($_SESSION['registrations']) == 0) {
        echo '<div class="campaign-reg-box">';
    } else {
        echo '<div class="campaign-reg-box" style="height:325px">';
    } ?>

    <h2 class="header2">Registered Campaigns</h2>

    <?php
    $number_of_results = count($_SESSION['registrations']);

    $result = $_SESSION['registrations'];
    $countt = 0;
    if (count($_SESSION['registrations']) > 0) {
        echo '<div class="view-register-container">';
        for ($x = 0; $x < $number_of_results; $x++) {
            $stime = substr($_SESSION['registrations'][$x][0][5], 0, 2);
            $stimeval = intval($stime);
            if ($stimeval > 12) {
                $st = 24 - $stime;
                $_SESSION['registrations'][$x][0][5] =
                    strval($st) . ' PM';
            } else {
                $_SESSION['registrations'][$x][0][5] =
                    strval($stimeval) . ' AM';
            }
            echo '<div class="view-register-card">
                    <div class="campaign-card-left-box">
                        <h3>' .$_SESSION['registrations'][$x][0][1] .'</h3>
                        <p>Starting At :' .$_SESSION['registrations'][$x][0][5] .'<br>
                        On:' .$_SESSION['registrations'][$x][0][4] .'<br>
                        Location:' .$_SESSION['registrations'][$x][0][2] .'<br>
                        </p>
                    </div>
                    <div class="campaign-card-right-box">
                        <a href="/getcampaign/view_campaign?camp=' .$_SESSION['registrations'][$x][0][0] .'"> <button class="register-btn" name="view_camp_info" > View </button> </a>
                        <a href="/getcampaign/view_timeslot?camp=' . $_SESSION['registrations'][$x][0][0] . '"> <button class="register-btn" name="view_camp_info" > Time slot </button> </a>
                    </div>
                 </div>';
        }
        echo '</div>';
    } else {
        echo '<p style="text-indent:20px;">You are not currently registered to any campaign</p>';
    }
    ?>

    </div>
    <?php if (count($_SESSION['registrations']) == 0) {
        echo '<div class="campaign-view-box" style="top:260px;">';
    } else {
        echo '<div class="campaign-view-box">';
    }
    ?>


<!-- Upcoming Campaigns -->
    <h2 class="header2">Upcoming Campaigns</h2>
    <button id="fil-button" onclick="document.getElementById('idfil01').style.display='block'">filter & short<img src="./../../public/img/donordashboard/filter-icon.png"></button>
    <div class="view-campaign-container">
    <?php
        $number_of_results = count($_SESSION['upcoming_campaigns']);
        $result = $_SESSION['upcoming_campaigns'];
        $count = 0;

        if ($number_of_results > 0) {
            foreach ($result as $row) {
                $stime = substr($row['Starting_time'], 0, 2);
                $stimeval = intval($stime);
                if ($stimeval > 12) {
                    $st = 24 - $stime;
                    $row['Starting_time'] = strval($st) . ' PM';
                } else {
                    $row['Starting_time'] = strval($stimeval) . ' AM';
                }
                echo '<div class="view-campaign-card" style="margin-top: 15px; margin-bottom: 5px;">
                        <img src = "./../../public/img/advertisements/' . $_SESSION['camp_ads'][$count][0][0] . '" class="campaign-card-img" alt="campaigns">
                        <div class="campaign-card-bottom">
                            <h3>' . $row['Name'] . '</h3>
                            <p class="campaign-card-info">
                            <b>Starting At : </b>' . $row['Starting_time'] . '<br>
                            <b>On : </b>' . $row['Date'] . '<br>
                            <b>Location : </b>' . $row['Location'] . '<br><br>
                            <a href="/getcampaign/view_campaign?camp=' .$row['CampaignID'] .'" name="view_camp_info"> View more... </a></p>
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


</body>

</html>