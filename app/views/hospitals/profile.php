<?php 

$metaTitle = "Hospitals Dashboard" 
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

                    <div class="requestBlood menu-item">
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/non-active/Request blood.png" alt="requestBlood">
                        <img class="requestBlood-non-active" src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>
                    
                    
                    
                    <div class="profile-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="#">Profile</a></p>

                    </div>

                </div>

            </div>
            
            
            <div class="box">
            <img class="hospital_img" src="../../../public/img/hospitalsdashboard/hospital logo.png"><br>
            <!-- <img class="change_img" src="../../../public/img/hospitalsdashboard/lil_cam.png"><br> -->
            <?php echo '<p class="usr-name">'.($_SESSION['Username']).'</p><br>
                <p class="usr-type">'.($_SESSION['UserType']).'</p><br>'  ?>
            <div class="main">
                <div class="left">
                <p>
                    Hospital Name
                    <br>
                    <br>
                    Telephone Number
                    <br>
                    <br>
                    Address
                    <br>
                    <br>
                    Email
                    
                </P>
                </div>
                <div class="right">
                <p>
                    <?php echo '<p>
                    : ' .
                    $_SESSION['Username'] .
                        '
                    <br>
                    <br>
                    : ' .
                    $_SESSION['telno'] .
                        '
                    <br>
                    <br>
                    
                    
                    
                    : ' .
                        $_SESSION['Number'] .
                        ', ' .
                        $_SESSION['LaneName'] .
                        ', ' .
                        $_SESSION['City'] .
                        ', ' .
                        $_SESSION['District'] .
                        ', ' .
                        $_SESSION['Province'] .
                        '
                        <br>
                        <br>
                    : ' .
                    $_SESSION['Email'] .
                    '
                    <br>
                    <br>
                        </p>'; ?>
                </P>
            </div>
            <button class="edit-button" type="submit" name="request" id="submit-btn"><a href="/requestBlood/editProfile/" class="cancel">Edit Profile</button>
            </div>   

            