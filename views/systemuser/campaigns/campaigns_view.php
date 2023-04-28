<?php 
$metaTitle = "System User Reservations" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

     <!-- CSS Files -->
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/campaigns.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>       
                    <div class="box">
                        <p class="add-reservation-title">Campaign - ID 01</p>
                        
                        
                        <a href="/sys_campaigns?page=1" class="brown-button dreq">Campaigns</a>
                        <img class="dreq-icon" src="./../../public/img/dashboard/inv.png" alt="add-button">

                        <hr class="blood-types-line">

                        <p class="details"><span class="bold-dts">Name: </span> Blood Campaign
                            <br><br>
                        <span class="bold-dts">Location: </span> Jaffna
                        <br><br>
                        <span class="bold-dts">Bed Quantitities: </span> 4
                        <br><br>
                        <span class="bold-dts">Date: </span>  11.11.2022
                        <br><br>
                        <span class="bold-dts">Starting Time: </span>  8 a.m
                        <br><br>
                        <span class="bold-dts">Ending Time: </span> 4 P.m
                        <br><br>
                        <span class="bold-dts">Organized By: </span>  LEO CLUB
                        <br><br>
                        <span class="bold-dts">On-Going Ads: </span> Ad 1
                        <br><br>
                         </p>

                

                </div>

            </div>


        </div>

    </div>

</body>
</html>