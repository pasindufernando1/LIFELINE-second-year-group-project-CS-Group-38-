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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>

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
            <div class="instructionBox">
                
                <h2 class="instructions-title" >Instructions for organizing a Blood Donation Campaign</h2>
                <div class="instructionsB">
                <!-- <img class="instru-img" src="./../../public/img/orgdashboard/instructions.png" alt="req" width=100%> -->
                
                    
</div>
                <ul class="ins-points">

                    <li>By organizing a blood donation campaign, you can give your society a chance to donate blood. It is not that difficult or expensive to organize a campaign in your area or work place.</li>
                    <br>
                    <li>The date of the donation campaign can be decided by the organizers.</li>
                    <br>
                    <li>The first step to planning a blood drive is to find a suitable location, such as a public square or a community center.</li>
                    <br>
                    <li>Contact a blood bank to provide support and assistance with the campaign. The blood bank can provide trained staff, equipment, and supplies needed for the campaign.</li>
                    <br>
                    <li>A few points to keep in mind: a comfortable waiting area for donors, likely weather conditions on the day and easy access to parking or public transport.</li>
                    <br>
                    <li>You should be responsible for providing equipment such as tables, chairs and trash cans, along with drinks and refreshments. </li>
                    <br>
                    <li>Ensure that all safety and hygiene protocols are in place and followed. This includes screening donors for eligibility, disinfecting surfaces and equipment, and using personal protective equipment.</li>
                    <br>
                    <li>The equipments and beds required for blood drawing will be provided by the blood bank.</li>
                    <br>
                    <li>Once you’ve got a date and place set it’s time to recruit some volunteers. </li>
                    <br>
                    <li>To make things easier, add a note in your community newsletter and take advantage of relevant social media channels and also you can use this website for advertising about your campaign and sending notifications to nearby donors.</li>
                    <br>
                    <li>Follow up with donors after the campaign to thank them for their donation and encourage them to donate again in the future.</li>

                </ul>
                </div>
            </div>