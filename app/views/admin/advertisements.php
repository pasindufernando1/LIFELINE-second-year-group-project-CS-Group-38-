<?php 
$metaTitle = "Advertisements" 
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/includes/add_archive_confirmation.php'); ?>

            
    <!-- main content -->
    <div class="box-main">
        <p class="add-user-title">Advertisements</p>
        <a href="/adadvertisements/add_advertisement" class="brown-button addnew-user">Add New Advertisement</a>
    
        
        <a href="/usermanage/add_hosmed_successful" class="ash-button reservation-filter">Filter & Short</a>
        <img class="user-filter-img" src="./../../public/img/admindashboard/filter-icon.png" alt="reservation-filter-img">
        <div class="campaign-view-box">
        <h2 class="header2">Cash Donation Advertisements</h2>
        <div class="view-campaign-container">
            <?php
            $number_of_results = count($_SESSION['cash_advertisements']);
            $result = $_SESSION['cash_advertisements'];
            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    //print_r($result);die();
                    echo '<div class="view-campaign-card">
                                            <img src = "./../../public/img/advertisements/'.$row['Advertisement_pic']."".'"class="campaign-card-img" alt="campaigns">
                                            <div class="campaign-card-bottom"
                                            <p class="campaign-card-info">
                                            <h3> ' .
                        $row['Description'] .
                        '</h3>
                                            Published Date :' .
                        $row['PublishedDate'] .
                        '<br>
                                            Amount Expected: Rs.' .
                        $row['Total_amount'] .
                        '<br>
                                            Amount Received: Rs.' .
                        $row['CurrentSum'] .
                        '<br><br>
                                            <a onclick="document.getElementById('."'id01'".').style.display='."'block'".';      
                                            document.getElementById('."'del'".').action = '."'/adadvertisements/archive_add/".$row["AdvertisementID"]."'";
                        echo '" name="view_camp_info" class="archive"> Hide Advertisement</a></p>
                                            </div>
                                            </div>';
                }
            } else {
                echo '0 results';
            }
            ?>
        </div>
        <div class="campaign-view-box2">
        <h2 class="header2">Inventory Donation Advertisements</h2>
        <div class="view-campaign-container">
            <?php
            $number_of_results = count($_SESSION['inventory_advertisements']);
            $result = $_SESSION['inventory_advertisements'];
            if ($_SESSION['rowCount'] > 0) {
                foreach ($result as $row) {
                    //print_r($result);die();
                    echo '<div class="view-campaign-card">
                                            <img src = "./../../public/img/advertisements/'.$row['Advertisement_pic']."".'"class="campaign-card-img" alt="campaigns">
                                            <div class="campaign-card-bottom"
                                            <p class="campaign-card-info">
                                            <h3> ' .
                        $row['Description'] .
                        '</h3>
                                            Published Date :' .
                        $row['PublishedDate'] .
                        '<br>
                                            Inventory Category: ' .
                        $row['InventoryCategory'] .
                        '<br>
                                            Quantity received: ' .
                        $row['CurrentSum'] .
                        '<br><br>
                        <a onclick="document.getElementById('."'id01'".').style.display='."'block'".';      
                        document.getElementById('."'del'".').action = '."'/adadvertisements/archive_add/".$row["AdvertisementID"]."'";
    echo '" name="view_camp_info" class="archive"> Hide Advertisement</a></p>
                        </div>
                        </div>';
                }
            } else {
                echo '0 results';
            }
            ?>
        </div>
        
            
    
    </div>

</body>
</html>