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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box-donor" id="box-donor">
        <!-- Icon image to the top left corner -->
        <div class="icon">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="icon">
        </div>
        <div class="reportID">
            <label class="reprtId-lable" for="reportID">Report ID<div class="reportID-content"> : <?php echo $_SESSION['report_id'][0]?></div></label>
            <br>
        </div>
        <div class="reportTitle">
            <label class="reportTitle-lable" for="reportTitle">Report Title<div class="reportTitle-content"> : Donor Detailed Information</div></label>
            <br>
        </div>
        <div class="year">
            <label class="year-lable" for="date">Date Generated<div class="year-content"> : <?php 
                // Get the current date
                $date = date('Y-m-d');
                echo $date;
            ?></div></label>
            <br>
        </div>
        <div class="date-1">
            <label class="date-lable" for="donorName">Donor name<div class="date-content"> : <?php echo $_SESSION['donordetails'][0]['Fullname']?></div></label>
            <br>
        </div>
        <div class="donorID">
            <label class="donor-lable" for="donorid">Donor ID<div class="donorId-content"> : <?php echo $_SESSION['donorid']?></div></label>
            <br>
        </div>
        <div class="donorNIC">
            <label class="donorNIC-lable" for="donorNIC">Donor NIC<div class="donorNIC-content"> : <?php echo $_SESSION['donordetails'][0]['NIC']?></div></label>
            <br>
        </div>
        <!-- Create a barchart -->
        <div class="piechart">
            <canvas id="donor-rep-chart" width="450" height="450">
            </canvas>
        </div>
        <div class="badgepic">
            <p>Current Badge</p>
            <img src="../../../public/img/admindashboard/badges/Silver_Medal.png" alt="badge">

        </div>
        <div class="donorcard">
            <p>Donor Card View</p>
            <img src="../../../public/img/admindashboard/donor-card/donor-card-tentative.png" alt="donorcard">
        </div>
        <div class="donations">
            <p>Donation History</p>
            <table class="user-types-table" style="width:90%">
            <tr>
                <th>Date</th>
                <th>Location</th>
                <th>PacketID</th>
                <th>Compilation</th>  
            </tr>
            <hr class="data-blood-types-lines">

            <?php 
            $no_rows = count($_SESSION['donor_report']);
            $result = $_SESSION['donor_report'];

            //display the link of the pages in URL  
            if ($no_rows > 0) {
                
                foreach(array_slice($result,0,$no_rows) as $row) {
                    echo '<div class="table-content-types"> <tr>
                            <td>' . $row["Date"]. "</td>
                            <td>" . $row["Location"]. "</td>
                            <td>" . $row["PacketID"]. "</td>
                            <td>" . $row["Compilations"] . '</td>
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
		    html2canvas(document.querySelector('#box-donor')).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			// console.log(base64image);
			let pdf = new jsPDF('p', 'mm'); 
			pdf.addImage(base64image, 'PNG', 0, 0, 210,300);
            // Generate a random number for the file name
            var random = Math.floor(Math.random() * 1000000001);
            var filename = 'donorReport-id-'+ random + '.pdf'; 
			pdf.save('donorReport-id-' + random + '.pdf');
            });
        });
    </script>
    <!-- Include the chart.js file -->
    <script src="../../../public/js/charts/donorDonations.js"></script>

</body>
</html>