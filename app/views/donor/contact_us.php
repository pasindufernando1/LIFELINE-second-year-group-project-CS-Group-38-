<?php

$metaTitle = 'Donor Dashboard'; ?>

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
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



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
            <div class="contactus menu-item">
                <div class="contactus-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/inventory.png" alt="inventory">
                <p class="reservation-act"><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

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

    <div class="contact-container" style="height:1316px">
        <p>Find Blood Bank Contact Information</p>
        <!-- <> -->
        <p style="position: absolute;top: 145px;font-size: 20px;left: 446px;color: black;font-weight: normal;">Search
            for a blood bank by name</p>
        <form>
            <div class="bb-list">
                <input type="text" placeholder="Search.." id="myInput" onkeyup="myFunction()" onfocus="showDropdown()">
                <div id="myDropdown" class="bb-content">
                    <?php foreach($_SESSION['bbs'] as $bb)
                    {
                        echo '<a href="/contactus/getcontact?bbid='.$bb['BloodBankID'].'">'.$bb['BloodBank_Name'].'</a>';
                    }
                     ?>
                </div>
            </div>

        </form>

        <!-- <p style="font-size: 23px;color: black;position: absolute;top: 210px;left: 712px;">Blood Bank List</p>

        <img class="bbs" src="./../../public/img/donordashboard/cluster_bb.png" alt="search"> -->

        <script>
        var dropdown = document.getElementById("myDropdown");
        dropdown.style.display = "none";


        function myFunction() {
            var input, filter, div, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            if (filter) {
                div.style.display = "block"; // Show the dropdown content
            } else {
                div.style.display = "none"; // Hide the dropdown content if no search query
            }
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = ""; // Show the link if it matches the search query
                } else {
                    a[i].style.display = "none"; // Hide the link if it doesn't match the search query
                }
            }

            if (input.value.length == 0) {
                ul.style.display = "block";
            }
        }

        function showDropdown() {
            var dropdown = document.getElementById("myDropdown");
            dropdown.style.display = "block";
            //make display none when click outside the dropdown

        }
        </script>
    </div>
</body>

</html>