<?php 

$metaTitle = "Admin Dashboard" 
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
    <div class="top-bar">
        <div class="logo">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
        </div>
        <div class="search">
            <img src="./../../public/img/admindashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/admindashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/admindashboard/pasindudp.jpg" alt="profile-pic">
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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/admindashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/adminuser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard menu-items">
                        <div class="marker"></div>
                        <img src="./../../public/img/admindashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-active"><a href="#">Dashboard</a></p>


                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active" src="./../../public/img/admindashboard/non-active/reservation.png" alt="reservation">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reservation.png" alt="reservation">
                        <p class="reservation-nav menu-item"><a href="#">Reserves</a></p>

                    </div>
                    <div class="users menu-item">
                        <img src="./../../public/img/admindashboard/non-active/cards.png" alt="donor-cards">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/cards.png" alt="donor-cards">
                        <p class="users-nav "><a href="/usermanage/type?page=1">Users</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/admindashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/inventory.png" alt="inventory">
                        <p class="inventory-nav "><a href="#">Inventory</a></p>

                    </div>
                    <div class="donors menu-item">
                        <img src="./../../public/img/admindashboard/non-active/donors.png" alt="donors">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/donors.png" alt="donors">
                        <p class="donors-nav menu-item"><a href="#">Donors</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/admindashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reports.png" alt="reports">
                        <p class="reports-nav "><a href="#">Reports</a></p>

                    </div>
                    <div class="campaigns menu-item">
                        <img src="./../../public/img/admindashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav "><a href="#">Campaigns</a></p>

                    </div>
                     <div class="badges menu-item">
                        <img src="./../../public/img/admindashboard/non-active/badge.png" alt="badges">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/badge.png" alt="campaigns">
                        <p class="badges-nav "><a href="#">Badges</a></p>

                    </div>
                    <div class="advertisements menu-item">
                        <img src="./../../public/img/admindashboard/non-active/ad.png" alt="advertisements">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/ad.png" alt="campaigns">
                        <p class="advertisements-nav "><a href="#">Advertisements</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/admindashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>

                </div>

            </div>


        </div>

    </div>

</body>
</html>