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
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Productive Donation Areas</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="category">Blood Category<div class="year-content"> : <?php echo $_SESSION['category']?></div></label>
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

        <div class="chart1">
            <!-- Create a barchart -->
            <div class="barchart">
                <canvas id="total-donations" width="900" height="400">
                </canvas>
            </div>
            <div class="data-box1">
                <p class="db-title">Highest Contribution</p>
                <p class="db-data"><?php 
                    // Get the value of the array $_SESSION['donations'] with key = max_donations_district
                    echo $_SESSION['donations']['max_donations_district'];

                ?></p>
                <p class="db-title">
                    <?php 
                        // Get the value of the array $_SESSION['donations'] with key = max_donations_value
                        echo $_SESSION['donations']['max_donations_value'];
                    ?> Donations
                </p>
                
            </div>
            <div class="data-box2">
                <p class="db-title">Least Contribution</p>
                <p class="db-data">
                    <?php 
                        // Get the value of the array $_SESSION['donations'] with key = min_donations_district
                        echo $_SESSION['donations']['min_donations_district'];
                    ?> 
                </p>
                <p class="db-title">
                    <?php 
                        // Get the value of the array $_SESSION['donations'] with key = min_donations_value
                        echo $_SESSION['donations']['min_donations_value'];
                    ?> Donations
                </p>
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
                <p class="db-data">
                    <?php 
                        // Get the value of the array $_SESSION['donors'] with key = max_donors_district
                        echo $_SESSION['donors']['max_donors_district'];
                    ?>
                </p>
                <p class="db-title">
                    <?php 
                        // Get the value of the array $_SESSION['donors'] with key = max_donors_value
                        echo $_SESSION['donors']['max_donors_value'];
                    ?> Donors
                </p>
            </div>
            <div class="data-box2">
                <p class="db-title">Least Donors</p>
                <p class="db-data">
                    <?php 
                        // Get the value of the array $_SESSION['donors'] with key = min_donors_district
                        echo $_SESSION['donors']['min_donors_district'];
                    ?>
                </p>
                <p class="db-title">
                    <?php 
                        // Get the value of the array $_SESSION['donors'] with key = min_donors_value
                        echo $_SESSION['donors']['min_donors_value'];
                    ?> Donors
                </p>
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


    <!-- Charts -->
    <script> 
        <?php 
            $donations = $_SESSION['donations']; 
        ?>
        // Total donations
        var ctx = document.getElementById('total-donations').getContext('2d');
        console.log(ctx);
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: 
                    <?php 
                        // Each key of the $donations array except last four keys is a district
                        $districts = array_keys($donations);
                        array_pop($districts);
                        array_pop($districts);
                        array_pop($districts);
                        array_pop($districts);
                        echo json_encode($districts);
                    ?>
                ,
                datasets: [{
                    label: 'Total donations',
                    data: 
                        <?php 
                            // Each value of the $donations array except last four data is a data
                            $data = array_values($donations);
                            array_pop($data);
                            array_pop($data);
                            array_pop($data);
                            array_pop($data);
                            echo json_encode($data);
                        ?>
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
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16'

                    ],  
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood Donation Analysis(Total donations) : Category A+',
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
                            labelString: 'No. of donations',
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
                        categoryPercentage: 0.5,
                        scaleLabel: {
                            display: true,
                            labelString: 'Districts',
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

        // Total donors
        <?php 
            $donors = $_SESSION['donors'];
        ?>
        var ctx = document.getElementById('registered-donors').getContext('2d');
        console.log(ctx);
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:
                    <?php 
                        // Each key of the $donors array except last four keys is a district
                        $districts = array_keys($donors);
                        array_pop($districts);
                        array_pop($districts);
                        array_pop($districts);
                        array_pop($districts);
                        echo json_encode($districts);
                    ?>
                ,
                datasets: [{
                    label: 'Total number of registered donors',
                    data: 
                        <?php 
                            // Each key of the $donors array except last four keys is a value
                            $donor_count = array_values($donors);
                            array_pop($donor_count);
                            array_pop($donor_count);
                            array_pop($donor_count);
                            array_pop($donor_count);
                            echo json_encode($donor_count);
                        ?>
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
                        '#BF1B16',
                        '#BF1B16',
                        '#BF1B16'

                    ],  
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood Donation Analysis(Registered donors) : Category A+',
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
                            labelString: 'No. of donors',
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
                        categoryPercentage: 0.5,
                        scaleLabel: {
                            display: true,
                            labelString: 'Districts',
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