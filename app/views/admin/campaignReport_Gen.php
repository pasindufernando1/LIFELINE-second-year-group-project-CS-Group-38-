<?php 
$metaTitle = "Campaign Report" 
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
    <div class="box-camp">
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : 1</div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Donation Campaigns Planned</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="province">Province<div class="year-content"> : Western Province</div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date-needed">Date needed<div class="date-content"> : 2023-10-10</div></label>
            <br>
        </div>
        <div class="date-generated">
            <label class="date-lable" for="date-generated">Date generated<div class="date-content"> : 2023-01-11</div></label>
            <br>
        </div>

        <div class="campaigns-avail">
            <p>Available campaigns : 2023/10/10</p>
            <table class="user-types-table" style="width:90%">
            <tr>
                <th>Date</th>
                <th>Location</th>
                <th>Available beds qty</th>
                <th>Organizer</th>
                
            </tr>
            <hr class="data-blood-types-line-new">

            <?php 
            $no_rows = count($_SESSION['campaign_avail']);
            $result = $_SESSION['campaign_avail'];

            //display the link of the pages in URL  
            if ($no_rows > 0) {
                
                foreach(array_slice($result,0,$no_rows) as $row) {
                    echo '<div class="table-content-types"> <tr>
                            <td>' . $row["Date"]. "</td>
                            <td>" . $row["Location"] . "</td>
                            <td>" . $row["AvailableBeds"] . "</td>
                            <td>" . $row["Organizer"] . '</td>
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
    </div>

</body>
</html>