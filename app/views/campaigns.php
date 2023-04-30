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
            
                <?php if(count($_SESSION['upcoming_campaigns'])> 4){
                    $count = 0;
                    foreach ($_SESSION['upcoming_campaigns'] as $campaign) {
                        if($count >6){
                            break;
                        }
                        echo '
                        <div class="box-1">
                        <img src="./../../public/img/advertisements/'.$_SESSION['camp_ads'][$count][0]['Advertisement_Pic'].'" alt="advertisement"><div>
                        
                    <p class="box-p"><b>'.$campaign['Name'].'</b>
                        <!-- Give the start time in human readable format with am pm -->
                        <br>Starting At : '.date('h:i A', strtotime($campaign['Starting_time'])).'
                        <br>Date : '.$campaign['Date'].'
                        <br>Location : <br>'.$campaign['Location'].'
                        <br>Bed Count : '.$campaign['BedQuantity'].'
                        
                    </p>
                </div>
                
                </div>';
                $count++;
                    }
                }
                else{
                    $count = 0;
                    foreach ($_SESSION['upcoming_campaigns'] as $campaign) {
                        echo '<div class="box-1">
                        <img src="./../../public/img/advertisements/'.$_SESSION['camp_ads'][$count][0]['Advertisement_Pic'].'" alt="advertisement"><div>
                    <p class="box-p"><b>'.$campaign['Name'].'</b>
                        <!-- Give the start time in human readable format with am pm -->
                        <br>Starting At : '.date('h:i A', strtotime($campaign['Starting_time'])).'
                        <br>Date : '.$campaign['Date'].'
                        <br>Location : <br>'.$campaign['Location'].'
                        <br>Bed Count : '.$campaign['BedQuantity'].'
                        
                    </p>
                </div>
                
                </div>';
                $count++;
                    }
                }
                ?>

            </div>
            
    </div>
    <?php require_once __ROOT__ . '/app/views/layout/footer.php'; ?>
</body>

</html>