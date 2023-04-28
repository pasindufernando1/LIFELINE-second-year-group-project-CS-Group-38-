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
        <!-- <div class="rate-box"> -->
        <form action="/ratecampaign/update_rating" method="post" id="feedback-form">
            <p class="p1">Rate Campaign</p>
            <div class="stars do_rate" id="star_rating">
                <!-- radio buttons with Star image in lable  -->
                <?php
                if ($_SESSION['selected_camprating']['Rating'] == NULL) {
                    for ($i = 1; $i <= 5; $i++) {
                        echo '<input type="radio" name="rating" value="' . $i . '" id="in-star' . $i . '">
                    <label for="in-star' . $i . '"><img class="rating_star" id="star' . $i . '" onclick="change_stars(' . $i . ')" src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>';
                    }
                } else {
                    for ($i = 1; $i <= $_SESSION['selected_camprating']['Rating']; $i++) {
                        echo '<input type="radio" name="rating" value="' . $i . '" id="in-star' . $i . '">
                    <label for="in-star' . $i . '"><img class="rating_star" id="star' . $i . '" onclick="change_stars(' . $i . ')" src="./../../public/img/donordashboard/yellow_star.png" alt="star"></label>';
                    }
                    for ($i = $_SESSION['selected_camprating']['Rating'] + 1; $i <= 5; $i++) {
                        echo '<input type="radio" name="rating" value="' . $i . '" id="in-star' . $i . '">
                    <label for="in-star' . $i . '"><img class="rating_star" id="star' . $i . '" onclick="change_stars(' . $i . ')" src="./../../public/img/donordashboard/grey_star.png" alt="star"></label>';
                    }
                }
                ?>
            </div>
            <label for="fb" class="p2">Describe Your Experience</label>

            <textarea id="message" name="fb"><?php echo $_SESSION['selected_camprating']['Feedback'] ?></textarea>
            <br>
            <button type="submit">Submit</button>
            <script src="../../../public/js/star-ratings.js">
            </script>
        </form>
    </div>

</body>

</html>