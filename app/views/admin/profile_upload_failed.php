<?php 
$metaTitle = "Edit admin successful" 
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
    <link href="../../../public/css/admin/profile.css" rel="stylesheet">
    <link href="../../../public/css/extra/custom-select.css" rel="stylesheet">


    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/profile_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <div class="message-container">
            <img class="success-msg-img" src="./../../public/img/unsuccess-msg-img.jpg" alt="success-msg-img">
            <p class="success-msg-txt">Sorry the image you provided was not uploaded!</p>
            <a href="/adprofile/" class="brown-button back-to-reserve">Back to Profile</a>
            <img class="success-reserve-img" src="./../../public/img/dashboard/white-icons/reservation.png" alt="success-reserve-img">
        </div>
    </div>

</body>
</html>