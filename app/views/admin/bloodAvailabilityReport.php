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
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/report_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
    <p class="add-user-title">Blood Availability</p>
        <form action="/reports/bloodAvailReport_Gen" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label id= "hospital_name-label" class="quantity-lable" for="category">Blood Category : </label>
                <br>
                <select class="quantity-input" type="text" name="category" id="category" placeholder="Blood Bank ID" required>
                    <option value="" disabled selected hidden>Select Blood Type</option>
                    <option value="A+ RBC">A+ RBC</option>
                    <option value="A+ WBC">A+ WBC</option>
                    <option value="A+ Plasma">A+ Plasma</option>
                    <option value="A+ Platelet">A+ Platelets</option>
                    <option value="A- RBC">A- RBC</option>
                    <option value="A- WBC">A- WBC</option>
                    <option value="A- Plasma">A- Plasma</option>
                    <option value="A- Platelet">A- Platelets</option>
                    <option value="B+ RBC">B+ RBC</option>
                    <option value="B+ WBC">B+ WBC</option>
                    <option value="B+ Plasma">B+ Plasma</option>
                    <option value="B+ Platelet">B+ Platelets</option>
                    <option value="B- RBC">B- RBC</option>
                    <option value="B- WBC">B- WBC</option>
                    <option value="B- Plasma">B- Plasma</option>
                    <option value="B- Platelet">B- Platelets</option>
                    <option value="AB+ RBC">AB+ RBC</option>
                    <option value="AB+ WBC">AB+ WBC</option>
                    <option value="AB+ Plasma">AB+ Plasma</option>
                    <option value="AB+ Platelet">AB+ Platelets</option>
                    <option value="AB- RBC">AB- RBC</option>
                    <option value="AB- WBC">AB- WBC</option>
                    <option value="AB- Plasma">AB- Plasma</option>
                    <option value="AB- Platelet">AB- Platelets</option>
                    <option value="O+ RBC">O+ RBC</option>
                    <option value="O+ WBC">O+ WBC</option>
                    <option value="O+ Plasma">O+ Plasma</option>
                    <option value="O+ Platelet">O+ Platelets</option>
                    <option value="O- RBC">O- RBC</option>
                    <option value="O- WBC">O- WBC</option>
                    <option value="O- Plasma">O- Plasma</option>
                    <option value="O- Platelet">O- Platelets</option>
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
            <div class="status-container">
                <label class="status-lable" for="hosname">Requesting Hospital/Medical Center Name</label>
                <br>
                <input id="status" class="status-input" type="text" name="hosname" autofocus placeholder="Requesting Hospital/Medical Center" required>
                
            </div>
                <div>
                <button id="submit-btn" class='brown-button-rep generate-analytics' type='submit' name='gen_report'>Generate report</button>                            </div>
        </form>       
    </div>

</body>
</html>