<?php
$metaTitle = 'Login';
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/app/views/layout/header.php';
require_once __ROOT__ . '/app/views/layout/navigation.php';
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/organization/aboutUs.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="banner">
            <div class="banner-img">
                <img src=" ../../../public/img/home_img.png" alt="">
                <img class="tint" src="../../../public/img/home_img_tint.png" alt="">
                <div class="ban-con">
                    <p class="b1">
                        Home/About
                    </p>
                    <p class="b2">
                        About Us
                    </p>
                    <!-- <button class="btn-ban"> Register</button> -->
                </div>
            </div>
        </div>
        <div class="t-boxes">
            <div class="about-us">
                <img src=" ../../../public/img/hospital.png" alt="">
                <!-- <p id="p1">Services Offered By Our System</p> -->
                <p class="welcome-title">WELCOME TO LIFELINE</p>
                <p class="name-title">Blood Banks and Donation Management System</p>
                <ul>
                    <li>Blood Donation</li>
                    <li>Inventory Management</li>
                    <li>Campaign Management</li>
                    <li>Well Prepared User Portals</li>
                </ul>
                <p class="des">A Blood Bank And Donation Management System is a software application designed to
                    automate
                    and manage the processes involved in collecting, testing, storing, and distributing blood. This
                    system
                    helps streamline the donation process, maintain accurate blood inventory levels, and improve the
                    overall
                    efficiency of blood banks. It also helps track donor information and maintain a database of blood
                    donors
                    and their blood type, ensuring that the right blood type is available for transfusion to patients in
                    need.</p>
            </div>
            <!-- <img class="aboutUs-img" src="../../../public/img/hospital.png" alt="">
            <p class="welcome-title">WELCOME TO LIFELINE</p>
            <p class="name-title">Blood Banks and Donation Management System</p>
            <ul class="services-list">
                <li>Blood Donation</li>
                <li>Inventory Management</li>
                <li>Campaign Management</li>
                <li>Well Prepared User Portals</li>
            </ul>
            <p class="des">A Blood Bank And Donation Management System is a software application designed to automate
                and manage the processes involved in collecting, testing, storing, and distributing blood. This system
                helps streamline the donation process, maintain accurate blood inventory levels, and improve the overall
                efficiency of blood banks. It also helps track donor information and maintain a database of blood donors
                and their blood type, ensuring that the right blood type is available for transfusion to patients in
                need.</p> -->
        </div>



        <!-- <div class="camp">
            <div class="head">
                <p class="ph1">Better information, Better health</p>
                <p class="ph2">Campaigns</p>

            </div>

            <div class="campbox">
                <div class="campbox1">
                    <img class="box-img" src="../../../public/img/camp.png" alt="">
                    <div class="campbox1-d">
                        <p class="box1-p1">Monday 05, September 2021 | By Author</p>
                        <p class="box1-p2">This Article’s Title goes Here,
                            but not too long.</p>
                    </div>
                </div>

                <div class="campbox2">
                    <img class="box-img" src="../../../public/img/camp.png" alt="">
                    <div class="campbox1-d">
                        <p class="box1-p1">Monday 05, September 2021 | By Author</p>
                        <p class="box1-p2">This Article’s Title goes Here,
                            but not too long.</p>
                    </div>
                </div>

                <div class="campbox3">
                    <img class="box-img" src="../../../public/img/camp.png" alt="">
                    <div class="campbox1-d">
                        <p class="box1-p1">Monday 05, September 2021 | By Author</p>
                        <p class="box1-p2">This Article’s Title goes Here,
                            but not too long.</p>
                    </div>
                </div>

                <div class="campbox4">
                    <img class="box-img" src="../../../public/img/camp.png" alt="">
                    <div class="campbox1-d">
                        <p class="box1-p1">Monday 05, September 2021 | By Author</p>
                        <p class="box1-p2">This Article’s Title goes Here,
                            but not too long.</p>
                    </div>
                </div>

            </div>

            <div class="getin">
                <div class="getin-head">
                    <p class="gp1">Get in touch</p>
                    <p class="gp2">Contact</p>

                </div>

                <div class="contact-details">
                    <div class="phone">

                        <img src="../../../public/img/g1.png" alt="Phone icon">
                        <h3>Phone</h3>
                        <p>+94112369931-4</p>
                    </div>
                    <div class="locations">
                        <img src="../../../public//img/g2.png" alt="Location icon">
                        <h3>Location</h3>
                        <p>Colombo 00500</p>
                        <p>Sri Lanka</p>
                    </div>
                    <div class="email">
                        <img src="../../../public/img/g3.png" alt="Email icon">
                        <h3>Email</h3>
                        <p>info@nbts.health.gov.lk</p>
                    </div>
                    <div class="clock">
                        <img src="../../../public/img/g4.png" alt="Clock icon">
                        <h3>Working Hours</h3>
                        <p>Monday-Sunday: 9am-8pm</p>

                    </div>

                </div>

            </div>
        </div> -->
    </div>
    <?php require_once __ROOT__ . '/app/views/layout/footer.php'; ?>
</body>

</html>