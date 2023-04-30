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
            <p>Registration Unsuccessful !!!</p>
        </div>
        <div class="sub-2">
            <img style="width:120px;margin-left:691px;margin-top:250px" src="../../../public/img/unsuccess-msg-img.jpg" alt="failed">
            <p style="font-size:21px;margin-top:220px">It Seems Your Health conditions are Not suitable for Donating Blood<br><br>
            <b>Thank you For Your Time and Enthusiasm.</b><br><br>
            You can help us immensly by spreading the word about LifeLine</p>
        </div>
        <!-- Create three containers to show 3 user types -->
    </div>

</body>

</html>