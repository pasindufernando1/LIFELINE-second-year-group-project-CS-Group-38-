<?php 
$metaTitle = "Inventory" 
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
    <link href="../../../public/css/admin/badges.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/badges_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <p class="add-user-title">Available Badges</p>
            <a href="/adbadges/add_badge" class="brown-button addnew-user">Add New Badge</a>
            <img class="adduser-pic" src="./../../public/img/admindashboard/badge.png" alt="add-button">
        
        <!-- A for loop to read the data from the $_SESSION['badges'] variable -->
        <?php foreach($_SESSION['badges'] as $badge): $x=1?>
            <!-- A container to hold the badge photo BadgeID and the Name -->
            <div class="badge_wrap ">
                <!-- Image -->
                <img class="badge_img" src="<?php echo $badge['BadgePic']; ?>" alt="badge">
                <div class="badgeID">
                <!-- Badge ID -->
                <!-- Label for Badge ID -->
                    <p class="badgeID">Badge ID : <?php echo $badge['BadgeID']; ?></p>
                </div>
                <div class="badgeName">
                    <!-- Label for Badge Name -->
                    <p class="badgeName">Badge Name : <?php echo $badge['Name']; ?></p>
                </div>
                <div class="donationcons">
                    <!-- Label for Donation Contribution -->
                    <p class="donationcons">Donation Constraint : <?php echo $badge['Donation_Constraint']; ?> days</p>
                </div>
            </div> 
        <?php endforeach; ?>
                        
    </div>

</body>
</html>