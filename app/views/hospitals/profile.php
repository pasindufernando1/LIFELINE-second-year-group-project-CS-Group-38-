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

                    <div class="requestBlood menu-item">
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/non-active/Request blood.png" alt="requestBlood">
                        <img class="requestBlood-non-active" src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>
                    
                    
                    
                    <div class="profile-selected">
                        <!-- <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="#">Profile</a></p>

                    </div>

                </div>

            </div>
            <?php 
            echo '<div class="box">
                <p class="usr-name">'.($_SESSION['Username']).'</p><br>
                <p class="usr-type">'.($_SESSION['UserType']).'</p><br>

                <label id="hosName-label" class="hosName-label" for="hosName">Hospital Name:</label>
                <br>
                <input class="hosName-input" id="hosName"  type="text" name="hosName" autofocus placeholder="'.($_SESSION['Username']).'" required>
                <br>

                <label id="teleNo-label" class="teleNo-label" for="teleNo">Telephone Number:</label>
                <br>
                <input class="teleNo-input" id="teleNo"  type="text" name="teleNo" autofocus placeholder="'.$_SESSION['telno'].'" required>
                <br>

                <label id="loc-label" class="loc-label" for="loc">Location:</label>
                <br>
                <input class="num-input" id="num"  type="text" name="num" autofocus placeholder="'.$_SESSION['Number'].'" required>
                <br>
                <input class="laneNme-input" id="laneNme"  type="text" name="laneNme" autofocus placeholder="'.$_SESSION['LaneName'].'" required>
                <br>
                <input class="cit-input" id="cit"  type="text" name="cit" autofocus placeholder="'.$_SESSION['City'].'" required>
                <br>
                <input class="dis-input" id="dis"  type="text" name="dis" autofocus placeholder="'.$_SESSION['District'].'" required>
                <br>
                <input class="prov-input" id="prov"  type="text" name="prov" autofocus placeholder="'.$_SESSION['Province'].'" required>
                <br>

                <label id="em-label" class="em-label" for="em">Email Address:</label>
                <br>
                <input class="em-input" id="em"  type="text" name="em" autofocus placeholder="'.$_SESSION['Email'].'" required>
                <br>

                <button class="edit-button" type="submit" name="request" id="submit-btn"><a href="/requestBlood/editProfile/" class="cancel">Edit Profile</button>
            </div>'

            ?>