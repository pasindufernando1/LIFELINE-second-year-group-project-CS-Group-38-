<?php
$_SESSION['selected_campid'] = $_GET['camp'];
$metaTitle = 'Donation Campaign';
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

    <!-- Popup -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/includes/reg_popup.php'); ?>

    <?php
    // If the current user is registered to the campaign
    ?>
    <?php if ($_SESSION['if_registered'] == 0) {
        if ($_SESSION['time_okay'] == 1) { 
            echo '<div class="view-campaign-box">
                    <p class="campaign-head">' .$_SESSION['campaign_array'][1] .'</p><br>
                    <p class="campaign-details">
                        Organized By : ' .$_SESSION['org_name'] .'<br><br>
                        Date : ' .$_SESSION['campaign_array'][4] .'<br><br>
                        Starting Time : ' .$_SESSION['campaign_array'][5] .'<br><br>
                        Ending Time : ' .$_SESSION['campaign_array'][6] .'<br><br>
                        Location : ' .$_SESSION['campaign_array'][2] .'<br><br>
                        Number of Beds : ' .$_SESSION['campaign_array'][3] .
                    '</p><br>
                    <a href="/getcampaign/reg_to_campaign?camp=' .$_SESSION['selected_campid'] .'"><button class="to-reg-btn">Register</button>
                    <img src="./../../public/img/advertisements/' . $_SESSION['campaign_ad'] . '" class="campaign-img" alt="campaigns">
                   </div>';
        } else {
            echo '<div class="view-campaign-box">
                <p class="campaign-head">' .$_SESSION['campaign_array'][1] .'</p><br>
                <p class="campaign-details">Organized By : ' .$_SESSION['org_name'] .
                '<br><br>
                    Date : ' .$_SESSION['campaign_array'][4] .'<br><br>
                    Starting Time : ' .$_SESSION['campaign_array'][5] .'<br><br>
                    Ending Time : ' .$_SESSION['campaign_array'][6] .'<br><br>
                    Location : ' .$_SESSION['campaign_array'][2] .'<br><br>
                    Number of Beds : ' .$_SESSION['campaign_array'][3] .'</p><br>
                <p class="no-reg-1" style="">You can donate BLOOD Once in 4 Months...</p>
                <p class="no-reg-2" style="">Seems You have donated OR registered to donate in 4 months to This Campaign</p>
                <img src="./../../public/img/advertisements/' . $_SESSION['campaign_ad'] . '" class="campaign-img" alt="campaigns">
                </div>';
        }
    }
    // If the current user is registered to the campaign
    elseif ($_SESSION['if_registered'] == 1) {
        echo '<div class="view-camp-div-box">
                <div class="left-box">
                    <div class="left-head">
                        <h1>' .$_SESSION['campaign_array'][1] .'</h1>
                    </div>
                    <div class="left-q">
                        <p>Organized By<br>
                        <p>Date<br>
                        <p>Starting Time<br>
                        <p>Ending Time<br>
                        <p>Location<br>
                        <p>Number of Beds</p>
                    </div>
                    <div class="right-a">
                        <p> : ' .$_SESSION['org_name'] .'<br>
                        <p> : ' .$_SESSION['campaign_array'][4] .'<br>
                        <p> : ' .$_SESSION['campaign_array'][5] .'<br>
                        <p> : ' .$_SESSION['campaign_array'][6] .'<br>
                        <p> : ' .$_SESSION['campaign_array'][2] .'<br>
                        <p> : ' .$_SESSION['campaign_array'][3] .'</p>
                    </div>
                </div>
                <div class="right-box">
                    <div class="left-head">
                        <h1>Registration Details</h1>
                    </div>
                    <div class="r-left-q">
                        <p>Emergency Contact Number </br>
                        <p>Contact Number </p>
                    </div>
                    <div class="r-right-a">
                        <p> : ' .$_SESSION['reg_info'][0] .' </br>
                        <p>: ' .$_SESSION['reg_info'][1] .'</p>
                    </div>
                    <br>
                    <a class="outline-regedit-button" href="updatereg">Update<img src="./../../public/img/donordashboard/edit-11-32.png" class="reg-edit-btn"></a>
                    <a class="outline-regdelete-button" href="deletereg"  onClick="showPopup(event)">Cancel<img src="./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
                </div>';
    } ?>
    </div>

    <script src="../../../public/js/donor/reg.js"></script>
</body>

</html>