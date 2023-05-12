<?php
$metaTitle = 'organizations Dashboard';
//$_SESSION['CampID'] = intval($_GET['campaign']);
$_SESSION['SlotID'] = intval($_GET['slot']);
//print_r($_SESSION['donorList']);die();
//print_r($_SESSION['SlotID']);die();
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
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png"alt="inventory donations">
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
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/feedback.png"alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/orgdashboard/active/profile.png"alt="profile">
                        <p class="profile-nav "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>
                </div>
            </div>
            
            <?php
            echo '<div class="box">
             <p class="campaign-name">Registered Donors in '.($_SESSION['campaign_array'][1]).' Campaign</p><br>
                <table class="timeslots-table" style="width:40%">
                <img class="nurse-img" src="./../../public/img/orgdashboard/nurse.png" alt="nurse" >
                <tr>
                
                <th>Name of the Donor</th>
                <th>NIC</th>
                <th>Contact Number</th>
                
                </tr>
            </div>';
            
                        $results_per_page = 7;
                        /* $_SESSION['rowCount']=sizeof($_SESSION['donorList']); */
                        //print_r($_SESSION['donorList'][1][0]);die();
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
                        $result = $_SESSION['donorList'];
                        
                        //display the link of the pages in URL  
                         //print_r($result);die() ;
                        //print_r($_SESSION['rowCount']);die();
                        // print_r($result[0]);die();
                        if ($_SESSION['rowCount'] > 0) {
                        
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                
                                echo '<div class="table-content-types"> <tr>
                                        
                                        <td>' .$row['Fullname']. "</td>
                                        <td>" .$row['NIC']. "</td>
                                        <td>" .$row['Contact']. '</td>

                                        
                                        </tr> </div>';  
                                                                            
                            }
                        } 
                        else {
                            echo '<div class="table-content-types"> <tr>
                                <td>No Donors Yet </td>
                                </tr> </div>';
                        }
                        echo '<div class="pag-box1">';
                        if (!isset($_GET['page']) || $_GET['page'] == 1) {
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . 1 . '">&laquo;</a> </div>'; 
                        } else {
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . ($_GET['page'] - 1) . '">&laquo;</a> </div>';   
                        }
                        
                        for($page = 1; $page <= $number_of_page; $page++) {  
                            if (!isset($_GET['page'])) {
                                $current_page = 1;
                            } else {
                                $current_page = $_GET['page'];
                            }
                            if ($page == $current_page) {
                                echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . $page . '">' . $page . ' </a> </div>';
                            } else {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . $page . '">' . $page . ' </a> </div>';  
                            }
                        }
                        
                        if (!isset($_GET['page']) || $_GET['page'] == $number_of_page) {
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . $number_of_page . '">&raquo; </a> </div>';
                        } else {
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?slot='.$_GET['slot'].'&page=' . ($_GET['page'] + 1) . '">&raquo; </a> </div>';  
                        }
                        
                        echo '</div>'; ?>
                </table>

            