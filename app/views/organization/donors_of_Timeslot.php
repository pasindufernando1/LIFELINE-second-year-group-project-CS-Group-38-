<?php
$metaTitle = 'organizations Dashboard';
// $_SESSION['CampID'] = intval($_GET['campaign']);

// print_r('donor info of time slot');
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
                <img src="../../../public/img/hospitalsdashboard/hospital logo.png" alt="profile-pic">
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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png"
                    alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/organizationuser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">

                    <div class="dashboard-non menu-items">
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard/">Dashboard</a>
                        </p>
                    </div>

                    <div class="campaigns menu-item">
                        <div class="marker"></div>
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png"
                            alt="campaigns">
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>

                    <div class="schedule-time-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time"> -->
                        <img class="schedule-time-active" src="./../../public/img/orgdashboard/active/schedule time.png"
                            alt="schedule time">
                        <p class="schedule-time-act "><a href="/requestApproval/chooseHere_scheduleTime">Schedule
                                time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications">
                        <img class="notifications-non-active"
                            src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations">
                        <img class="cash-donations-non-active"
                            src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-nav "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png"
                            alt="inventory donations">
                        <img class="inventory-donations-non-active"
                            src="./../../public/img/orgdashboard/active/inventory donations.png"
                            alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewBloodbanks">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active"
                            src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png"
                            alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Feedback</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>
                </div>
            </div>
            <?php
            echo '<div class="box">
                        
                            <p class="campaign-name">' .
                $_SESSION['campaign_array'][1] .
                '</p><br>
                            
                 <table class="timeslots-donor-table" style="width:40%">
                                <tr>
                                <th>Donor Name</th>
                                <th>Contact Number</th>
                                <th>NIC Number</th>
                                
                                </tr>
                                <tr><td>Sneha Dissanayake</td><td>0702985632</td><td>200077802930</td></tr>
                                <tr><td>Oshadi Dilthara</td><td>0773498765</td><td>200044332256</td></tr>
                                <tr><td>Pasindu Fernando</td><td>077434567</td><td>200066779843</td></tr>
                                <tr><td>Shinthujen Inpagaran</td><td>0712314576</td><td>200022885434</td></tr>
                                <tr><td>Jayani Ranasinghe</td><td>075436789</td><td>200032157890</td></tr>
                                <tr><td>Githmi Niseka</td><td>075643245</td><td>2000462417835</td></tr></table>
                                <button class="btslots"><a href="/requestApproval/viewTimeslots?campaign=3">Back to Time Slots</a></button>
                                

                            </div>';
            //              echo '<div class="box">

            //             <p class="campaign-name">' .
            // $_SESSION['campaign_array'][1] .
            // '</p><br>

            //                 <p class="num-donors">Number of Registered Donors: ' .
            // $_SESSION['campaign_array'][12] .
            // '</p><br>
            //                 <img class="nurse-img" src="./../../public/img/orgdashboard/nurse.png" alt="nurse" >

            //                 <table class="timeslots-table" style="width:40%">
            //                 <tr>
            //                 <th>Timeslot ID</th>
            //                 <th>Starting Time</th>
            //                 <th>Ending Time</th>
            //                 <th>Action</th>
            //                 </tr>

            //             </div>';
            $results_per_page = 7;
            $number_of_results = $_SESSION['rowCount'];
            $number_of_page = ceil($number_of_results / $results_per_page);

            //determine which page number visitor is currently on
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
            //determine the sql LIMIT starting number for the results on the displaying page
            $page_first_result = ($page - 1) * $results_per_page;
            $result = $_SESSION['timeslots'];


?>