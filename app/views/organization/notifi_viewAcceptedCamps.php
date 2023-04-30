<?php

$metaTitle = 'organizations Dashboard';
// print_r($_SESSION['accepted_campaigns']);
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">

                    <div class="dashboard-non menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard">Dashboard</a>
                        </p>
                    </div>

                    <div class="campaigns menu-item">
                        <div class="marker"></div>
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png"
                            alt="campaigns">
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere/">Campaigns</a></p>
                    </div>

                    <div class="schedule-time menu-item">

                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active"
                            src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule
                                time</a></p>
                    </div>

                    <div class="notifications-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications"> -->
                        <img class="notifications-active" src="./../../public/img/orgdashboard/active/notifications.png"
                            alt="notifications">
                        <p class="notifications-act "><a href="#">Notifications</a></p>
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
                <p class="view-campaigns-title">View Campaigns</p>

                <table class="campaigns-table" style="width:90%">
                <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Date</th>
                <th>Action</th>
                </tr>
                <hr class="campaigns-line">
                <?php
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
        $result = $_SESSION['upcoming_campaigns'];

        //display the link of the pages in URL

        // print_r($result[0]);die();
        if ($_SESSION['rowCount'] > 0) {
            foreach (
                array_slice(
                    $result,
                    $results_per_page * $page - $results_per_page,
                    $results_per_page
                )
                as $row
            ) {
                
                echo '<div class="table-content-types">
                          <tr>
                              <td>' . $row['Name'] . '</td>
                              <td>' . $row['Location'] . '</td>
                              <td>' . $row['Date'] . '</td>
                              <td> 
                              <a href="/notifications/sendNotifications?campaign='.$row["CampaignID"].'">
                                  <button class="schedule-btn1" type="button" name="request1" id="btn" onclick="showPopup(event)" ">Send</a></button>

                              </td>
                              
                          </tr>
                      </div>';
            }

        } else {
           // echo '0 results';
        }
        echo '<div class="pag-box">';
                    if (!isset($_GET['page']) || $_GET['page'] == 1) {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . 1 . '">&laquo;</a> </div>'; 
                    } else {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . ($_GET['page'] - 1) . '">&laquo;</a> </div>';   
                    }
                    
                    for($page = 1; $page <= $number_of_page; $page++) {  
                        if (!isset($_GET['page'])) {
                            $current_page = 1;
                        } else {
                            $current_page = $_GET['page'];
                        }
                        if ($page == $current_page) {
                            echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';
                        } else {
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';  
                        }
                    }
                    
                    if (!isset($_GET['page']) || $_GET['page'] == $number_of_page) {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $number_of_page . '">&raquo; </a> </div>';
                    } else {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . ($_GET['page'] + 1) . '">&raquo; </a> </div>';  
                    }
                    
                    echo '</div>';
       ?>
       <!-- <script>
        document.getElementById('btn').disabled = true;
//             var button = document.getElementById('btn');
// button.addEventListener('click', function(event){
//    event.target.disabled = true; 


        </script> -->
      
    </table>
    <div class="popup">
        <div>
            <p>Are you sure to send notifications to Donors?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>


            <img class="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">

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



<!-- <script>
    function showConfirmation(campaignId) {
        var confirmed = confirm('Are you sure you want to send this notification?');
        if (confirmed) {
            window.location.href = '/notifications/sendNotifications?campaign=' + campaignId;
        }
    }
    function showConfirmation(campaignId) {
    var confirmationBox = document.createElement('div');
    confirmationBox.classList.add('confirmation-box');

    var confirmationMessage = document.createElement('p');
    confirmationMessage.classList.add('confirmation-message');
    confirmationMessage.innerHTML = 'Are you sure you want to send this notification?';
    confirmationBox.appendChild(confirmationMessage);

    var confirmationButtons = document.createElement('div');
    confirmationButtons.classList.add('confirmation-buttons');

    var confirmButton = document.createElement('button');
    confirmButton.classList.add('confirmation-button', 'confirm');
    confirmButton.innerHTML = 'Confirm';
    confirmButton.addEventListener('click', function() {
        window.location.href = '/notifications/sendNotifications?campaign=' + campaignId;
        confirmationBox.remove();
    });
    confirmationButtons.appendChild(confirmButton);

    var cancelButton = document.createElement('button');
    cancelButton.classList.add('confirmation-button', 'cancel');
    cancelButton.innerHTML = 'Cancel';
    cancelButton.addEventListener('click', function() {
        confirmationBox.remove();
    });
    confirmationButtons.appendChild(cancelButton);

    confirmationBox.appendChild(confirmationButtons);
    document.body.appendChild(confirmationBox);
}

</script> -->

                        

                  

               

          
