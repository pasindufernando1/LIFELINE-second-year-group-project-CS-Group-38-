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
    <div class="box-productive" id="box-productive">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : 1</div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Productive Donation Areas</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="category">Blood Category<div class="year-content"> : A+</div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date">Date Generated<div class="date-content"> : 2020-10-10</div></label>
            <br>
        </div>

        <div class="chart1">
            <!-- Create a barchart -->
            <div class="barchart">
                <canvas id="total-donations" width="900" height="400">
                </canvas>
            </div>
            <div class="data-box1">
                <p class="db-title">Highest Contribution</p>
                <p class="db-data">Polonnaruwa</p>
                <p class="db-title">3900 Pints</p>
                
            </div>
            <div class="data-box2">
                <p class="db-title">Least Contribution</p>
                <p class="db-data">Matale</p>
                <p class="db-title">1100 Pints</p>
            </div>
        </div>

        <div class="chart2">
            <!-- Create a barchart -->
            <div class="barchart">
                <canvas id="registered-donors" width="900" height="400">
                </canvas>
            </div>
            <div class="data-box1">
                <p class="db-title">Highest Donors</p>
                <p class="db-data">Polonnaruwa</p>
                <p class="db-title">800</p>
            </div>
            <div class="data-box2">
                <p class="db-title">Least Donors</p>
                <p class="db-data">Jaffna</p>
                <p class="db-title">220</p>
            </div>
        </div>
        


        
        
    
        
    </div>
    <div>
        <button id="submit-btn" class='brown-button genrep1' type='submit' name='add-badge'>Download Copy</button>
        <img class="addbutton addbutton_rep1" src="./../../public/img/admindashboard/down.png" alt="add-button">
        <a class='outline-button outline-button_rep1' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
    
    </script>
    <script>
        document.querySelector('#submit-btn').addEventListener('click', function () {
		    html2canvas(document.querySelector('#box-productive')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('p', 'mm', 'a4'); 
			pdf.addImage(base64image, 'PNG', 0, 0, 210, 297);
            // Generate a random number for the file name
            var random = Math.floor(Math.random() * 1000000001);
            var filename = 'productive-donations-id-'+ random + '.pdf'; 
			pdf.save('productive-donations-id-' + random + '.pdf');
            });
        });
    </script>


    <!-- Include the chart.js files -->
    <script src="../../../public/js/charts/productivedonations-totalDonation.js"></script>
    <script src="../../../public/js/charts/productivedonations-totalDonors.js"></script>

</body>
</html>