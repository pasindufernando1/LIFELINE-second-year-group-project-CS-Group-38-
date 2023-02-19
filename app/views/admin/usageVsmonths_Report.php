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
    <div class="box" id="box">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Blood Usage Respect to Months</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="year">Year<div class="year-content"> : <?php echo $_SESSION['year']?></div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date">Date Generated<div class="date-content"> : <?php 
                // Get the current date
                $date = date('Y-m-d');
                echo $date;
            ?></div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="barchart">
            <canvas id="usage-months" width="1450" height="483.33">
            </canvas>
        </div>
        
    </div>
    <div>
        <button id="submit-btn" class='brown-button genrep1' type='submit' name='add-badge'>Download Copy</button>
        <img class="addbutton addbutton_rep1" src="./../../public/img/admindashboard/down.png" alt="add-button">
        <a class='outline-button outline-button_rep1' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a>        </div>
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
		    html2canvas(document.querySelector('#box')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('p', 'mm'); 
			pdf.addImage(base64image, 'PNG', 0, 0, 210,200);
            // Generate a random number for the file name
            var random = Math.floor(Math.random() * 1000000001);
            var filename = 'usageVSmonths-id-'+ random + '.pdf'; 
			pdf.save('usageVSmonths-id-' + random + '.pdf');
            });
        });
    </script>
    <!-- Chart -->
    <script>
        <?php 
            $result = $_SESSION['bloodusage'];
            
        ?>
        // Usage respect to months graph
        var ctx = document.getElementById('usage-months').getContext('2d');
        var myChart1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Blood Usage',
                    data:   [<?php echo json_encode($result['01'])?>,
                                <?php echo json_encode($result['02'])?>,
                                <?php echo json_encode($result['03'])?>,
                                <?php echo json_encode($result['04'])?>,
                                <?php echo json_encode($result['05'])?>,
                                <?php echo json_encode($result['06'])?>,
                                <?php echo json_encode($result['07'])?>,
                                <?php echo json_encode($result['08'])?>,
                                <?php echo json_encode($result['09'])?>,
                                <?php echo json_encode($result['10'])?>,
                                <?php echo json_encode($result['11'])?>,
                                <?php echo json_encode($result['12'])?>]
                            ,
                    backgroundColor: [
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16'
                    ],   
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood Usage Analysis : <?php echo json_encode($_SESSION['year'])?>',
                    // Align the chart title to the right
                    fontSize: 18,
                    fontColor: '#000000',
                    fontFamily: 'Poppins',
                    fontStyle: 'bold',
                    // Display the chart horizontally on top left corner
                    position: 'top',
                },
                legend: {
                    labels: {
                        fontColor: '#BCBCBC',
                        fontFamily: 'Poppins',
                        fontSize: 16,
                        fontStyle: 'bold',
                        position: 'right',
                    }
                },
                scales: {
                    yAxes: [{
                        // Display the y-axis label
                        scaleLabel: {
                            display: true,
                            labelString: 'No. of pints',
                            fontColor: '#BCBCBC',
                            fontFamily: 'Poppins',
                            fontSize: 16,
                            fontStyle: 'bold',
                        },
                        gridLines: {
                            display: true,
                            color: '#E0E0E0',
                            // Show grid lines dashed
                            borderDash: [5, 5],

                        },
                        ticks: {
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: 'Month of the year',
                            fontColor: '#BCBCBC',
                            fontFamily: 'Poppins',
                            fontSize: 16,
                            fontStyle: 'bold',
                        },
                        gridLines: {
                        display: false
                        },
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#BCBCBC',
                            fontFamily: 'Poppins',
                            fontsize: 400,
                            maxRotation: 90,
                            minRotation: 0,
                        },
                        // Make the chart responsive
                        responsive: true,
                        maintainAspectRatio: false,

                    }]

                }


            }
        });
    </script>

</body>
</html>