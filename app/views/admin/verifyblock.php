<?php 
$metaTitle = "Verify blocked" 
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
    <link href="../../../public/css/admin/inventory.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <div class="message-container">
            <img class="success-msg-img" src="./../../public/img/unsuccess-msg-img.jpg" alt="success-msg-img">
            <p class="success-msg-txt">Operation not possible. System user needs to validate first !</p>
            <a href="/inventory/donations?page=1" class="brown-button back-to-reserve">Back to Inventory Donations</a>
        </div>
        
    </div>

</body>
</html>