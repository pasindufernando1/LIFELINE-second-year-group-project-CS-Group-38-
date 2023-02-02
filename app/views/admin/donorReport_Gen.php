<?php 
$metaTitle = "Donor Report" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viwport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

     <!-- CSS Files -->
    <link href="../../../public/css/admin/report.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box-donor">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class=nnepo"
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : 1</div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Donor Detailed Information</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="date">Date Generated<div class="year-content"> : 2020-01-20</div></label>
            <br>
        </div>
        <div class="date-1">
            <label class="date-lable" for="donorName">Donor name<div class="date-content"> : Pasindu Fernando</div></label>
            <br>
        </div>
        <div class="donorID">
            <label class="donor-lable" for="donorid">Donor ID<div class="donorId-content"> : 2</div></label>
            <br>
        </div>
        <div class="donorNIC">
            <label class="donorNIC-lable" for="donorNIC">Donor NIC<div class="donorNIC-content"> : 200089786756</div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="piechart">
            <canvas id="donor-rep-chart" width="450" height="450">
            </canvas>
        </div>
        <div class="badgepic">

        </div>
        <div class="donorcard">
            
        </div>
        <div class="donations">

        </div>
        

        <div>
            <button id="submit-btn" class='brown-button genrep2' type='submit' name='add-badge'>Download Copy</button>
            <img class="addbutton addbutton_rep2" src="./../../public/img/admindashboard/down.png" alt="add-button">
            <a class='outline-button outline-button_rep2' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
        </div>
    </div>
    <!-- Include the chart.js file -->
    <script src="../../../public/js/charts/inventoryAvailability.js"></script>

</body>
</html>