<?php 

$metaTitle = "Organizations Dashboard" ;
require '../vendor/payment_config.php';

// print_r($_SESSION['past_donations'][2][0]);
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

    <style>
    .ad-holder {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-items: center;
        margin: 0 4%;
        margin-left: 2%;
        margin-right: 1%;
        background: #f7f7f7;
        margin-top: 8%;
        overflow-x: auto;
        border: #e8e8e8 solid 1px;
        border-radius: 6px;
    }

    .ad-card {
        width: 347px;
        height: 630px;
        background-color: #fff;
        border-radius: 10px;
        margin: 20px 0;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        /* display: flex; */
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
        float: left;
        margin-left: 20px;
        font-family: 'Poppins';
    }

    .ad-img {
        width: 347px;
        height: 341px;
        border-radius: 10px 10px 0 0;
    }

    .ad-box {
        box-sizing: border-box;
        position: absolute;
        width: 1540px;
        /* height: 797px; */
        left: 316px;
        top: 127px;
        background: #ffffff;
        border: 1.81193px solid #ECEEF7;
        border-radius: 6px;
    }

    .ad-card h2 {
        font-size: 21px;
        font-weight: 600;
        color: #000000;
        margin-top: 20px;
        margin-bottom: 10px;
        text-align: center;
    }

    .ad-card p {
        text-indent: 15px;
    }

    .ad-card a {
        margin-top: 13%;
        margin-right: auto;
        margin-left: auto;
        background: #640e0b;
        border-radius: 6px;
        color: white;
        height: 38px;
        display: flex;
        width: 59%;
        align-items: center;
        justify-content: center;
    }
    </style>

</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>


            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard-non menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/dashboard.png" alt="campaigns">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard">Dashboard</a>
                        </p>
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
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule
                                time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications">
                        <img class="notifications-non-active"
                            src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations"> -->
                        <img class="cash-donations-active"
                            src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-act "><a href="/requestApproval/donateCash">Cash donations</a></p>
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
                <p class="view-campaigns-title">Past Cash Donations</p>
                <!-- <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id01').style.display='block'">Filter & Short</a>
                <img class="user-filter-img" src="./../../public/img/orgdashboard/filter-icon.png" alt="reservation-filter-img">    -->
                <table class="campaigns-table" style="width:80%">
                    <tr>
                        
                        <th>Date</th>
                        <th>Your Donation (LKR)</th>
                        <th>Amount Requested (LKR)</th>
                        <th>BloodBank </th>
                    </tr>
                    <hr class="campaigns-line">
                    <?php 
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['past_donations'][0]);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                        //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['past_donations'];

                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types">
                                          <tr>
                                              <td>' . $row["Date"] . '</td>
                                              <td>' . $row["Amount"] . '</td>
                                              <td>' . $row["Total_amount"] . '</td>
                                              <td>' . $row["BloodBank_Name"] . '</td>
                                          </tr>
                                      </div>';
                                      
                            }
                        }    
                        else {
                            echo '<div class="table-content-types"> <tr>
                                <td> No Cash Donations Yet </td>
                                </tr> </div>';
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

                </table>


            </div>
</body>

</html>