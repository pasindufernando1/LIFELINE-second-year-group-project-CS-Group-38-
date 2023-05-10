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



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/feedback_active.php'); ?>

    <!-- Popup -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/includes/delete_feedback_popup.php'); ?>

    <div class="rate-campaign-box">
        <?php echo '<h2 class="rate-camp">' .
            $_SESSION['selected_campname'] .
            '</h2>'; ?>
        <div class="viewrating">
            <p class="p11">Your Rating</p>
            <div class="view-stars">
                <?php
                $rating = $_SESSION['selected_camprating']['Rating'];
                for ($i = 0; $i < $rating; $i++) {
                    echo '<img src="../../../public/img/donordashboard/yellow_star.png" alt="star">';
                }
                for ($i = 0; $i < 5 - $rating; $i++) {
                    echo '<img src="../../../public/img/donordashboard/grey_star.png" alt="star">';
                }
                ?>

            </div>
            <p id="exper">Your Experience : </p>
            <?php echo '<div class="feedback-read"><p>' . $_SESSION['selected_camprating']['Feedback'] ?>
            </p>
        </div>

            <div class="rate_btn_view">
            <?php echo '<a href="editrating?camp=' .$_SESSION['selected_campid'] .'">Edit Rating</a>
                <a href="remove_rating?camp=' .$_SESSION['selected_campid'] .'" onclick="showPopup(event)">Delete Rating</a>'; ?>
            </div>

        </div>
    </div>


    <script>
        function showPopup(event) {
            console.log(event.target.href);

            event.preventDefault(); // prevent following the link
            var popup = document.querySelector(".popup");
            popup.style.display = "block"; // show the pop-up box
            var yesButton = document.querySelector(".yes-button");
            yesButton.onclick = function () {
                window.location.href = event.target.href; // follow the link
            };
            var noButton = document.querySelector(".no-button");
            noButton.onclick = function () {
                popup.style.display = "none"; // hide the pop-up box
            };
        }

        function hidealert() {
            var popup = document.querySelector(".popup");
            popup.style.display = "none";
        }
    </script>


</body>

</html>