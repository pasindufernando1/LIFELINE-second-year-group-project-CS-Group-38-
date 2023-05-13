<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

     <!-- CSS Files -->
    <link href="../../../../public/css/hospitals/header.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
</head>
<body>
    <div class="top-bar">
        <a href="/">
            <div class="logo">
                <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
            </div>
        </a>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']); ?>" alt="profile-pic">
            </div>
            <div class="user">
                <p class="user-name"><?php echo ($_SESSION['username']); ?></p>
                <p class="role-type"><?php echo ($_SESSION['type']); ?></p>
            </div>
            
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/dashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="/requestBlood/viewProfile">Profile</a>
                    <a href="/adminuser/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

    


    

