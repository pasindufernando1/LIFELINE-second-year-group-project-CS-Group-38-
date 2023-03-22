<?php
// print_r($_SESSION['donor_contact']);
// die();

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
    <div class="top-bar">
        <div class="logo">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
        </div>
        <div class="search">
            <img src="./../../public/img/donordashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/donordashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/donordashboard/profilepic.jpg" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo $_SESSION['type']; ?> <br>
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/donordashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/donoruser/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
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
            <div class="reports menu-item">
                <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                    alt="reports">
                <p class="reports-nav "><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns-selected">
                <div class="campaigns-marker"></div>
                <img class="campaigns-active" src="./../../public/img/donordashboard/active/campaigns2.png"
                    alt="campaigns">
                <p class="campaigns-act "><a href="/getcampaign?page=1">Campaigns</a></p>

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



    <div class="timeslot-container">
        <h2>Time Slots</h2>
        <table class="timeslot-table" style="width:90%">
            <tr>
                <th>Time Slot</th>
                <th>Starting Time</th>
                <th>Ending Time</th>
                <th>Action</th>
            </tr>
            <hr class="blood-types-line">
            <div class="table-content-types">
                <tr>
                    <td>01</td>
                    <td>9.00 AM</td>
                    <td>9.30 AM</td>
                    <td><button id="disable">Reserve</button></td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>9.30 AM</td>
                    <td>10.00 AM</td>
                    <td><button><a href="reserve_timeslot">Reserve</a></button></td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>10.30 AM</td>
                    <td>11.00 AM</td>
                    <td><button>Reserve</button></td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>11.30 AM</td>
                    <td>12.00 PM</td>
                    <td><button id="disable">Reserve</button></td>
                </tr>
                <tr>
                    <td>05</td>
                    <td>12.30 PM</td>
                    <td>1.00 PM</td>
                    <td><button id="disable">Reserve</button></td>
                </tr>
                <tr>
                    <td>06</td>
                    <td>1.00 PM</td>
                    <td>1.30 PM</td>
                    <td><button>Reserve</button></td>
                </tr>
                <tr>
                    <td>07</td>
                    <td>1.30 PM</td>
                    <td>2.00 PM</td>
                    <td><button>Reserve</button></td>
                </tr>
                <tr>
                    <td>08</td>
                    <td>2.30 PM</td>
                    <td>3.00 PM</td>
                    <td><button id="disable">Reserve</button></td>
                </tr>
            </div>
        </table>
    </div>
</body>

</html>