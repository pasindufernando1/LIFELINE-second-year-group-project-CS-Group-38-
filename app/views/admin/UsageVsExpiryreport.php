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
    <div class="box-expiry" id="box-expiry">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Usage vs Expiry Analysis</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="province">Province<div class="year-content"> : <?php echo $_SESSION['province']?></div></label>
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
        <div class="piechart-expiry">
            <canvas id="expiry-piechart" width="450" height="450">
            </canvas>
        </div>
        <!-- Expiry pie chart -->
        <script>
            <?php 
                $province_data = $_SESSION['province_data'];
                $total_donations = $_SESSION['province_data']['total_donations'];
                $used_donations = $_SESSION['province_data']['used'];
                $expired_donations = $_SESSION['province_data']['expired'];
                $available_donations = $_SESSION['province_data']['available'];
            ?>
            var ctx = document.getElementById('expiry-piechart').getContext('2d');
            var x = 1100;
            var chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Used packets', 'Expired packets', 'Available packets'],
                    datasets: [{
                        data: 
                        [<?php echo $used_donations?>,
                        <?php echo $expired_donations?>,
                        <?php echo $available_donations?>],
                        backgroundColor: ['#BF1B16', '#F0817E', '#640E0B']
                    }]
                },
                options: {
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    },
                    title: {
                        display: true,
                        text: 'Total Donations : <?php echo $_SESSION['province']?> Province',
                        font: {
                            weight: 'bold',
                            size: 25,
                            color: '#000000',
                            family: 'Poppins',
                        },
                    },
                    subtitle: {
                        display: true,
                        text: <?php echo $total_donations?> + ' Donations - ' +<?php echo $total_donations*4?> + ' Packets in Total',
                        font: {
                            weight: 'bold',
                            size: 20,
                            color: '#949494',
                            family: 'Poppins',
                        },
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
                cutout: 100,
            }
            });
        </script>
        <!-- Div to display the piecharts of the districts relevent to the province -->
        <div class="piechart-districts">
            <?php 
                // Count the number of elements in the array _SESSION['usageVSexpiry'
                $count = count($_SESSION['usageVSexpiry']);
                $district_results = $_SESSION['usageVSexpiry'];
                //print_r($district_results);die;
                // Loop through the array and display the piecharts of the districts relevent to the province
                for($i = 0; $i < $count; $i++){
                    echo "<div class='piechart-districts-content'>";
                    echo "<canvas id='expiry-piechart-districts-".$district_results[$i]['district']."' width='450' height='450'></canvas>";
                    echo "</div>";
                }

            ?>
            <script>
                <?php
                    $details = json_encode($district_results);
                ?>
                var details = <?php echo $details?>;
                function generatepiechart(district, used, expired, available,total_donations){
                    console.log(x);
                    var ctx1 = document.getElementById('expiry-piechart-districts-'+district).getContext('2d');
                    var chart = new Chart(ctx1, {
                        type: 'doughnut',
                        data: {
                            labels: ['Used Packets', 'Expired Packets', 'Available Packets'],
                            datasets: [{
                                data: [used, expired, available],
                                backgroundColor: ['#BF1B16', '#F0817E', '#640E0B']
                            }]
                        },
                        options: {
                        plugins: {
                            legend: {
                                display: true,
                                position: 'bottom',
                            },
                            title: {
                                display: true,
                                text: 'Total donations : ' + district + ' District',
                                font: {
                                    weight: 'bold',
                                    size: 25,
                                    color: '#000000',
                                    family: 'Poppins',
                                },
                            },
                            subtitle: {
                                display: true,
                                text: total_donations + ' Donations - ' + total_donations*4 + ' Packets in Total',
                                font: {
                                    weight: 'bold',
                                    size: 20,
                                    color: '#949494',
                                    family: 'Poppins',
                                },
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: 100,
                    }
                    });

                }
                for(var i = 0; i < <?php echo $count; ?>; i++){
                    generatepiechart(details[i]['district'], details[i]['used'], details[i]['expired'], details[i]['available'], details[i]['total_donations']);
                    
                }
            </script>
        </div>
        
        

        
    </div>
    <div>
        <button id="submit-btn" class='brown-button genrep2' type='submit' name='add-badge'>Download Copy</button>
        <img class="addbutton addbutton_rep2" src="./../../public/img/admindashboard/down.png" alt="add-button">
        <a class='outline-button outline-button_rep2' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
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
		    html2canvas(document.querySelector('#box-expiry')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('p', 'mm', 'a4'); 
			pdf.addImage(base64image, 'PNG', 0, 0, 210, 297);
            // Generate a random number for the file name
            var random = Math.floor(Math.random() * 1000000001);
            var filename = 'usageVSexpiry-id-'+ random + '.pdf'; 
			pdf.save('usageVSexpiry-id-' + random + '.pdf');
            });
        });
    </script>
    

</body>
</html>