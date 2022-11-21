<?php 

$metaTitle = "Donor Dashboard" 
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
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

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
            <img src="./../../public/img/donordashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/donordashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/donordashboard/pasindudp.jpg" alt="profile-pic">
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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/donordashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/donoruser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard menu-item">
                        <img src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png" alt="reservation">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png" alt="reservation">
                        <p class="reservation-nav menu-item"><a href="#">History</a></p>

                    </div>
                    <div class="users menu-item">
                        <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png" alt="donor-cards">
                        <p class="users-nav "><a href="/usermanage">Donor Card</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png" alt="inventory">
                        <p class="inventory-nav "><a href="#">Contact Us</a></p>

                    </div>
                    <div class="badges menu-item">
                        <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                        <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png" alt="campaigns">
                        <p class="badges-nav "><a href="#">Badges</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png" alt="reports">
                        <p class="reports-nav "><a href="#">Feedback</a></p>

                    </div>
                    <div class="campaigns menu-item">
                        <div class="marker"></div>
                        <img src="./../../public/img/donordashboard/active/campaigns.png" alt="campaigns">
                        <img class="reservation-act " src="./../../public/img/donordashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav "><a href="/getcampaign?page=1">Campaigns</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>
                    <div class="box">
                        <p class="add-reservation-title">Donation Campaigns</p>
                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Donation Campaign</th>
                            <th>Date</th>
                            <th>Stating Time</th>
                            <th>Ending Time</th>
                            <th>Action</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
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
                        $result = $_SESSION['upcoming_campaigns'];
                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($_SESSION['rowCount'] > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["CampaignID"]. "</td>
                                        <td>" . $row["Date"] . "</td>
                                        <td>" . $row["Starting_time"] . "</td>
                                        <td>" . $row["Ending_time"] . '</td>
                                        <td> <a href="/getcampaign/view_campaign?camp='.$row["CampaignID"].'"> <button class="register-btn" > View </button> </a> </td>
                                    </tr> </div>';
                                
                            }
                        } else {
                            echo "0 results";
                        }
                        echo '<div class="pag-box">';
                        if ($_GET['page'] == 1) {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . 1 . '">&laquo;</a> </div>'; 
                        }else{
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page-1 . '">&laquo;</a> </div>';   
                        }
                  
                        for($page = 1; $page<= $number_of_page; $page++) {  
                            if ($page == $_GET['page']) {
                                echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';
                            }else{
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';  
                            }
                        }
                        if ($_GET['page'] == $number_of_page) {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $number_of_page . '">&raquo; </a> </div>';
                        }else{
                            echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $_GET['page']+1 . '">&raquo; </a> </div>';  
                        }
                          
                        echo '</div>' ;?>
                        
                        </table>
                    </div>
                </div>

            </div>


        </div>

    </div>

</body>
</html>