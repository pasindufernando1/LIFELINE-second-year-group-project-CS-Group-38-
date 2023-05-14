<?php 
$metaTitle = "Inventory" 
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
    <p class="add-user-title">Inventory Availability</p>
        <form action="/reports/inventoryReport_Gen?page=1" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label id= "hospital_name-label" class="quantity-lable" for="category">Inventory Category : </label>
                <br>
                <select class="quantity-input" type="text" name="category" id="category" placeholder="Blood Bank ID" required>
                    <!-- Random options for Inventory category -->
                    <option value="" disabled selected hidden>Inventory Category</option>
                    <option value="Bed">Bed</option>
                    <option value="Pressure Machines">Pressure Machines</option>
                    <option value="2 Pint container">2 Pint container</option>
                    <option value="Syringe">Syringe</option>
                </select>
            <div class="reg-container">
                <label id ="reg-label" class="reg-lable" for="province">Province:</label>
                <br>
                <select id="province" class="provinces-input custom-select" type="text" name="province" autofocus placeholder="Province" required>
                        <!-- Show placeholder -->
                        <option value="" disabled selected hidden>Province</option>
                        <option value="Central">Central</option>
                        <option value="Eastern">Eastern</option>
                        <option value="North Central">North Central</option>
                        <option value="Northern">Northern</option>
                        <option value="North Western">North Western</option>
                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                        <option value="Southern">Southern</option>
                        <option value="Uva">Uva</option>
                        <option value="Western">Western</option>
                </select>
            </div>
                <div>
                <button id="submit-btn" class='brown-button-rep generate-analytics' type='submit' name='gen_report'>Generate report</button>                            </div>
        </form>       
    </div>

</body>
</html>