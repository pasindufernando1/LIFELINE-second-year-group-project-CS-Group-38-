<?php
$_SESSION['selected_campid'] = $_GET['camp'];
$metaTitle = 'Donor Feedback';

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
    <!-- <script src="../../../public/js/star-ratings.js"></script> -->



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/feedback_active.php'); ?>


    <div class="rate-campaign-box">
        <?php echo '<h2 class="rate-camp">' .
            $_SESSION['selected_campname'] .
            '</h2>'; ?>
        <!-- <div class="rate-box">d -->
        <form action="/ratecampaign/send_rating" method="post" id="feedback-form" onsubmit="checkrating(event)">
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

            <p id="rate_error" class="rate-error">You must enter a star rating</p>

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