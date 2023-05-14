<?php
$metaTitle = "Login";
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/views/layout/header.php');
require_once(__ROOT__ . '/views/layout/navigation.php');


?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/login.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img class="logo-img" src="../../../public/img/logo/logo-horizontal.jpg" alt="">
        <div class="title">
            <p>Blood Banks & Management System</p>
        </div>
        <div class="sub-1">
            <p>Password Changed Successfully !!!</p>
        </div>
        <div class="sub-2">
            <img style="width:120px;margin-left:691px;margin-top:250px" src="../../../public/img/success-msg-img.png" alt="failed">
            <p style="font-size:21px;margin-top:220px"><br><br>
            <!-- <b>Welcome To LIFELINE</b><br><br> -->
            Login to your LIFELINE account with your new credentials</p>
        </div>
        <!-- Create three containers to show 3 user types -->
    </div>

</body>

</html>