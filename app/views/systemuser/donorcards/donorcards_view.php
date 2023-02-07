<?php 
$metaTitle = "System User Reservations" 
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
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/donorcards.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>       
                    <div class="box">
                        <p class="add-reservation-title">Donor Card of Donor ID 01</p>
                        
                        <div class="donor-btns">
                        <a href="#" class="brown-button addnew-card">Download</a>
                        <img class="addbutton-card" src="./../../public/img/dashboard/download.png" alt="add-button">

                        <a href="/donor_cards?page=1" class="brown-button types-reservation">Back to Cards</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/personalcard.png" alt="add-button">
                        </div>
                        <hr class="blood-types-line">

                        <div class="cover">

                        </div>
                        

                </div>

            </div>


        </div>

    </div>

</body>
</html>