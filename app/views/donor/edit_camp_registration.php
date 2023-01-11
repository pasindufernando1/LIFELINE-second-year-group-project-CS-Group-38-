<?php
//$_SESSION['çamp'] = $_GET['camp'];
// $_SESSION['contno'] = $_SESSION['contno'][0];
// print_r($_SESSION['contno']);
// die();
$metaTitle = 'Donor Campaigns'; ?>

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
                <img src="../../../public/img/donordashboard/profilepic.jpg" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo $_SESSION['type']; ?> <br>
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
                    <div class="dashboard-non menu-item">
                        <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash"
                            src="./../../public/img/donordashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                            alt="reservation">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                            alt="reservation">
                        <p class="reservation-nav menu-item"><a href="#">History</a></p>

                    </div>
                    <div class="users menu-item">
                        <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png"
                            alt="donor-cards">
                        <p class="users-nav "><a href="/usermanage">Donor Card</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                            alt="inventory">
                        <p class="inventory-nav "><a href="#">Contact Us</a></p>

                    </div>
                    <div class="badges menu-item">
                        <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                        <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                            alt="campaigns">
                        <p class="badges-nav "><a href="#">Badges</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                            alt="reports">
                        <p class="reports-nav "><a href="#">Feedback</a></p>

                    </div>
                    <div class="campaigns-selected">
                        <div class="campaigns-marker"></div>
                        <img class="campaigns-active" src="./../../public/img/donordashboard/active/campaigns2.png"
                            alt="campaigns">
                        <p class="campaigns-act "><a href="/getcampaign?page=1">Campaigns</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

                    </div>
                    <div class="reg-edit-box">
                        <form action="/getcampaign/editreg" method="post" id="donor-form">

                            <p class="edit-reg-title">Edit Campaign Registration</p>
                            <label class="reg-lable-cont-no " for="contno">Contact Number: </label>
                            <br />
                            <input class="edit-contno" id="contno" type="text" name="contno" autofocus value="<?php echo $_SESSION[
                                'reg_info'
                            ][1]; ?> " required>
                            <p class="contno-error" id="contno-error"></p>

                            <label class="reg-lable-emcont-no " for="emcontno">Emergency Contact Number: </label>
                            <br />
                            <input class="edit-emcontno" id="emcontno" type="text" name="emcontno" autofocus value="<?php echo $_SESSION[
                                'reg_info'
                            ][0]; ?>" placeholder="Emergency Contact Number" required>
                            <p class="emcontno-error" id="emcontno-error"></p>
                            <button class="regedit-button" type="submit" name="reg-edit">Save Changes
                                <img src="./../../public/img/donordashboard/edit-btn.png" class="reg-edit-btn"></button>
                            <a class="regcancel-button" href="cancel_edit">Cancel Editing
                                <img src="./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
                        </form>
                        <script src="../../../public/js/validation/donoruservalidation.js"></script>


                    </div>


                </div>

            </div>


        </div>

    </div>

</body>

</html>