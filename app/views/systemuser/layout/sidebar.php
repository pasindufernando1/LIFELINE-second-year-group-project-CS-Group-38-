<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Files -->
    <link href="../../../../public/css/systemuser/sidebar.css" rel="stylesheet">
</head>
<body>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?> 
    <div class="side-bar">
                <div class="side-nav">
                    <div class="selected"></div>
                    <div class="dashboard menu-item">
                        <div class="marker"></div>
                        <img class="red-dash" src="./../../public/img/dashboard/active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active menu-item blk-dash"  src="../../../public/img/dashboard/non-active/dashboard.png" alt="dashboard">
                        <p class="dashboard-active menu-item"><a href="/systemuser/dashboard">Dashboard</a></p>


                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active blk-res" src="./../../public/img/dashboard/non-active/reservation.png" alt="reservation">
                        <img class="reservation-non-active red-res" src="./../../public/img/dashboard/active/reservation.png" alt="reservation">
                        <p class="reservation-nav menu-item"><a href="/reservation?page=1">Reservation</a></p>

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
                        <img class="blk-profile" src="./../../public/img/dashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active red-profile" src="./../../public/img/dashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/profile">Profile</a></p>

                    </div>
                    

                </div>

            </div>
</body>
</html>
