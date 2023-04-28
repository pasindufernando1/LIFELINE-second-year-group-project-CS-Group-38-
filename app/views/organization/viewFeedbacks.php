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
<?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/filters/rating_filter.php'); ?>
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
                <p class="view-feedbacks-title">View Feedbacks</p>
                <a href="/requestApproval/viewAcceptedCampaigns"><button class="back-btn" type="button"
                        name="request">Back to Campaigns</a></button>
                <a href="#" class="ash-button1 reservation-filter" onclick="document.getElementById('id01').style.display='block'">Filter & Short</a>
                <img class="user-filter-img1" src="./../../public/img/orgdashboard/filter-icon.png" alt="reservation-filter-img">   
                <table class="feedbacks-table" style="width:90%">
                    <tr>

                        <th>Name of the Donor</th>
                        <th>Date</th>
                        <th>Feedback</th>
                        <th>Rating</th>

                    </tr>
                    <hr class="feedbacks-line">
                    <?php 
                    $status = false;
                    if(isset($_SESSION['is_filtered'])){
                        $status = $_SESSION['is_filtered']? 'true' : 'false';
                    }else{
                        $status = 'false';
                    }
                       $results_per_page = 7;
                       
                       $number_of_results = count($_SESSION['feedbacks']);
                       
                       $number_of_page = ceil($number_of_results / $results_per_page);
                       
                       //determine which page number visitor is currently on  
                       if (!isset ($_GET['page']) ) {  
                           $page = 1;  
                       } else {  
                           $page = $_GET['page'];  
                       }  
                       //determine the sql LIMIT starting number for the results on the displaying page  
                       $page_first_result = ($page-1) * $results_per_page;  
                       
                       $result = $_SESSION['feedbacks'];
                       
                       if ($number_of_results  > 0) {
                             foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                           
                                    echo '<div class="table-content-types"> 
                                    <tr>
                                         <td>' . $row["Fullname"]. "</td>
                                            <td>" . $row["Date"]. "</td>
                                         <td>" . $row["Feedback"] . "</td>
                                            <td>" . $row["Rating"] . '</td>
                                    </tr>
                                </div>';
                                }
                        } 
                        else {
                            echo '0 results';
                        }
                        echo '<div class="pag-box">';
if (!isset($_GET['page']) || $_GET['page'] == 1) {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . 1 . '">&laquo;</a> </div>'; 
} else {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . ($_GET['page'] - 1) . '">&laquo;</a> </div>';   
}
for($page = 1; $page <= $number_of_page; $page++) {  
    if (!isset($_GET['page'])) {
        $current_page = 1;
    } else {
        $current_page = $_GET['page'];
    }
    if ($page == $current_page) {
        echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';
    } else {
        echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';  
    }
}
if (!isset($_GET['page']) || $_GET['page'] == $number_of_page) {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . $number_of_page . '">&raquo; </a> </div>';
} else {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?campaign='.$_GET['campaign'].'&filter='.$status.'&page=' . ($_GET['page'] + 1) . '">&raquo; </a> </div>';  
}
echo '</div>';
?>

                </table>


            </div>


        </div>

    </div>

</body>

</html>