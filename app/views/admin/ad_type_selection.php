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
    <link href="../../../public/css/admin/advertisements.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/ad_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <p class="entity-select-title">Advertisement Category</p>

        <a href="/adadvertisements/cash_donation"><button class="button-sys-add user-btn"><img class="usericon"  src="./../../public/img/admindashboard/cash.png" alt="systemuser"><p>Cash Donations<p></button></a>
        <a href="/adadvertisements/inv_donation"><button class="button-hos-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/invdon.png" alt="hospital/medical center">Inventory Donations</button></a>

    
    </div>

</body>
</html>