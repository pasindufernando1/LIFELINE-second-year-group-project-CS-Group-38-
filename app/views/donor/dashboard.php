<?php

$metaTitle = 'Donor Dashboard';
// print_r($_SESSION['camp_ads'][2][0][0]);
// die();

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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/dashboard_active.php'); ?>


    <div class="container">
        <p class="dash-p">
            Hello
            <?php echo $_SESSION['username']; ?>

        </p>
        <p class="dash-wp">Welcome to LIFELINE</p>
        <button onclick="scrollToDiv()">Learn More About Donating</button>


    </div>

    <script>
    function scrollToDiv() {
        console.log("scrolling");
        var div = document.getElementById("see-more-container");
        var offset = 100;
        var bodyRect = document.body.getBoundingClientRect().top;
        var elementRect = div.getBoundingClientRect().top;
        var elementPosition = elementRect - bodyRect;
        var offsetPosition = elementPosition - offset;

        window.scrollTo({
            top: offsetPosition,
            behavior: "smooth"
        });
    }
    </script>

    <div class="dash-ad">
        <?php
        // print_r($_SESSION['upcoming_campaigns'][0][0]);
        echo '<a><img class="r-arrow-img" src="./../../public/img/donordashboard/right-arrow.jpg" alt="dashboard"></a>';
        $count = 0;

        echo '<a id="adid" href="/getcampaign/view_campaign?camp=' . $_SESSION['upcoming_campaigns'][$count][0] . '"><img class="dash-img"
                src="./../../public/img/advertisements/' . $_SESSION['camp_ads'][$count][0][0] . '" alt="dashboard"></a>';
        echo '<a><img class="l-arrow-img" src="./../../public/img/donordashboard/left-arrow.jpg" alt="dashboard"></a>';
        ?>
    </div>

    <script>
    // Initialize the count variable
    var count = 0;

    // Get a reference to the image element
    var image = document.querySelector('.dash-img');

    // Get a reference to the ad ID element
    var adId = document.getElementById('adid');

    // Get a reference to the left arrow image element
    var leftArrow = document.querySelector('.l-arrow-img');

    // Add an event listener to the left arrow image element
    leftArrow.addEventListener('click', function() {
        // Increment the value of count by 1
        count++;
        console.log(count);
        // Update the image source based on the value of count
        image.src = './../../public/img/advertisements/' + <?php echo json_encode($_SESSION['camp_ads']); ?>[
            count][0][0];
        // var campaignId = <?php echo $_SESSION['upcoming_campaigns'][$count][0]; ?>;
        // var link = "/getcampaign/view_campaign?camp=" + campaignId;
        adId.href = "/getcampaign/view_campaign?camp=" +
            <?php echo json_encode($_SESSION['upcoming_campaigns']); ?>[count][0];
    });

    // Get a reference to the right arrow image element
    var rightArrow = document.querySelector('.r-arrow-img');

    // Add an event listener to the right arrow image element
    rightArrow.addEventListener('click', function() {
        // Decrement the value of count by 1
        count--;
        console.log(count);
        // Update the image source based on the value of count
        image.src = './../../public/img/advertisements/' + <?php echo json_encode($_SESSION['camp_ads']); ?>[
            count][0][0];
        adId.href = "/getcampaign/view_campaign?camp=" +
            <?php echo json_encode($_SESSION['upcoming_campaigns']); ?>[count][0];
    });
    </script>

    <div class="dash-div-container">

        <div class="dash-div">
            <img style="width:63px;" src="../../public/img/donordashboard/drop.jpg" alt="donate">
            <?php if ($_SESSION['no_of_donations'] == 0) {
                echo "<p>Thank You<br> For Joining With Us<br> to <br>Donate Blood And Save Lives</p>";
            } else {
                echo '<p>Your Last Donation Was<br><span id="r"> ' . $_SESSION['days_last_donation'] . '</span> Days Ago<br><br>';
                if ($_SESSION['days_last_donation'] < 56) {
                    echo 'You Can Donate Blood Again In<br><span> ' . (56 - $_SESSION['days_last_donation']) . '</span> <br>Days</p>';
                } else {
                    echo 'You Can Donate Blood <span>Now</span></p>';
                }

            }
            ?>
        </div>


        <div class="dash-div">
            <img style="width:100px;" src="../../public/img/donordashboard/crowd.png" alt="donate">
            <p>100% of Sri Lankan blood donors are voluntory non rermunerated donors.</p>
        </div>

        <div class="dash-div">
            <img style="width:100px;" src="../../public/img/donordashboard/people.png" alt="donate">
            <?php if ($_SESSION['total_donated_amount'] == 0) {
                echo "<p>Your precious donation of blood can save as many as 3 lives</p>
            ";
            } else {
                echo "<p>Your precious donation of blood can save as many as 3 lives</p>";


            } ?>
        </div>

        <div class="dash-div">
            <img style="width:100px;" src="../../public/img/donordashboard/clock.png" alt="donate">
            <?php if ($_SESSION['total_donated_amount'] == 0) {
                echo "<p>You can donate blood in every 4 months time</p>";

            } else {
                echo "<p>You can donate blood in every 4 months time</p>";


            } ?>
        </div>

    </div>

    <div id="dash-camp" class="campaign-view-box">
        <div class="hed">
            <button><a id="see-more" href="/getcampaign">See More</a></button>
            <p>Upcoming Campaigns
            </p>
        </div>
        <div class="view-campaign-container">
            <?php
            $number_of_results = $_SESSION['rowCount'];
            $result = $_SESSION['upcoming_campaigns'];
            $count = 0;
            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    if ($count == 4) {
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
            <img src = "./../../public/img/advertisements/' . $_SESSION['camp_ads'][$count][0][0] . '" class="campaign-card-img" alt="campaigns">
            <div class="campaign-card-bottom">
            <h3>' . $row['Name'] . '</h3>
            <p class="campaign-card-info">
            <b>Starting At : </b>' . $row['Starting_time'] . '<br>
            <b>Location : </b>' . $row['Location'] . '<br>
            <b>At : </b>' . $row['Date'] . '<br><br>
            <a href="/getcampaign/view_campaign?camp=' .
                        $row['CampaignID'] .
                        '" name="view_camp_info"> View more... </a></p>
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
    <div id="see-more-container" class="container2">
        <h2>Things You need to know about Donating Blood in Sri Lanka</h2>
        <div>
            <h3>Who can donate blood?</h3>
            <p>
                The person must fulfill several criteria to be accepted as a blood donor. These criteria are set
                forth
                to
                ensure the safety of the donor as well as the quality of donated blood.</p>

            <h4>Donor Selection Criteria</h4>
            <ul>
                <li>Age above 18 years and below 60 years.</li>
                <li>If previously donated, at least 4 months should be elapsed since the date of previous donation.
                <li>Hemoglobin level should be more than 12g/dL. (this blood test is done prior to each blood
                    donation)
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

            <h5 style=" font-size: 20px;">Please Note:</h5>
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