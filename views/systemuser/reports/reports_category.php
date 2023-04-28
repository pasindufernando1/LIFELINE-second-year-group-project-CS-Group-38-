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
    <link href="../../../public/css/systemuser/report.css" rel="stylesheet">
    
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
                        <p class="title">Choose report category</p>

                        <a href="blood_availability">
                        <div class="box-1">
                            <img src="./../../public/img/dashboard/box1.png" alt="box1">
                            <p>Blood Availability</p>
                        </div>
                        </a>

                        <a href="blood_inventory">
                        <div class="box-2">
                            <img src="./../../public/img/dashboard/box2.png" alt="box1">
                            <p>Inventory</p>
                        </div>
                        </a>

                        <a href="donors">
                        <div class="box-3">
                            <img src="./../../public/img/dashboard/box3.png" alt="box1">
                            <p>Donors</p>
                        </div>
                        </a>

                        <a href="campaign">
                        <div class="box-4">
                            <img src="./../../public/img/dashboard/box4.png" alt="box1">
                            <p>Donation Campaigns</p>
                        </div>
                        </a>
                        
                        

                
    </div>

</body>
</html>