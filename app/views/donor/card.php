<?php

$metaTitle = 'Donor Dashboard'; 

// print_r( $_SESSION['camp_donation_details'][0]['Name']);
// die();

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
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yeseva+One&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="../../../public/js/drop-down.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script scr="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"> </script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
        integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"
        integrity="sha512-JtgP5ehwmnI6UfiOV6U2WzX1l6D1ut4UHZ4ZiPw89TXEhxxr1rdCz88IKhzbm/JdX9T34ZsweLhMNSs2YwD1Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="assets/js/jspdf-autotable-custom.js"></script>


</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard-non menu-item">
                <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                <img class="reservation-non-active dash" src="./../../public/img/donordashboard/active/dashboard.png"
                    alt="dashboard">
                <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                    alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                    alt="reservation">
                <p class="reservation-nav menu-item"><a href="/donationhistory">History</a></p>

            </div>
            <div class="card menu-item">
                <div class="donorcard-marker"></div>
                <img id="card-s" src="./../../public/img/donordashboard/active/cards.png" alt="donor-cards">
                <p class="reservation-act menu-item"><a href="/card">Donor Card</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                    alt="inventory">
                <p class="inventory-nav "><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                    alt="reports">
                <p class="reports-nav "><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/donordashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/campaigns.png"
                    alt="campaigns">
                <p class="campaigns-nav "><a href="/getcampaign?page=1">Campaigns</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png"
                    alt="profile">
                <p class="profile-nav "><a href="/donorprofile">Profile</a></p>

            </div>
        </div>
    </div>

    <div class="card-container">
        <h3>Donor Card</h3>
        <button onclick="exportpdf()" id="download_card">Download</button>

        <div class="donor-card" id="donor_card">
            <img id="card_logo" src="../../../public/img/logo/logo-horizontal.jpg"><br>
            <img src="../../../public/img/user_pics/sneha.jpg" alt="profile-pic">
            <div>
                <h2>Donor <span>Card</span></h2><br>
                <p>
                    <b>
                        <span class="red-font">Name : </span> <?php echo $_SESSION['user_details']['Fullname'] ?><br>
                        <span class="red-font">Age : </span> <?php echo $_SESSION['age'] ?><br>
                        <span class="red-font">Blood Type : </span>
                        <?php echo $_SESSION['user_details']['BloodType'] ?><br>
                        <span class="red-font">NIC : </span> <?php echo $_SESSION['user_details']['NIC'] ?><br>
                        <span class="red-font">Address : </span>
                        <?php echo $_SESSION['user_details']['Number'].', '.$_SESSION['user_details']['LaneName'].', '.$_SESSION['user_details']['City']; ?><br>
                        <span class="red-font">Total Donations : </span>
                        <?php echo $_SESSION['no_of_donations'] ?><br>
                    </b>

                </p>
            </div>
        </div>

        <div class="last-don">
            <p>
                <b><span class="red-font">Last Donation : </span> <?php echo $_SESSION['last_donation_date'] ?></b><br>
            </p>
            <div>
                <p>
                    <?php if($_SESSION['eligible'] == false) {
                    echo 'Not Eligible for new donations' ;

                    }
                    else{
                        echo 'Eligible for new donations';
                    }
                    ?>
                </p>
            </div>

        </div>

        <div id="ybadge" class="ybadge">
            <p id="ybadgep">Your Current Badge</p>
            <img id="badge" src="../../../public/img/badges/<?php echo $_SESSION['newest_badge']; ?>" alt="Your Badge">
        </div>

        <div style="display:none" class="ybadge">
            <p id="ybadgep">Your Current Badge</p>
            <img id="badge" src="../../../public/img/badges/<?php echo $_SESSION['newest_badge']; ?>" alt="Your Badge">
        </div>

        <div id="ydonations" class="ydonations">
            <p id="ydonationsp">Your Donations</p>
            <div>
                <?php foreach($_SESSION['donation_dates'] as $donation) {
                    echo '<p>'.$donation['Date'].'</p>';
                } ?>

            </div>
        </div>

    </div>

    <script>
    function exportpdf() {
        const front = document.getElementById("donor_card");
        const back = document.getElementById("ybadge");
        html2canvas(front).then((canvas) => {
            let base64image = canvas.toDataURL('image/png');
            let pdf = new jsPDF('l', 'mm', 'a5');
            let imgWidth = 190;
            let imgHeight = 80;
            let xPos = (pdf.internal.pageSize.width - imgWidth) / 2;
            let yPos = (pdf.internal.pageSize.height - imgHeight) / 2;
            pdf.addImage(base64image, 'PNG', xPos, 12, imgWidth, imgHeight);

            pdf.setFontSize(12);
            // Define the text to center
            var text = "Date Issue : <?php echo date('Y-m-d'); ?>";

            // Get the width of the text
            var textWidth = pdf.getTextWidth(text);

            // Calculate the X position to center the text
            var xPos1 = (pdf.internal.pageSize.width - textWidth) / 2;

            // Add the text to the PDF at the center of the page
            pdf.text(text, xPos1, 120);

            // Add a new page to the PDF
            pdf.addPage();


            html2canvas(document.getElementById("ybadge")).then((canvas) => {
                let base64image2 = canvas.toDataURL('image/png');
                let imgWidth2 = 150;
                let imgHeight2 = 85;
                let xPos2 = (pdf.internal.pageSize.width - imgWidth2) / 2;
                let yPos2 = (pdf.internal.pageSize.height - imgHeight2) / 2;
                pdf.addImage(base64image2, 'PNG', xPos2, yPos2, imgWidth2, imgHeight2);

                pdf.addPage();

                // Set the font size
                pdf.setFontSize(16);

                // Define the text to center
                var text = "Your Donations At Campaings";

                // Get the width of the text
                var textWidth = pdf.getTextWidth(text);

                // Calculate the X position to center the text
                var xPos = (pdf.internal.pageSize.width - textWidth) / 2;

                // Add the text to the PDF at the center of the page
                pdf.text(text, xPos, 10);

                // Define the table columns and data
                let columns = ["Date", "Campaign", "Place"];
                let data = [
                    <?php $count = 0;
                        foreach($_SESSION['camp_donation_dates'] as $donation) {
                            echo '["'.$donation['Date'].'", "'.$_SESSION['camp_donation_details'][$count]['Name'].'", "'.$_SESSION['camp_donation_details'][$count]['Location'].'"],';
                            $count++;
                        } ?>

                    // ["2020-12-12", "Blood Bank 1", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 2", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 3", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 4", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 5", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 6", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 7", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 8", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 9", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 10", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 11", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 12", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 13", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 14", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 15", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 16", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 17", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 18", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 19", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 20", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 21", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 22", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 23", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 24", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 25", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 26", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 27", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 28", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 29", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 30", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 31", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 32", "sdgsf"],
                    // ["2020-12-12", "Blood Bank 33", "sdgsf"],


                ];

                // Add the table to the PDF using the autoTable method
                pdf.autoTable({
                    head: [columns],
                    body: data,
                    startY: 20,
                    headStyles: {
                        fillColor: [191, 27, 22], // Red color
                        textColor: [255, 255, 255] // White text

                    }

                });

                pdf.addPage();
                // var fontDataURL =
                //     'data:application/x-font-ttf;base64,<BASE64-ENCODED FONT FILE>';
                // pdf.addFileToVFS('Poppins-Regular.ttf', fontDataURL);
                // pdf.addFont('Poppins-Regular.ttf', 'Poppins', 'normal');
                // pdf.addFont('Poppins-Regular.ttf', 'Poppins', 'normal');

                // Set the font size and font family
                pdf.setFontSize(16);
                // pdf.setFont('Poppins');

                // Set the font size
                // pdf.setFontSize(16);

                // Define the text to center
                var text = "Your Donations At Blood Banks";

                // Get the width of the text
                var textWidth = pdf.getTextWidth(text);

                // Calculate the X position to center the text
                var xPos = (pdf.internal.pageSize.width - textWidth) / 2;

                // Add the text to the PDF at the center of the page
                pdf.text(text, xPos, 10);

                // Define the table columns and data
                let columns1 = ["Date", "Blood Bank"];
                let data1 = [
                    <?php $count = 0;
                        foreach($_SESSION['bank_donation_dates'] as $donation) {
                            echo '["'.$donation['Date'].'", "'.$_SESSION['bank_donation_details'][$count]['BloodBank_Name'].'"],';
                            $count++;
                        } ?>
                    // ["2020-12-12", "Blood Bank 1"],
                    // ["2020-12-12", "Blood Bank 2"],
                    // ["2020-12-12", "Blood Bank 3"],
                    // ["2020-12-12", "Blood Bank 4"],
                    // ["2020-12-12", "Blood Bank 5"],
                    // ["2020-12-12", "Blood Bank 6"],
                    // ["2020-12-12", "Blood Bank 7"],
                    // ["2020-12-12", "Blood Bank 8"],
                    // ["2020-12-12", "Blood Bank 9"],
                    // ["2020-12-12", "Blood Bank 10"],
                    // ["2020-12-12", "Blood Bank 11"],
                    // ["2020-12-12", "Blood Bank 12"],
                    // ["2020-12-12", "Blood Bank 13"],
                    // ["2020-12-12", "Blood Bank 14"],
                    // ["2020-12-12", "Blood Bank 15"],
                    // ["2020-12-12", "Blood Bank 16"],
                    // ["2020-12-12", "Blood Bank 17"],
                    // ["2020-12-12", "Blood Bank 18"],
                    // ["2020-12-12", "Blood Bank 19"],
                    // ["2020-12-12", "Blood Bank 20"],
                    // ["2020-12-12", "Blood Bank 21"],
                    // ["2020-12-12", "Blood Bank 22"],
                    // ["2020-12-12", "Blood Bank 23"],
                    // ["2020-12-12", "Blood Bank 24"],
                    // ["2020-12-12", "Blood Bank 25"],
                    // ["2020-12-12", "Blood Bank 26"],
                    // ["2020-12-12", "Blood Bank 27"],
                    // ["2020-12-12", "Blood Bank 28"],
                    // ["2020-12-12", "Blood Bank 29"],
                    // ["2020-12-12", "Blood Bank 30"],
                    // ["2020-12-12", "Blood Bank 31"],
                    // ["2020-12-12", "Blood Bank 32"],
                    // ["2020-12-12", "Blood Bank 33"],
                ];

                // Add the table to the PDF using the autoTable method
                pdf.autoTable({
                    head: [columns1],
                    body: data1,
                    startY: 20,
                    headStyles: {
                        fillColor: [191, 27, 22], // Red color
                        textColor: [255, 255, 255] // White text

                    }

                });

                // Save the PDF with a random filename
                var random = Math.floor(Math.random() * 1000000001);
                var filename = 'DonorDetails' + random + '.pdf';
                pdf.save(filename);



                // Save the PDF with a random filename
                var random = Math.floor(Math.random() * 1000000001);
                var filename = 'DonorDetails' + random + '.pdf';
                pdf.save(filename);
            });

        });
    }

    function exportpng() {
        const front = document.getElementById("front");
        html2canvas(front).then((canvas) => {
            var imagedata = canvas.toDataURL('image/png');
            var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");

            $.ajax({
                url: '/sys_donors/card_upload',
                data: {
                    imgdata: imgdata
                },
                type: 'post',
                success: function(response) {
                    console.log(response);
                }
            });
        });

    }
    </script>

</body>

</html>