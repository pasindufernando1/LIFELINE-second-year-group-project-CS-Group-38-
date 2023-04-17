<?php
$_SESSION['selected_campid'] = $_GET['camp'];
$metaTitle = 'Donor Feedback';

// print_r($_SESSION['selected_campname']);
// die();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

    <!-- CSS Files -->
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <!-- <script src="../../../public/js/star-ratings.js"></script> -->



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/donor/layout/header.php'); ?>


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
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

            </div>
            <div class="feedback menu-item">
                <div class="feedback-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/reports.png" alt="reports">
                <p class="reservation-act"><a href="/ratecampaign/feedback_page">Feedback</a></p>

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

    <div class="rate-campaign-box">
        <?php echo '<h2 class="rate-camp">' .
            $_SESSION['selected_campname'] .
            '</h2>'; ?>
        <!-- <div class="rate-box"> -->
        <form action="/ratecampaign/send_rating" method="post" id="feedback-form">
            <p class="p1">Rate Campaign</p>
            <div class="stars do_rate" id="star_rating">
                <!-- radio buttons with Star image in lable  -->
                <input type="radio" name="rating" value="1" id="in-star1">
                <label for="in-star1"><img class="rating_star" id="star1" onclick="change_stars(1)"
                        src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>
                <input type="radio" name="rating" value="2" id="in-star2">
                <label for="in-star2"><img class="rating_star" id="star2" onclick="change_stars(2)"
                        src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>
                <input type="radio" name="rating" value="3" id="in-star3">
                <label for="in-star3"><img class="rating_star" id="star3" onclick="change_stars(3)"
                        src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>
                <input type="radio" name="rating" value="4" id="in-star4">
                <label for="in-star4"><img class="rating_star" id="star4" onclick="change_stars(4)"
                        src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>
                <input type="radio" name="rating" value="5" id="in-star5">
                <label for="in-star5"><img class="rating_star" id="star5" onclick="change_stars(5)"
                        src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>
            </div>
            <label for="fb" class="p2">Describe Your Experience</label>

            <textarea id="message" name="fb"></textarea>
            <br>
            <button type="submit">Submit</button>
            <script src="../../../public/js/star-ratings.js">
            </script>
        </form>
    </div>

</body>

</html>