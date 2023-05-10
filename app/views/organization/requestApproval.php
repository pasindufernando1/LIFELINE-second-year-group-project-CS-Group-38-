<?php 
//print_r($_SESSION['User_ID']);die();
$_SESSION['bloodbankID']=intval($_GET['bloodbank']);
// print_r(gettype($_SESSION['bloodbankID']));die();
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
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard/">Dashboard</a>
                        </p>
                    </div>

                    <div class="campaigns-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns"> -->
                        <img class="campaigns-active" src="./../../public/img/orgdashboard/active/campaigns.png"
                            alt="campaigns">
                        <p class="campaigns-act"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>

                    <div class="schedule-time menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active"
                            src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule
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
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>
                </div>
            </div>
            <div class="box">
                <h2 class="add-user-title"> Request for Approval of Donation Campaign</h2>
                <form action="/requestApproval/addRequest/" method="post" id="requestform">
                
                    <label id="campName-label" class="campName-label" for="campName">Campaign Name:</label>
                    <br>
                    <input class="campName-input" id="campName" type="text" name="campName" autofocus
                        placeholder="Campaign Name" required>
                    <br>

                    <label id="date-label" class="date-label" for="date">Date:</label>
                    <br>
                    <input class="date-input" id="date" type="date" name="date" autofocus placeholder="Date" required>
                    <br>

                    <label id="startTime-label" class="startTime-label" for="startTime">Starting Time:</label>
                    <br>
                    <input class="startTime-input" id="startTime" type="time" name="startTime" autofocus placeholder="Starting Time" required>
                    <br>
                    <label id="endTime-label" class="endTime-label" for="endTime">Ending Time:</label>
                    <br>
                    <input class="endTime-input" id="endTime" type="time" name="endTime" autofocus placeholder="Ending Time" required>
                    <br>

                    <label id="location-label" class="location-label" for="location">Location:</label>
                    <br>
                    <input class="location-input" id="location-input" type="text" name="location" autofocus placeholder="Location" required>
                    <br>
                    <label id="beds-label" class="beds-label" for="beds">Number of Beds:</label>
                    <br>
                    <input class="beds-input" id="beds" type="text" name="beds" autofocus placeholder="Number of Beds"
                        required>
                    <br>
                    <label id="donors-label" class="donors-label" for="donors">Number of Donors:</label>
                    <br>
                    <input class="donors-input" id="donors" type="text" name="donors" autofocus placeholder="Number of Donors" required>

                    <button class='brown-button' type='submit' name='request' id="submit-btn-request">Request</button>

                    <button class='outline-button' type='reset' name='cancel-adding'><a href="/requestApproval/viewDetails/" class="cancel">Cancel Adding</a></button>

                    <script src="../../../public/js/validation/orgvalidation.js"></script>            
                </form>
            </div>


        </div>

    </div>

</body>

</html>