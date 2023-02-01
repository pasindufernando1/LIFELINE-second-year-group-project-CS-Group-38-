<?php 
$metaTitle = "Donor Report" 
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
        <!-- Create a barchart -->
        <div class="barchart">
            <canvas id="usage-months" width="100" height="100">
                <script>
                    var ctx = document.getElementById('usage-months').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Blood Usage',
                                data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
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
                                //Barwidth
                                barpercentage: 0.25,         
                            }]
                        },
                        options: {
                            // title: {
                            //     display: true,
                            //     text: 'Blood Usage',
                            //     // Align the chart title to the top left
                            //     position: 'top',
                            //     fontSize: 30,
                            //     fontColor: '#000000',
                            //     fontFamily: 'Poppins',
                            //     fontStyle: 'bold',
                            // },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                    display: false
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                    display: false
                                    },
                                    ticks: {
                                        beginAtZero: true,
                                        fontColor: '#000000',
                                        fontFamily: 'Poppins',
                                        fontsize: 400,
                                        maxRotation: 90,
                                        minRotation: 0,
                                    },
                                    // Make the 

                                }]

                            }
                        }
                    });
                </script>

            </canvas>
        </div>
    </div>

</body>
</html>