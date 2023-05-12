<?php 

$metaTitle = "Unattended Feedbacks" 
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
    <link href="../../../public/css/admin/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/includes/feedback_review_complete.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/filters/feedbacks_filter.php'); ?>


    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard menu-items">
                <div class="marker"></div>
                <img src="./../../public/img/admindashboard/active/dashboard.png" alt="dashboard">
                <p class="dashboard-active"><a href="/user/dashboard?page=1">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/admindashboard/non-active/reservation.png" alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reservation.png" alt="reservation">
                <p class="reservation-nav menu-item"><a href="/reserves/type?page=1">Reserves</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/admindashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/cards.png" alt="donor-cards">
                <p class="users-nav "><a href="/usermanage/type?page=1">Users</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/admindashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/inventory.png" alt="inventory">
                <p class="inventory-nav "><a href="/inventory/type?page=1">Inventory</a></p>

            </div>
            <div class="donors menu-item">
                <img src="./../../public/img/admindashboard/non-active/donors.png" alt="donors">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/donors.png" alt="donors">
                <p class="donors-nav menu-item"><a href="/donors/type?page=1">Donors</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/admindashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reports.png" alt="reports">
                <p class="reports-nav "><a href="/reports/type?page=1">Reports</a></p>

            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/admindashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/campaigns.png" alt="campaigns">
                <p class="campaigns-nav "><a href="/adcampaigns/type?page=1">Campaigns</a></p>

            </div>
                <div class="badges menu-item">
                <img src="./../../public/img/admindashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/badge.png" alt="campaigns">
                <p class="badges-nav "><a href="/adbadges/type?page=1">Badges</a></p>

            </div>
            <div class="advertisements menu-item">
                <img src="./../../public/img/admindashboard/non-active/ad.png" alt="advertisements">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/ad.png" alt="campaigns">
                <p class="advertisements-nav "><a href="/adadvertisements/type?page=1">Advertisements</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/admindashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/profile.png" alt="profile">
                <p class="profile-nav "><a href="/adprofile/">Profile</a></p>

            </div>
        </div>
    </div>
    

    <div class="box">
        <p class="add-user-title">Unattended Feedbacks</p>
                        
                        <a href="#" class="ash-button reservation-filter"onclick="document.getElementById('idfil01').style.display='block'" >Apply Filter</a>
                        <img class="user-filter-img" src="./../../public/img/admindashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="user-types-table" style="width:90%">
                        <tr>
                            <th>Feedback ID</th>
                            <th>Sender</th>
                            <th>Feedback</th>
                            <th>Feedback Date</th>
                            <th>Actions</th>

                        </tr>
                        <hr class="blood-types-line">
                        
                        
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

                        //display the link of the pages in URL  
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> 
                                <tr>
                                        <td>' . $row["FeedbackID"]. "</td>
                                        <td>" . $row["Name"] . "</td>
                                        <td>" . $row["Feedback"] . "</td>
                                        <td>" . $row["Date"] . "</td>";
                                        echo '<td> ' . '<span><a class="verify-btn" onclick="document.getElementById('."'id01'".').style.display='."'block'".';      
                                        document.getElementById('."'del'".').action = '."'/feedbacks/markread/".$row["FeedbackID"]."'".'";
                                        ">Mark as read<img  class="tick" src="./../../public/img/admindashboard/tick.png" alt="tick.png"></a></span>' . '</td>
                                        
                                    </tr> </div>';
                                        
                                        
                            }
                        } 
                        else {
                            echo '<div class="table-content-types"> <tr>
                                    <td>Not available</td>
                                </tr></div>';
                        }
                        echo "</table>";
                        echo '<div class="pag-box">';
                        if ($_GET['page'] == 1) {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . 1 . '">&laquo;</a> </div>'; 
                        }else{
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page-1 . '">&laquo;</a> </div>';   
                        }

                        for($page = 1; $page<= $number_of_page; $page++) {  
                            if ($page == $_GET['page']) {
                                echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';
                            }else{
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';  
                            }
                        }
                        if ($_GET['page'] == $number_of_page) {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $number_of_page . '">&raquo; </a> </div>';
                        }else{
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $_GET['page']+1 . '">&raquo; </a> </div>';  
                        }
                            
                        echo '</div>' ;?>
        
    </div>
                

</body>
</html>