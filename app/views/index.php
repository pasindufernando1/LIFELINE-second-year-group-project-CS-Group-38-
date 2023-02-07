<?php
    $metaTitle = "Login" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/app/views/layout/header.php');
    require_once(__ROOT__.'/app/views/layout/navigation.php');   
?>
<html lang="en">
    <head>
        <!-- CSS Files -->
        <link href="../../../public/css/contactus.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <img src="../../../public/img/visitors/contact_us.png" alt="contact-us">
            <p>Contact Us</p>
        </div>
        <h1 class="visit-us-heading">Visit Us</h1>
        <div class="map-container">
        <!-- <iframe src="https://www.google.com/maps/d/embed?mid=1imitUZHLJx3wJzshXtOP23JXcmjS0BQ&ehbc=2E312F" width="640" height="480"></iframe> -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d18978.35308578993!2d79.86704858442475!3d6.890095845054789!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a103d225647%3A0xef1259856066f0bf!2sNational%20Blood%20Transfusion%20Service!5e0!3m2!1sen!2slk!4v1675505912760!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="get-in-touch-container">
        <p>Get in Touch</p>
        </div>
        <div class="contact-container">
            <p>Contact Information</p>
        </div>
        <div class="contact-details">
            <div class="phone">
                <img src="../../../public/img/visitors/phone_icon.png" alt="Phone icon">
                <h3>Phone</h3>
                <p>+94112369931-4</p>
            </div>
            <div class="locations">
                <img src="../../../public/img/visitors/location_icon.png" alt="Location icon">
                <h3>Location</h3>
                <p>Colombo 00500</p>
                <p>Sri Lanka</p>
            </div>
            <div class="email">
                <img src="../../../public/img/visitors/email_icon.png" alt="Email icon">
                <h3>Email</h3>
                <p>info@nbts.health.gov.lk</p>
            </div>
            <div class="clock">
                <img src="../../../public/img/visitors/clock_icon.png" alt="Clock icon">
                <h3>Working Hours</h3>
                <p>Monday-Sunday: 9am-8pm</p>

            </div>
        </div>
        <!-- Footer -->
        <footer class="footer-container">
            <div class="footer-section company">
                <h4>Life Line</h4>
                <p>Leading the Way in Medical Excellence, Trusted Care.</p>
            </div>
            <div class="footer-section links">
                <h4>Important Links</h4>
                <ul>
                <li><a href="#">Donations</a></li>
                <li><a href="#">Register</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">About Us</a></li>
                </ul>
            </div>
            <div class="footer-section contact">
                <h4>Contact Us</h4>
                <p>Call: (237) 681-812-255</p>
                <p>Email: fildineesoe@gmail.com</p>
                <p>Address: 0123 Some place</p>
                <p>Some country</p>
            </div>
            <div class="footer-section findus">
                <h4>Find Us</h4>
                <div class="social-media">
                <a href="#">
                <img src="../../../public/img/visitors/insta.png" alt="Instagram Icon">
                </a>
                <a href="#">
                <img src="../../../public/img/visitors/linkedin.png" alt="LinkedIn Icon">
                </a>
                <a href="#">
                <img src="../../../public/img/visitors/facebook.png" alt="Facebook Icon">
                </a>
                </div>
            </div>
            <hr>
            <div class="footer-section end">
                <p>&copy;All Rights Reserved by Group 38</p>
            </div>
            <a href="admin/login/"><button class="login-btn">Login</button></a>
            
        </footer>
    </body>
</html>



