<?php
    $metaTitle = "Login" ;
    define('__ROOT__', dirname(dirname(dirname(__FILE__))));
    require_once(__ROOT__.'/app/views/layout/header.php');
    require_once(__ROOT__.'/app/views/layout/navigation.php');

    
?>
<html lang="en">

<head>
    <!-- CSS Files -->
    <link href="../../../public/css/home.css" rel="stylesheet">
</head>


<body>
    <div class="container">
        <div class="banner">
            <img src="../../../public/img/banner.png" alt="">
            <div class="ban-con">
                <p class="b1">
                    Donate for Life
                </p>
                <p class="b2">
                    Be the reason for someone's heartbeat.
                </p>
                <a href="/signup"><button class="btn-ban">Register</button></a>
            </div>
        </div>
        <div class="t-boxes">
            <div class="box-1">
                <a href="/contact"><p class="box-p">Contact Us</p></a>
                <img src="../../../public/img/box1.png" alt="">
            </div>
            <div class="box-2">
                <a href="/services"><p class="box-p2">View Services</p></a>
                <img src="../../../public/img/box2.png" alt="">
            </div>
            <div class="box-3">
                <a href="/signup/verify?utype=org"><p class="box-p">Organization Contributions</p></a>
                <img src="../../../public/img/box3.png" alt="">
            </div>
        </div>

        <div class="about">
            <p class="p1-a">Welcome to LifeLine</p>
            <p class="p2-a">Blood Bank Management System</p>
            <p class="p3-a">Your Lifesaving Blood Donation Solution! Our website connects 
                blood donors with blood banks and hospitals, 
                providing a user-friendly platform for easy registration, appointment scheduling, and efficient blood donation management. Join us in our mission to save lives by becoming a part of LIFELINE today!</p>
            <div class="learn">
                <a href="/aboutus"> Learn More</a>
                <img src="../../../public/img/arrow.png" alt="">

            </div>
        </div>

        <div class="camp">
            <div class="head">
                <p class="ph1">Better information, Better health</p>
                <p class="ph2">Contribute To The Needful</p>

            </div>

            <div class="campbox">
                <?php if(count($_SESSION['advertsements_home'])> 2){
                    $count = 0;
                    foreach ($_SESSION['advertsements_home'] as $ad) {
                        if($count >=2){
                            break;
                        }
                        echo '
                        <div class="adc">
                        <img src="./../../public/img/advertisements/'.$ad['Advertisement_pic'].'" alt="advertisement"><div>
                </div>
                
                </div>';
                $count++;
                    }
                }
                else{
                    $count = 0;
                    foreach ($_SESSION['upcoming_campaigns'] as $campaign) {
                        echo '
                        <div class="box-1">
                        <img src="./../../public/img/advertisements/'.$ad['Advertisement_pic'].'" alt="advertisement"><div>
                </div>
                
                </div>';
                $count++;
                    }
                }
                ?>


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
        </div>
    </div>
<?php
    
        
    require_once(__ROOT__.'/app/views/layout/footer.php');
 

    
?>
</body>

</html>