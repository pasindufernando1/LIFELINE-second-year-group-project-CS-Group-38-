<?php 
$metaTitle = "Reports" 
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
    <link href="../../../public/css/admin/dashboard.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
    <p class="entity-select-title">Choose report category</p>
        <!-- Add four buttons -->
        <a href="/reports/bloodAvailReport"><button class="button-sys-add user-btn"><img class="usericon"  src="./../../public/img/admindashboard/bloodavail.png" alt="bloodavail"><p>Blood Availability<p></button></a>
        <a href="/reports/inventoryReport"><button class="button-hos-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/inventory.png" alt="inventory">Inventory</button></a>
        <a href="/reports/donorReport"><button class="button-donor-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/donors.png" alt="donors">Donors</button></a>
        <a href="/reports/campaignReport"><button class="button-org-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/campaign.png" alt="campaign">Donation Campaigns</button></a>  
    </div>

</body>
</html>