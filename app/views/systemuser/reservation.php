<?php 
$metaTitle = "System User Reservations" 
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
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    
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
            <img src="./../../public/img/dashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/dashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/dashboard/test-profile.png" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo ($_SESSION['username']); ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo ($_SESSION['type']); ?> <br> <?php echo ($_SESSION['bloodbankname']); ?></p>
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/dashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/user/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard-non menu-item">
                        
                        <img class="" src="./../../public/img/dashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash " src="../../../public/img/dashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/user/dashboard">Dashboard</a></p>


                    </div>
                    <div class="reservation-selected ">
                        <div class="marker"></div>
                        <img class="reservation-active" src="./../../public/img/dashboard/active/reservation.png" alt="reservation">
                        <p class="reservation-act "><a href="/reservation">Reservation</a></p>

                    </div>
                    <div class="donor-cards menu-item">
                        <img src="./../../public/img/dashboard/non-active/cards.png" alt="donor-cards">
                        <img class="reservation-non-active" src="./../../public/img/dashboard/active/cards.png" alt="donor-cards">
                        <p class="cards-nav "><a href="#">Donor Cards</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/dashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/dashboard/active/inventory.png" alt="inventory">
                        <p class="inventory-nav "><a href="#">Inventory</a></p>

                    </div>
                    <div class="donors menu-item">
                        <img src="./../../public/img/dashboard/non-active/donors.png" alt="donors">
                        <img class="reservation-non-active" src="./../../public/img/dashboard/active/donors.png" alt="donors">
                        <p class="donors-nav menu-item"><a href="#">Donors</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/dashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/dashboard/active/reports.png" alt="reports">
                        <p class="reports-nav "><a href="#">Reports</a></p>

                    </div>
                    <div class="campaigns menu-item">
                        <img src="./../../public/img/dashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="reservation-non-active " src="./../../public/img/dashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav "><a href="#">Campaigns</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/dashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/dashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>
                    <div class="box">
                        <p class="add-reservation-title">Blood Reserves</p>
                        
                        <a href="/reservation/add" class="brown-button addnew-reservation">Add Reserves</a>
                        <img class="addbutton-reservation" src="./../../public/img/dashboard/add-button.png" alt="add-button">

                        <a href="/reservation/type?page=1" class="brown-button types-reservation">Types</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/blood-types.png" alt="add-button">

                        <a href="#" class="brown-button expired-stock-btn">Expired Stocks</a>
                        <img class="expired-stocks-img" src="./../../public/img/dashboard/expired-stocks.png" alt="expired-stocks">

                        <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                </div>

            </div>


        </div>

    </div>

</body>
</html>