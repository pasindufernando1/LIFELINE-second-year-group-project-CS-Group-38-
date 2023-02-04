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

    <link href="../../../public/css/systemuser/report.css" rel="stylesheet">
    
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
                        <p class="add-reservation-title">Blood Availability</p>
                        
                        

                        <form action="/reservation/add_reserve" method="post">
                            <div class="reserve-id-container">
                                <label class="reserve-id-lable" for="reserve_id">Report Name:</label>
                                <br>
                                <input id="reserve_id" class="reserve-id-input" type="text" name="reserve_id" autofocus placeholder="Report Name">
                            </div>
                            <div class="blood-group-container">
                                <label class="blood-group-lable" for="blood_group">Requested By:</label>
                                <br>
                                
                                <div class="custom-select">
                                    <input name="blood_group" id="blood_group" class="blood-group-input" autofocus placeholder="Requested By" required>
                                        
                                    </input>
                                </div>
                                <script src="../../../public/js/custom-select.js"></script>
                            </div>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="quantity">Blood Category/Type:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Blood Category/Type" required>
                            </div>
                            <div class="bbank-container">
                                <label class="quantity-lable" for="quantity">Province:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Province" required>
                            </div>
                            <div class="quan-container">
                                <label class="quantity-lable" for="quantity">Requesting Hospital/Medical center Name:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Requesting Hospital/Medical center Name" required>
                            </div>
                            <div class="btn-container">
                                
                                <button class='brown-button' type='submit' name='add-reservation'>Generate Report</button>
                                <img class="addbutton" src="./../../public/img/dashboard/add-button.png" alt="add-button">
                                <a class='outline-button' type='reset' name='cancel-adding' href="/sys_reports?page=1">Cancel Adding</a>
                                <img class="cancelbutton" src="./../../public/img/dashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                        

                </div>

            </div>


        </div>

    </div>

</body>
</html>