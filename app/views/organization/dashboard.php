<?php

$metaTitle = 'Organizations Dashboard';
// print_r(sizeof($_SESSION['campaignsList']));
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
    <link href="../../../public/css/organization/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard menu-item">
                        <div class="marker"></div>
                        <img src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-active"><a href="#">Dashboard</a></p>
                    </div>

                    <div class="campaigns menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png"
                            alt="campaigns">
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>

                    <div class="schedule-time menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active"
                            src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule time</a></p>
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
                            src="./../../public/img/orgdashboard/active/inventory donations.png" alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewAdvertisements">Inventory </a></p>
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
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile/">Profile</a></p>
                    </div>

                </div>

            </div>
            <div class="box">

                 <img class="dashboard-img" src="./../../public/img/banner.png" alt="req" width=100%>
                <p class="welcome">Welcome to <br>
                    <img class="welcome-image" src="./../../public/img/hospitalsdashboard/logo.jpg" alt="dashboard_img">
                </p>

            </div>

            <div class="box1">
                <p class="box1-title">Upcoming Blood Donation Campaigns<br>
                <div class="nearby_bb">

                    <?php
                    //$results_per_page = 7;
                    $_SESSION['rowCount'] = sizeof($_SESSION['campaignsList']);
                    //$number_of_results = $_SESSION['rowCount'];
                    //$number_of_page = ceil($number_of_results / $results_per_page);

                    //determine which page number visitor is currently on
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    //determine the sql LIMIT starting number for the results on the displaying page
                    //$page_first_result = ($page-1) * $results_per_page;
                    $result = $_SESSION['campaignsList'];
                    //print_r($result);die();
                    $count = 0;
                    if ($_SESSION['rowCount'] > 0) {
                        foreach ($result as $row) {
                            $count++;
                            if ($count > 3) {
                                break;
                            }
                            //display the link of the pages in URL

                          

                                            echo ' <div class="bb">
                                            <p class="bbn">' .$row['Name'] .'</p>
                                            <p class = "bbd">
                                                    Date : 
                                                    ' . $row['Date'] . '
                                                    <br>
                                                    Location : 
                                                    ' . $row['Location'] . '      
                                            </p>

                                            </div>';
                            // print_r($result[0]);die();
                        }
                    } else {
                        echo '<div class="error">No campaigns found</div>';
                        
                    }


                    ?>
                </div>


                </p>
            </div>
            <div class="box2">
                <p class="box2-title">Advertisements</p>
                    <!-- <a><img class="r-arrow-img" src="./../../public/img/orgdashboard/right-arrow.jpg"
                            alt="dashboard"></a> -->
                    <a href="/requestApproval/viewAdvertisements"><img class="dash-img"
                            src="./../../public/img/orgdashboard/dash-ad.jpg" alt="dashboard"></a>
                   <!--  <a><img class="l-arrow-img" src="./../../public/img/orgdashboard/left-arrow.jpg"
                            alt="dashboard"></a> -->
            </div>

            <div class="box3">
            <p class="box1-title">Past Blood Donation Campaigns<br>
                <div class="nearby_bb">

                    <?php
                    //$results_per_page = 7;
                    $_SESSION['rowCount'] = sizeof($_SESSION['PastCampaignsList']);
                    //$number_of_results = $_SESSION['rowCount'];
                    //$number_of_page = ceil($number_of_results / $results_per_page);

                    //determine which page number visitor is currently on
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }
                    //determine the sql LIMIT starting number for the results on the displaying page
                    //$page_first_result = ($page-1) * $results_per_page;
                    $result = $_SESSION['PastCampaignsList'];
                    //print_r($result);die();
                    $count = 0;
                    if ($_SESSION['rowCount'] > 0) {
                        foreach ($result as $row) {
                            $count++;
                            if ($count > 3) {
                                break;
                            }
                            //display the link of the pages in URL

                          

                                            echo ' <div class="bb">
                                            <p class="bbn">' .$row['Name'] .'</p>
                                            <p class = "bbd">
                                                    Date : 
                                                    ' . $row['Date'] . '
                                                    <br>
                                                    Location : 
                                                    ' . $row['Location'] . '      
                                            </p>

                                            </div>';
                            // print_r($result[0]);die();
                        }
                    } else {
                        echo '<div class="error">No campaigns found</div>';
                        
                    }


                    ?>
                </div>


                </p>
            

            </div>
        

</body>

</html>