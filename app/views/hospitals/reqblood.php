<?php

$metaTitle = "Hospitals Dashboard";
// print_r("blood button");
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
    <link href="../../../public/css/hospitals/requestBlood.css" rel="stylesheet">

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
            <img src="../../../public/img/hospitalsdashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/hospitalsdashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/hospitalsdashboard/hospital logo.png" alt="profile-pic">
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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/hospitaluser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                    <div class="dashboard menu-item">       
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard"> 
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="requestBlood-selected">
                        <div class="marker"></div>
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/active/request blood.png" alt="requestBlood">
                        <p class="requestBlood-act"><a href="#">Request Blood</a></p>
                    </div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/requestBlood/viewProfile">Profile</a></p>
                    </div>    
                </div>
            </div>
            <div class="box">
                <p class ="reqb-head">Choose Here</p>
                        <button class = "reqb-button"><a href="/requestBlood/viewDetails">Request Blood</a></button>
                        <button class = "reqbstatus-button"><a href="/requestBlood/viewRequests">View Status Of Requested Blood</a></button>
                </div>


        </div>

    </div>

</body>
</html>