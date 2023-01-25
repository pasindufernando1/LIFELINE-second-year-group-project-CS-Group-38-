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
        <p class="add-user-title">Choose year</p>
        <form action="/usermanage/addSystemuser" method="post" enctype="multipart/form-data" id="addform">
                            <div class="quantity-container">
                                <label class="quantity-lable" for="bloodbankid">Select year</label>
                                <select class="quantity-input" type="text" name="year" id="year" placeholder="Blood Bank ID" required>
                                    <!-- Give options upto current year  and have a placeholder as Select year-->
                                    <!-- Assuming the system has data since 2020 -->
                                    <?php
                                        $currentYear = date("Y");
                                        echo '<option value="" disabled selected hidden>Select the year </option>';
                                        for($i = 2020; $i <= $currentYear; $i++){
                                            // Have a placeholder named select year

                                            echo "<option value='$i'>$i</option>";
                                        }
                                    ?>
                                </select>
                                <br>
                            </div>
                            <div>
                                <button id="submit-btn" class='brown-button generate-analytics' type='submit' name='gen_analytics'>Generate analytics</button>                            </div>
                        </form>

                        
                        
    </div>

</body>
</html>