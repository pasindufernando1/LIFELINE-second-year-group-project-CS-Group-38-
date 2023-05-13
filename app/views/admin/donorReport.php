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
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
    <p class="add-user-title">Donor Details</p>
        <form action="/reports/donorReport_Gen" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label id= "hospital_name-label" class="quantity-lable" for="category">Donor NIC : </label>
                <br>
                <input class="quantity-input" type="text" name="donornic" id="donorID" placeholder="Donor NIC" list = "donors" required>
                <datalist id="donors">                                    
                    <?php 
                        $count = count($_SESSION['Donors']);
                        for ($i=0; $i <$count ; $i++) { 
                            echo'<option value="'.$_SESSION['Donors'][$i]['NIC'].'">'.$_SESSION['Donors'][$i]['NIC'].' - '.$_SESSION['Donors'][$i]['Fullname'].'</option> ';
                        }
                    ?>
                </datalist>
                
                <!-- <input class="quantity-input" type="text" name="donorID" id="category" placeholder="Donor ID" required> -->
                <div>
                <button id="submit-btn" class='brown-button-rep generate-analytics' type='submit' name='gen_report'>Generate report</button>                            
            </div>
        </form>       
    </div>

</body>
</html>