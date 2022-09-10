<?php
    $siteName= "Life Line Blood Banks & Donation Management System";
    $version = '0,1';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto+Mono|Work+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Favicons -->
    <link href="../../assets/img/favicon.jpg" rel="icon">

    <!-- CSS Files -->
    <link href="../../assets/css/header.css" rel="stylesheet">

</head>
<body>
    <div>
        <div class="header">
            <div class="logo">
                <img src="..\..\assets\img\logo\logo-horizontal.jpg" alt="logo">
            </div>
            <div class="header-block">

                <!-- Emergency Block -->
                <div class="emergency">
                    <div class="icon-emergency">
                        <img src="..\..\assets\img\header\icon-emergency.svg" alt="logo">
                    </div>
                    <div class="head-emergency">
                        <p>Emergency</p> 
                    </div>
                    <div class="sub-emergency">
                        <p><a href="tel:123-456-7890">123-456-7890</a></p> 
                    </div>

                </div>

                <!-- Open-Hours Block -->
                <div class="open-hours">
                    <div class="icon-open-hours">
                        <img src="..\..\assets\img\header\icon-open-hours.svg" alt="logo">
                    </div>
                    <div class="head-open-hours">
                        <p>Open Time</p> 
                    </div>
                    <div class="sub-open-hours">
                        <p>09:00 - 20:00 Everyday</p> 
                    </div>

                </div>

                <!-- Location Block -->
                <div class="location">
                    <div class="icon-location">
                        <img src="..\..\assets\img\header\icon-location.svg" alt="logo">
                    </div>
                    <div class="head-location">
                        <p>Location</p> 
                    </div>
                    <div class="sub-location">
                        <p>0123 Some Place</p> 
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>

