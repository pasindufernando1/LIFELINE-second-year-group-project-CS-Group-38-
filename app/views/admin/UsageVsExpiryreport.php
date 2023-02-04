<?php 
$metaTitle = "Blood Usage Vs Expiry Report" 
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
    <link href="../../../public/css/admin/report.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : 1</div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Usage vs Expiry Analysis</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="province">Province<div class="year-content"> : Western</div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date">Date Generated<div class="date-content"> : 2020-10-10</div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="piechart-expiry">
            <canvas id="expiry-piechart" width="450" height="450">
            </canvas>
        </div>
        <!-- Div to display the piecharts of the districts relevent to the province -->
        <div class="piechart-districts">
            <!--Create three divs for 3 pie charts  -->
            <div class="piechart-district1">
                
            </div>
            <div class="piechart-district2">

            </div>
            <div class="piechart-district3">
                
            </div>
        </div>
        
        

        <div>
            <button id="submit-btn" class='brown-button genrep2' type='submit' name='add-badge'>Download Copy</button>
            <img class="addbutton addbutton_rep2" src="./../../public/img/admindashboard/down.png" alt="add-button">
            <a class='outline-button outline-button_rep2' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
        </div>
    </div>
    <!-- Include the chart.js file -->
    <script src="../../../public/js/charts/expiry-piechart.js"></script>

</body>
</html>