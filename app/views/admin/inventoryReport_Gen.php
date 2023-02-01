<?php 
$metaTitle = "Blood Availability Report" 
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>    

    

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
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Inventory Availability</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="category">Category<div class="year-content"> : Donor couch</div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date">Date Generated<div class="date-content"> : 2020-10-10</div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="barchart">
            <canvas id="inventory-availability" width="900" height="400">
            </canvas>
        </div>
        <!-- Conatiner to the right -->
        <div class="data">

            <table class="user-types-table" style="width:90%">
            <tr>
                <th>Blood Bank Name</th>
                <th>Quantity available</th>
                
            </tr>
            <hr class="data-blood-types-line">

            <?php 
            $no_rows = $_SESSION['rowCount'];
            $result = $_SESSION['inventory_avail'];

            //display the link of the pages in URL  
            if ($no_rows > 0) {
                
                foreach(array_slice($result,0,$no_rows) as $row) {
                    echo '<div class="table-content-types"> <tr>
                            <td>' . $row["BloodBank_Name"]. "</td>
                            <td>" . $row["Quantity"] . '</td>
                        </tr> </div>';
                    
                }
            } 
            else {
                echo "0 results";
            }
            echo "</table>"; ?>
              
        </div>

        <div>
            <button id="submit-btn" class='brown-button genrep1' type='submit' name='add-badge'>Download Copy</button>
            <img class="addbutton addbutton_rep1" src="./../../public/img/admindashboard/down.png" alt="add-button">
            <a class='outline-button outline-button_rep1' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
        </div>

    <!-- Include the chart.js file -->
    <script src="../../../public/js/charts/inventoryAvailability.js"></script>

</body>
</html>