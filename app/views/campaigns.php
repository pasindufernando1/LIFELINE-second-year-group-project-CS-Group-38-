<?php
$metaTitle = 'Login';
define('__ROOT__', dirname(dirname(dirname(__FILE__))));
require_once __ROOT__ . '/app/views/layout/header.php';
require_once __ROOT__ . '/app/views/layout/navigation.php';
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/donor/campaigns.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="banner">
            <div class="banner-img">
                <img src=" ../../../public/img/home_img.png" alt="">
                <img class="tint" src="../../../public/img/home_img_tint.png" alt="">
                <div class="ban-con">
                    <p class="b1">
                        Home/Campaigns
                    </p>
                    <p class="b2">
                        Campaigns
                    </p>
                    <!-- <button class="btn-ban"> Register</button> -->
                </div>
            </div>
        </div>
        <div class="t-boxes">
            <div class="box-1">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][0]['Name']?></b>
                        <!-- Give the start time in human readable format with am pm -->
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][0]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][0]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][0]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][0]['BedQuantity']?>
                        
                    </p>
                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][0][0]['Advertisement_Pic']; ?>" alt="advertisement">

            </div>
            <div class="box-2">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][1]['Name']?></b>
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][1]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][1]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][1]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][1]['BedQuantity']?>
                    </p>

                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][1][0]['Advertisement_Pic']; ?>" alt="advertisement">
            </div>
            <div class="box-3">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][2]['Name']?></b>
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][2]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][2]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][2]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][2]['BedQuantity']?>
                    </p>
                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][2][0]['Advertisement_Pic']; ?>" alt="advertisement">
            </div>
            <div class="box-4">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][3]['Name']?></b>
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][3]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][3]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][3]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][3]['BedQuantity']?>
                    </p>

                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][3][0]['Advertisement_Pic']; ?>" alt="advertisement">
            </div>
            <div class="box-5">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][4]['Name']?></b>
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][4]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][4]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][4]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][4]['BedQuantity']?>
                    </p>

                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][4][0]['Advertisement_Pic']; ?>" alt="advertisement">
            </div>
            <div class="box-6">
                <div>
                    <p class="box-p"><b><?php echo $_SESSION['upcoming_campaigns'][5]['Name']?></b>
                        <br>Starting At : <?php echo date('h:i A', strtotime($_SESSION['upcoming_campaigns'][5]['Starting_time']))?>
                        <br>Date : <?php echo $_SESSION['upcoming_campaigns'][5]['Date']?>
                        <br>Location : <br><?php echo $_SESSION['upcoming_campaigns'][5]['Location']?>
                        <br>Bed Count : <?php echo $_SESSION['upcoming_campaigns'][5]['BedQuantity']?>
                    </p>

                </div>
                <img src="./../../public/img/advertisements/<?php echo $_SESSION['camp_ads'][5][0]['Advertisement_Pic']; ?>" alt="advertisement">
            </div>
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