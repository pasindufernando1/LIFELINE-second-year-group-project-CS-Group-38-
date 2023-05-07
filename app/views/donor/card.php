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
    <title>
        <?php echo $metaTitle; ?>
    </title>

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

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.6/jspdf.plugin.autotable.min.js"></script>
    <script src="assets/js/jspdf-autotable-custom.js"></script>


</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/donorcard_active.php'); ?>


    <div class="card-container">
        <h3>Donor Card</h3>
        <button onclick="exportpdf()" id="download_card">Download<img src="../../../public/img/donordashboard/down.png"></button>

        <div class="donor-card" id="donor_card">
            <img id="card_logo" src="../../../public/img/logo/logo-horizontal.jpg"><br>
            <img style="height:300px;" src="../../../public/img/user_pics/<?php echo $_SESSION['user_pic'] ?>"
                alt="profile-pic">
            <div>
                <h2>Donor <span>Card</span></h2><br>
                <p>
                    <b>
                        <span class="red-font">Name : </span>
                        <?php echo $_SESSION['user_details']['Fullname'] ?><br>
                        <span class="red-font">Age : </span>
                        <?php echo $_SESSION['age'] ?><br>
                        <span class="red-font">Blood Type : </span>
                        <?php echo $_SESSION['user_details']['BloodType'] ?><br>
                        <span class="red-font">NIC : </span>
                        <?php echo $_SESSION['user_details']['NIC'] ?><br>
                        <span class="red-font">Address : </span>
                        <?php echo $_SESSION['user_details']['Number'] . ', ' . $_SESSION['user_details']['LaneName'] . ', ' . $_SESSION['user_details']['City']; ?><br>
                        <span class="red-font">Total Donations : </span>
                        <?php echo $_SESSION['no_of_donations'] ?><br>
                    </b>

                </p>
            </div>
        </div>

        <div class="last-don">
            <p>
                <b><span class="red-font">Last Donation : </span>
                    <?php if ($_SESSION['last_donation_date'] == NULL) {
                        echo 'No Donations Yet';
                    } else {
                        echo $_SESSION['last_donation_date'];
                    } ?>
                </b><br>
            </p>
            <div>
                <p>
                    <?php if ($_SESSION['eligible'] == false) {
                        echo 'Not Eligible for new donations';

                    } else {
                        echo 'Eligible for new donations';
                    }
                    ?>
                </p>
            </div>

        </div>

        <div id="ybadge" class="ybadge">
            <p id="ybadgep">Your Current Badge</p>
            <?php if ($_SESSION['newest_badge'] == NULL) {
                echo '<p style="text-align:center; font-size: 19px">You are yet to earn a badge<br> Keep donating to earn badges</p>';
            } else { ?>
                <img id="badge" src="../../../public/img/badges/<?php echo $_SESSION['newest_badge']['BadgePic']; ?>"
                    alt="Your Badge">
            <?php } ?>
        </div>

        <div id="ydonations" class="ydonations">
            <p id="ydonationsp">Your Donations</p>
            <div>
                <?php
                if ($_SESSION['donation_dates'] != NULL) {
                    foreach ($_SESSION['donation_dates'] as $donation) {
                        echo '<p>' . $donation['Date'] . '</p>';
                    }
                } else {
                    echo 'No Donations Yet';
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
                        foreach ($_SESSION['camp_donation_dates'] as $donation) {
                            echo '["' . $donation['Date'] . '", "' . $_SESSION['camp_donation_details'][$count]['Name'] . '", "' . $_SESSION['camp_donation_details'][$count]['Location'] . '"],';
                            $count++;
                        } ?>


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

                    // Set the font size and font family
                    pdf.setFontSize(16);
                    

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
                        foreach ($_SESSION['bank_donation_dates'] as $donation) {
                            echo '["' . $donation['Date'] . '", "' . $_SESSION['bank_donation_details'][$count]['BloodBank_Name'] . '"],';
                            $count++;
                        } ?>
                      
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

                    var filename = 'DonorCard.pdf';
                    pdf.save(filename);
                });

            });
        }
    </script>

</body>

</html>