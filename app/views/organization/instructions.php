<?php 

$metaTitle = "organizations Dashboard" 

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
    <link href="../../../public/css/organization/requestApproval.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

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
            <img src="../../../public/img/hospitalsdashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/hospitalsdashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
            <img src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo ($_SESSION['username']); ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo ($_SESSION['type']); ?> <br> 
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/organizationuser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                <div class="dashboard-non menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard">Dashboard</a></p>
                    </div>

                    <div class="campaigns menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns"> 
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png" alt="campaigns"> 
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>
                
                    <div class="schedule-time menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time"> 
                        <img class="schedule-time-non-active" src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications"> 
                        <img class="notifications-non-active" src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations">
                        <img class="cash-donations-non-active" src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-nav "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png" alt="inventory donations">
                        <img class="inventory-donations-non-active" src="./../../public/img/orgdashboard/active/inventory donations.png" alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewAdvertisements">Inventory </a></p>
                    </div>

                    <div class="instructions-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions"> -->
                        <img class="instructions-active" src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-act "><a href="#">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>   
                </div>
            </div>
            <div class="box">
                <h2 class="instructions-title" >Instructions for organizing a Blood Donation Campaign</h2>
                <img class="instru-img" src="./../../public/img/orgdashboard/instructions.png" alt="req" width=100%>
                <ul class="ins-points">
                    <li>By organizing a blood donation campaign, you can give your society a chance to donate blood. It is not that difficult or expensive to organize a campaign in your area or work place.</li>
                    <br>
                    <li>The date of the donation campaign can be decided by the organizers.</li>
                    <br>
                    <li>The first step to planning a blood drive is to find a suitable location, such as a public square or a community center.</li>
                    <br>
                    <li>A few points to keep in mind: a comfortable waiting area for donors, likely weather conditions on the day and easy access to parking or public transport.</li>
                    <br>
                    <li>You should be responsible for providing equipment such as tables, chairs and trash cans, along with drinks and refreshments. </li>
                    <br>
                    <li>The equipments and beds required for blood drawing will be provided by the blood bank.</li>
                    <br>
                    <li>Once you’ve got a date and place set it’s time to recruit some volunteers. </li>
                    <br>
                    <li>To make things easier, add a note in your community newsletter and take advantage of relevant social media channels and also you can use this website for advertising about your campaign and sending notifications to nearby donors.</li>
                </ul>
            </div>