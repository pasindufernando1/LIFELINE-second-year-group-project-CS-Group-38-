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
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/badge_active.php'); ?>


    <div class="badges-container">

        <div class="latest">
            <h2>Your Newest Badge</h2>
            <div>
                <?php if ($_SESSION['newest_badge'] == null) {
                    echo "<p style='text-align:center'>As you Donate Blood, You will Earn Badges<br>
                    The Newest Badge You Earned Will be Displayed Here</p>";
                } else { ?>
                <img onclick="showalert('<?php echo $_SESSION['newest_badge']['BadgePic']; ?>')"
                    src="../../../public/img/badges/<?php echo $_SESSION['newest_badge']['BadgePic']; ?>">
                <p>
                    <?php echo $_SESSION['newest_badge']['Name'] . ' Badge' ?>
                </p>
                <?php } ?>
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
                if ($_SESSION['badges'] == null) {
                    echo "<p style='text-align:center;font-size:20px;font-family:Poppins'>As you Donate Blood, You will Earn Badges<br>
                    The Badges You Earned Will be Displayed Here<br><br>Go to Campaigns to See Upcoming Campaigns </p>";
                } else {
                    foreach ($_SESSION['badges'] as $badge) {
                        echo '<div><img onclick="showalert(\'' . $badge[0] . '\')" src="../../../public/img/badges/' . $badge[0] . '">
                    <p>' . $badge['Name'] . ' Badge</p></div>';
                    }
                }
                ?>
            </div>
        </div>
        <div class="yet">
            <h2>Yet to Earn</h2>
            <div class="content">
                <?php
                foreach ($_SESSION['yet_badges'] as $badge) {
                    echo '<div><img onclick="showalert(\'' . $badge[0] . '\')" src="../../../public/img/badges/' . $badge[0] . '">
                    <p>' . $badge['Name'] . ' Badge</p></div>';
                }
                ?>
            </div>
        </div>

        <div id="alertBox" class="hidden">
            <div>
                <p id="badgeName"></p>
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
            const badgeName = document.getElementById("badgeName");
            const alertMessage = document.querySelector(".alertMessage");

            // message = badge.split(".")[0];
            <?php foreach ($_SESSION['badge_info'] as $badge) {
                    echo "if(badge == '$badge[0]'){
                    message = '$badge[1]';
                    name = '$badge[2]';
                }";
                } ?>

            alertBadge.src = "../../../public/img/badges/" + badge;
            alertMessage.innerText = message;
            badgeName.innerText = name + " Badge";
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