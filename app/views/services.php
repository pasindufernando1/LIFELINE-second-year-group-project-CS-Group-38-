<?php
$metaTitle = 'Login';
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/app/views/layout/header.php';
require_once __ROOT__ . '/app/views/layout/navigation.php';
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/donor/services.css" rel="stylesheet">

    <!-- font Filea -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

</head>


<body>
    <div class="container">
        <div class="banner">
            <div class="banner-img">
                <img src=" ../../../public/img/home_img.png" alt="">
                <img class="tint" src="../../../public/img/home_img_tint.png" alt="">
                <div class="ban-con">
                    <p class="b1">
                        Home/Services
                    </p>
                    <p class="b2">
                        Services
                    </p>
                    <!-- <button class="btn-ban"> Register</button> -->
                </div>
            </div>
        </div>
        <div class="t-boxes">
            <div class="service">
                <img src=" ../../../public/img/hospital.png" alt="">
                <p id="p1">Services Offered By Our System</p>
                <ul>
                    <li>Connect Organizastions and Societies with Blood Banks</li>
                    <li>Assist organizers to get approval and manage Donation Campaigns</li>
                    <li>Connect Hospitals and Medical Centers with Blood Banks</li>
                    <li>Assist and manage Blood Transfers to Hospitals from Blood Banks</li>
                    <li>Connect Blood donors with Blood Banks and Organizations</li>
                    <li>Enable Blood donors to be more involved partners of their donations</li>
                    <li>Allow Blood donors to be more aware about donation campaigns and manage them</li>
            </div>
        </div>
    </div>
    <?php require_once __ROOT__ . '/app/views/layout/footer.php'; ?>
</body>

</html>