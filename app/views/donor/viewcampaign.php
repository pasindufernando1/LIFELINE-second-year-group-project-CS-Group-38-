<?php 
$_SESSION['selected_campid'] = $_GET['camp'];
// print_r($_SESSION['selected_campid']);
// die();
// print_r($_SESSION['campaign_array1']);
// die();
// print_r($_GET['camp']);
// die();
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
            <div class="view-campaign-side-bar">
                <div class="side-nav">
                    <div class="dashboard menu-items">
                        <div class="dashboard-marker"></div>
                        <img src="./../../public/img/donordashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-active"><a href="/donoruser/dashboard">Dashboard</a></p>
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
                        <img src="./../../public/img/donordashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="reservation-non-active " src="./../../public/img/donordashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav "><a href="/getcampaign">Campaigns</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>
                    
                    <?php 
                        if($_SESSION['if_registered']==0){
                            echo '<div class="view-campaign-box">
                            <h1>Donation Campaign : '.($_SESSION['campaign_array'][0]).'</h1>
                            <p>Organized By : '.($_SESSION['org_name']).'</p>
                            <p>Date : '.($_SESSION['campaign_array'][3]).'</p>
                            <p>Starting Time : '.($_SESSION['campaign_array'][4]).'</p>
                            <p>Ending Time : '.($_SESSION['campaign_array'][5]).'</p>
                            <p>Location : '.($_SESSION['campaign_array'][1]).'</p>
                            <p>Number of Beds : '.($_SESSION['campaign_array'][2]).'</p>
                            <a href="/getcampaign/reg_to_campaign?camp=' . $_SESSION['selected_campid'] . '"><button class="reg-btn">Register</button>
                            </div>';
                        }
                        else{
                            echo '<div class="div-box">
                            <div class="left-box"> 
                                <h1>Donation Campaign : '.($_SESSION['campaign_array'][0]).'</h1>
                                <p>Organized By : '.($_SESSION['org_name']).'</p>
                                <p>Date : '.($_SESSION['campaign_array'][3]).'</p>
                                <p>Starting Time : '.($_SESSION['campaign_array'][4]).'</p>
                                <p>Ending Time : '.($_SESSION['campaign_array'][5]).'</p>
                                <p>Location : '.($_SESSION['campaign_array'][1]).'</p>
                                <p>Number of Beds : '.($_SESSION['campaign_array'][2]).'</p>
                            </div>
                            <div class="right-box">
                                <h1>Registration Details</h1>
                                <p>Emergency Contact Number : '. $_SESSION['reg_info']['Emergency_contact_no'].'</p>
                                <p>Contact Number : '. $_SESSION['reg_info']['Contact_no'].'</p>
                                <br>
                                <a class="outline-regedit-button" href="/getcampaign/view_campaign_reg?camp=' . $_SESSION['selected_campid'] . '">Update
                                <img src = "./../../public/img/donordashboard/edit-btn.png" class="reg-edit-btn"></a>
                                <a class="outline-regdelete-button" href="/getcampaign/view_campaign_reg?camp=' . $_SESSION['selected_campid'] . '">Delete
                                <img src = "./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
                                </div>';
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
