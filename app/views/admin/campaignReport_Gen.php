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
    <div class="box-camp" id="box-camp">
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <!-- <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div> -->
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Donation Campaigns Planned</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="province">Province<div class="year-content"> : <?php echo $_SESSION['province']?> Province</div></label>
            <br>
        </div>
        <div class="date">
            <label class="date-lable" for="date-needed">Date needed<div class="date-content"> : <?php echo $_SESSION['date']?></div></label>
            <br>
        </div>
        <div class="date-generated">
            <label class="date-lable" for="date-generated">Date generated<div class="date-content"> : <?php 
                // Get the current date
                $date = date('Y-m-d');
                echo $date;
            ?></div></label>
            <br>
        </div>

        <div class="campaigns-avail">
            <p>Available campaigns : <?php echo $_SESSION['date']?></p>
            <table class="user-types-table" style="width:90%">
            <tr>
                <th>Date</th>
                <th>Name</th>
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
                            <td>" . $row["Name"] . "</td>
                            <td>" . $row["Location"] . "</td>
                            <td>" . $row["BedQuantity"] . "</td>
                            <td>" . $row["OrganizationUserID"] . '</td>
                        </tr> </div>';
                    
                }
            } 
            else {
                echo "0 results";
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
            var htmlContent = $('#box-camp').html();

            html2canvas(document.querySelector('#box-camp')).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                doc.addImage(imgData, 'PNG', 0, 0, 210,200);
                var pdfBlob = doc.output('blob');

                var formData = new FormData();
                formData.append('pdf', pdfBlob);

                $.ajax({
                    url: 'http://localhost/reports/saveCampaignreport',
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
                html2canvas(document.querySelector('#box-camp')).then((canvas) => {
                let base64image = canvas.toDataURL('image/png');
                let pdf = new jsPDF('p', 'mm'); 
                pdf.addImage(base64image, 'PNG', 0, 0, 210,200);
                var filename = 'Campaignreport-id-'+ Date.now() + '.pdf';
                pdf.save(filename);
            });
        });
    </script>

</body>
</html>