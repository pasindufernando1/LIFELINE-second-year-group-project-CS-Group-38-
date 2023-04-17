<?php
// print_r($_SESSION['badges'][1][0]);
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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



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
            <div class="inventory menu-item">
                <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                    alt="inventory">
                <p class="inventory-nav "><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badge menu-item">
                <div class="badge-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/badge.png" alt="campaigns">
                <p class="reservation-act"><a href="/badges">Badges</a></p>

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

    <div class="badges-container">

        <div class="latest">
            <h2>Your Newest Badge</h2>
            <div>
                <img onclick="showalert('<?php echo $_SESSION['newest_badge']; ?>')"
                    src="../../../public/img/badges/<?php echo $_SESSION['newest_badge']; ?>">
            </div>
        </div>

        <div class="clickon">
            <p>Donate Blood To Earn More BADGES!!</p>
            <p>Click On the BADGES to know More About Them</p>
        </div>

        <div class="your">
            <h2>Your Badges</h2>
            <div class="content">
                <?php
                foreach ($_SESSION['badges'] as $badge) {
                    echo '<div><img onclick="showalert(\'' . $badge[0] . '\')" src="../../../public/img/badges/' . $badge[0] . '"></div>';
                }
                ?>
            </div>
        </div>
        <div class="yet">
            <h2>Yet to Earn</h2>
            <div class="content">
                <?php
                foreach ($_SESSION['yet_badges'] as $badge) {
                    echo '<div><img onclick="showalert(\'' . $badge[0] . '\')" src="../../../public/img/badges/' . $badge[0] . '"></div>';
                }
                ?>
            </div>
        </div>

        <div id="alertBox" class="hidden">
            <div>
                <img id="alertBadge" src='' alt="badge">
                <p>This Badge is Rewarded For Donating Blood <span class="alertMessage"></span> Times </p>
                <img id="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">
            </div>
        </div>

        <script>
            var badge;

            function showalert(badge) {
                console.log(badge);
                const alertBox = document.getElementById("alertBox");
                const alertBadge = document.getElementById("alertBadge");
                const alertMessage = document.querySelector(".alertMessage");

                // message = badge.split(".")[0];
                <?php foreach ($_SESSION['badge_info'] as $badge) {
                    echo "if(badge == '$badge[0]'){
                    message = '$badge[1]';
                }";
                } ?>

                alertBadge.src = "../../../public/img/badges/" + badge;
                alertMessage.innerText = message;
                alertBox.classList.remove("hidden");

            }

            function hidealert() {
                const alertBox = document.getElementById("alertBox");
                alertBox.classList.add("hidden");
            }
        </script>

    </div>
</body>

</html>