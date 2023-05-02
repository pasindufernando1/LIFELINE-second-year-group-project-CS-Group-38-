<?php
$metaTitle = "Login";
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once(__ROOT__ . '/app/views/layout/header.php');
require_once(__ROOT__ . '/app/views/layout/navigation.php');


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
            <p>Welcome to LIFELINE</p>
        </div>
        <div class="sub-2">
            <p>Select the category to proceed sign up</p>
        </div>
        <!-- Create three containers to show 3 user types -->
        <div class="user-type-container">
            <div class="user-type donor">

                <a href="/signup/verify?utype=donor">
                    <img src="../../../public/img/signup/donor-signup.png" alt="">
                    <button>Signup</button>
                    <p>Donor</p>
                </a>
            </div>
            <div class="user-type hospital">

                <a href="/signup/verify?utype=hospital">
                    <img src="../../../public/img/signup/hospital-signup.png" alt="">
                    <button>Signup</button>
                    <p>Hospital/Medical Center</p>
                </a>
            </div>
            <div class="user-type organization">
                <a href="/signup/verify?utype=org">
                    <img src="../../../public/img/signup/org-signup.png" alt="">
                    <button>Signup</button>
                    <p>Organization/Society</p>
                </a>
            </div>
        </div>
    </div>

</body>

</html>