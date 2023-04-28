<?php

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
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18978.35308578993!2d79.86704858442475!3d6.890095845054789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a103d225647%3A0xef1259856066f0bf!2sNational%20Blood%20Transfusion%20Service!5e0!3m2!1sen!2slk!4v1675505912760!5m2!1sen!2slk"
        width="1317" height="270"
        style="border:0;position: absolute;z-index: 3;top: 879px;left: 432px;border: 1px solid;border-radius: 6px;"
        allowfullscreen="" loading="lazy">
    </iframe>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/contactus_active.php'); ?>

    <div class="contact-container" style="height:1472px">
        <p>Find Blood Bank Information</p>
        <!-- <> -->
        <p style="position: absolute;top: 145px;font-size: 20px;left: 446px;color: black;font-weight: normal;">Search
            for a blood bank by name</p>
        <form>
            <div class="bb-list">
                <input type="text" placeholder="Search.." id="myInput" onkeyup="myFunction()" onfocus="showDropdown()">
                <div id="myDropdown" class="bb-content">
                    <?php foreach ($_SESSION['bbs'] as $bb) {
                        echo '<a href="/contactus/getcontact?bbid=' . $bb['BloodBankID'] . '">' . $bb['BloodBank_Name'] . '</a>';
                    }
                    ?>
                </div>
            </div>

        </form>

        <p id="nbts-t">National Blood Transfusion Service</p>
        <div class="ab-nbts">
            <div class="ap1">
                <h2 style="text-indent: 20px;">Our Mission</h2>
                <p id="p1">
                    To ensure the quality, safety, adequacy
                    and cost effectiveness
                    of the blood supply
                    and related laboratory, clinical,
                    academic and research services
                    in accordance with national requirements
                    and WHO recommendations.
                </p>
            </div>
            <div>
                <p id="ps">
                    NBTS Sri Lanka proudly anounce that
                    we have 100% voluntory blood donor base.
                    <br>
                    <br>
                    Achievement of this figure is only a dream to all
                    developing countries and most of the developped countries.
                    We as Sri Lankan can be proud of this
                    acheivement just because of your dedication.
                    </br>
            </div>
            <div class="ap2">
                <h2 style="text-indent: 20px;">Our Vision</h2>
                <p id="p2">
                    The main function of NBTS is to collect,
                    process and deliver safe blood,
                    blood components and blood products
                    through 19 cluster centres and
                    77 peripheral blood banks situated
                    island wide
                </p>
            </div>
        </div>

        <h2 class="vus">Visit Us</h2>




        <div class="c-container">
            <p>Contact Information</p>

            <div class="contact-details">
                <div class="phone">
                    <img src="../../../public/img/visitors/phone_icon.png" alt="Phone icon">
                    <h3>Phone</h3>
                    <p>+94112369931-4</p>
                </div>
                <div class="locations">
                    <img src="../../../public/img/visitors/location_icon.png" alt="Location icon">
                    <h3>Location</h3>
                    <p>Colombo 00500</p>
                </div>
                <div class="email">
                    <img src="../../../public/img/visitors/email_icon.png" alt="Email icon">
                    <h3>Email</h3>
                    <p>info@nbts.health.gov.lk</p>
                </div>
                <div class="clock">
                    <img src="../../../public/img/visitors/clock_icon.png" alt="Clock icon">
                    <h3>Working Hours</h3>
                    <p>Monday-Sunday: 9am-8pm</p>

                </div>
            </div>
        </div>
    </div>

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