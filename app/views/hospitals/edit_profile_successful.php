<?php 

$metaTitle = "Hospitals Dashboard" 
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
    <link href="../../../public/css/hospitals/requestBlood.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>


            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                <div class="dashboard menu-item">       
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>

                    <div class="requestBlood menu-item">
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/non-active/Request blood.png" alt="requestBlood">
                        <img class="requestBlood-non-active" src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>
                    
                    
                    
                    <div class="profile-selected">
                    <div class="marker"></div>
                        <!-- <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="/requestBlood/viewProfile">Profile</a></p>

                    </div>

                </div>

            </div>

            <div class="box">
            <img class="success-msg" src="./../../public/img/hospitalsdashboard/success-msg-img.png" alt="success">
                   
                    
                   <p class="msg">Successfully Updated!</p>
               
                   <a href="/requestBlood/viewProfile/" class="brown-button1">Back</a>
            </div> 