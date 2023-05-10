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
        <!-- <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div> -->
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Blood Availability</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="year">Date Generated<div class="year-content"> : 
            <?php 
                // Get the current date
                $date = date('Y-m-d');
                echo $date;
            ?></div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="b_category">Blood Category<div class="date-content"> : <?php echo $_SESSION['blood_group']?></div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="barchart">
            <canvas id="blood-availability" width="900" height="400">
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
        $no_rows = count($_SESSION['blood_avail']);
        $result = $_SESSION['blood_avail'];

        //display the link of the pages in URL  
        if ($no_rows > 0) {
            foreach(array_slice($result,0,$no_rows) as $row){
                echo '<div class="table-content-types"> <tr>
                        <td>' . $row["BloodBank_Name"]. "</td>
                        <td>" . $row["Quantity"] . '</td>
                    </tr> </div>';
                
            }
        } 
        else {
            echo '<div class="table-content-types"> <tr>
                            <td>Not available</td>
                    </tr></div>';
        }
        echo "</table>"; ?>     
        </div>
    </div>
    <div>
        <button id="submit-btn" class='brown-button genrep1' type='submit' name='add-badge'>Download Copy</button>
        <img class="addbutton addbutton_rep1" src="./../../public/img/admindashboard/down.png" alt="add-button">
        <button id="send-database" class="brown-button genrep1_new" type='submit' name='send-database'>Send to database</button>
        <img class="addbutton addbutton_rep1_new" src="./../../public/img/admindashboard/database.png" alt="add-button">
        <a class='outline-button outline-button_rep1' type='reset' name='cancel-adding' href="/reports/type?page=1">Back to reports</a></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
    
    </script>
    
    <script>
        var doc = new jsPDF();
        $('#send-database').click(function() {
            var htmlContent = $('#box').html();

            html2canvas(document.querySelector('#box')).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                doc.addImage(imgData, 'PNG', 0, 0, 210,200);
                var pdfBlob = doc.output('blob');

                var formData = new FormData();
                formData.append('pdf', pdfBlob);

                $.ajax({
                    url: 'http://localhost/reports/saveBloodAvailreport',
                    method: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // Change the header to the new page
                        window.location.href = "http://localhost/reports/updatedatabase_done";
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        });



        document.querySelector('#submit-btn').addEventListener('click', function () {
                html2canvas(document.querySelector('#box')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');
                let pdf = new jsPDF('p', 'mm'); 
                pdf.addImage(base64image, 'PNG', 0, 0, 210,200);
                var filename = 'bloodAvailreport-id-'+ Date.now() + '.pdf';
                pdf.save(filename);
            });
        });



    </script>

    <!-- Charts -->
    <script>
        <?php 
            $no_rows = count($_SESSION['blood_avail']);
            $result = $_SESSION['blood_avail'];
        ?>
        // Blood availability graph
        var ctx = document.getElementById('blood-availability').getContext('2d');
        var myChart = new Chart(ctx, {

            type: 'bar',
            data: {
                labels:
                // Run a loop to get the blood bank names
                <?php 
                    $labels = array();
                    if ($no_rows > 0) {
                        foreach(array_slice($result,0,$no_rows) as $row){
                            array_push($labels, $row["BloodBank_Name"]);
                        }
                    } 
                    else {
                        echo "0 results";
                    }
                    echo json_encode($labels);
                ?>,
                datasets: [{
                    label: 'Amount available',
                    data:
                        // Run a loop to get the quantity available
                        <?php 
                            $data = array();
                            if ($no_rows > 0) {
                                foreach(array_slice($result,0,$no_rows) as $row){
                                    array_push($data, $row["Quantity"]);
                                }
                            } 
                            else {
                                echo "0 results";
                            }
                            echo json_encode($data);
                        ?>
                    ,
                    
                    backgroundColor: [
                        <?php 
                           for($count=0; $count < $no_rows; $count++){
                                echo "'#BF1B16',";
                            }
                        ?>
                    ],  
                    
                    }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Blood availability : <?php echo $_SESSION['province']; ?> Province',
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
                        categoryPercentage: 0.5,
                        scaleLabel: {
                            display: true,
                            labelString: 'Blood banks',
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