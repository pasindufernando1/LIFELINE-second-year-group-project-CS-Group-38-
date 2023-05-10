<?php
$metaTitle = 'organizations Dashboard';
$_SESSION['CampID'] = intval($_GET['campaign']);


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
            <?php
            echo '<div class="box">
                        
            <p class="campaign-name">'.($_SESSION['campaign_array'][1]).'</p><br>
                        
                                
                                <img class="nurse-img" src="./../../public/img/orgdashboard/nurse.png" alt="nurse" >
                            
                                <table class="timeslots-table" style="width:40%">
                                <tr>
                                <th>Timeslot ID</th>
                                <th>Starting Time</th>
                                <th>Ending Time</th>
                                
                                <th>Action</th>
                                </tr>
                                
                               

                            </div>';
                            $results_per_page = 7;
                            $number_of_results = $_SESSION['rowCount'];
                            $number_of_page = ceil($number_of_results / $results_per_page);
    
                            //determine which page number visitor is currently on  
                            if (!isset ($_GET['page']) ) {  
                                $page = 1;  
                            } else {  
                                $page = $_GET['page'];  
                            }  
                            //determine the sql LIMIT starting number for the results on the displaying page  
                            $page_first_result = ($page-1) * $results_per_page;  
                            $result = $_SESSION['Scheduled_timeslots'];

                            
                            //print_r($_SESSION['rowCount']);die();
                                //print_r($result);die();
                            if ($number_of_results > 0) {
                                foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                    echo '<div class="table-content-types"> <tr>
                                            <td>' . $row[0]["SlotID"] . "</td>
                                            <td>" . date('h:i A', strtotime($row[0]["Start_time"])) . "</td>
                                            
                                            <td>" . date('h:i A', strtotime($row[0]["End_time"])) . '</td>

                                            

                                            <td> 
                                            
                                            <div class="delete-btn-div"> 
                                                  
                                                <a href="/requestApproval/removeTimeslot?timeSlot='.$row[0]["SlotID"].'"> <button class="dlt-btn" type="button" name="request1" onclick="showPopup(event)" >Remove</a> </button>
                                               
                                            </div>       
                                            
                                            
                                            
                                            </td>
                                            </tr> </div>';                                        
                                }
                            } else {
                                echo '<div class="table-content-types"> <tr>
                                <td> No timeslots available </td>
                                </tr> </div>';
                            }
                            echo '<div class="page-box">';
                                    if (!isset($_GET['page']) || $_GET['page'] == 1) {
                                        echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . 1 . '">&laquo;</a> </div>'; 
                                    } else {
                                        echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . ($_GET['page'] - 1) . '">&laquo;</a> </div>';   
                                    }

                                    for($page = 1; $page <= $number_of_page; $page++) {  
                                        if (!isset($_GET['page'])) {
                                            $current_page = 1;
                                        } else {
                                            $current_page = $_GET['page'];
                                        }
                                        if ($page == $current_page) {
                                            echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . $page . '">' . $page . ' </a> </div>';
                                        } else {
                                            echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . $page . '">' . $page . ' </a> </div>';  
                                        }
                                    }

                                    if (!isset($_GET['page']) || $_GET['page'] == $number_of_page) {
                                        echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . $number_of_page . '">&raquo; </a> </div>';
                                    } else {
                                        echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&page=' . ($_GET['page'] + 1) . '">&raquo; </a> </div>';  
                                    }

                            echo '</div>';
    ?>
    </table>
    <div class="popup">
        <div>
            <p>Are You Sure to Remove the Time Slot?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>


            <img class="close" onclick="hidealert()" src="../../../public/img/orgdashboard/close.png">

        </div>
    </div>
    <script>
    function showPopup(event) {
        // console.log(href);

        event.preventDefault(); // prevent following the link
        var popup = document.querySelector(".popup");
        popup.style.display = "block"; // show the pop-up box
        var yesButton = document.querySelector(".yes-button");
        yesButton.onclick = function() {
            window.location.href = event.target.href; // follow the link
        };
        var noButton = document.querySelector(".no-button");
        noButton.onclick = function() {
            popup.style.display = "none"; // hide the pop-up box
        };
    }

    function hidealert() {
        var popup = document.querySelector(".popup");
        popup.style.display = "none";
    }

    
    </script>


                 
                
               

            
            

</body>

