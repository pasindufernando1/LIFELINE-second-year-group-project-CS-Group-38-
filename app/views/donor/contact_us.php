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

    <div class="contact-container">
        <p>Find Blood Bank Contact Information</p>
        <form id="bb_search">
            <select class="bloodbank-input" type="text" name="bloodbank" autofocus placeholder=" " required>
                <option value="" disabled selected hidden>Choose a Blood Bank</option>
                <option value="Akkaraipattu">Akkaraipattu</option>
                <option value="Ampara">Ampara</option>
                <option value="Dehiatthakandiya">Dehiatthakandiya</option>
                <option value="Kalmunai AM(S)">Kalmunai AM(S)</option>
                <option value="Kalmunai Base(N)">Kalmunai Base(N)</option>
                <option value="Mahaoya">Mahaoya</option>
                <option value="Sammanthurai">Sammanthurai</option>
                <option value="Medirigiriya">Medirigiriya</option>
                <option value="Padaviya">Padaviya</option>
                <option value="Polonnannva">Polonnannva</option>
                <option value="Badulla">Badulla</option>
                <option value="Thambuttegama">Thambuttegama</option>
                <option value="Bibila">Bibila</option>
                <option value="Diyatalawa">Diyatalawa</option>
                <option value="Monaragala">Monaragala</option>
                <option value="Welimada">Welimada</option>
                <option value="Wellawaya">Wellawaya</option>
                <option value="Batticaloa">Batticaloa</option>
                <option value="Valachchenai">Valachchenai</option>
                <option value="Avissawella">Avissawella</option>
                <option value="CIM">CIM</option>
                <option value="Homagama">Homagama</option>
                <option value="Karawenella">Karawenella</option>
                <option value="CNTH">CNTH</option>
                <option value="Gampaha">Gampaha</option>
                <option value="Kalpitiya">Kalpitiya</option>
                <option value="Marawila">Marawila</option>
                <option value="Negambo">Negambo</option>
                <option value="Puttalam">Puttalam</option>
                <option value="Wathupitiwala">Wathupitiwala</option>
                <option value="Welisara">Welisara</option>
                <option value="Jaffna">Jaffna</option>
                <option value="Mollaitivu">Mollaitivu</option>
                <option value="Karapitiya">Karapitiya</option>
                <option value="Point Pedro">Point Pedro</option>
                <option value="Thellippallai">Thellippallai</option>
                <option value="Horana">Horana</option>
                <option value="Kalpitiya">Kalpitiya</option>
                <option value="Kalutara">Kalutara</option>
                <option value="Kethumathie">Kethumathie</option>
                <option value="Panadura">Panadura</option>
            </select>
            <br>
            <!-- <button type="submit">Search</button> -->
            <a href="/contactus/getcontact">Search</a>
        </form>
        <script src="./../../public/js/contactus.js"></script>
    </div>
</body>

</html>