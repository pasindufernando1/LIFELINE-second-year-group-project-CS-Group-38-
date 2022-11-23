<?php 
$metaTitle = "Add Blood Type" 
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
    <link href="../../../public/css/extra/custom-select.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">

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
                        <p class="add-reservation-title">Add Blood Type</p>
                        <form action="/reservation/add_reserve_type" method="post">
                            <div class="reserve-id-container">
                                <label class="reserve-id-lable" for="type_id">Type ID:</label>
                                <br>
                                <input id="type_id" class="reserve-id-input" type="text" name="type_id" autofocus placeholder="<?php echo $_SESSION['rowCount']+1 ?>" disabled>
                            </div>
                            <<div class="blood-group-container">
                                <label class="blood-group-lable" for="blood_group">Blood Group/Type:</label>
                                <br>
                                <input id="blood_group" class="blood-group-input" type="text" name="blood_group" autofocus placeholder="Blood Group/Type" required>
                                
                            </div>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="Storing_Constraints">Storing Constraints:</label>
                                <br>
                                <input id="Storing_Constraints" class="quantity-input" type="text" name="Storing_Constraints" autofocus placeholder="Storing Constraints" required>
                            </div>
                            <div class="expiry-constraints-container">
                                <label class="expiry-constraints-lable" for="expiry_constraints">Expiry Constraints:</label>
                                <br>
                                <input id="expiry_constraints" class="expiry-constraints-input" type="text" name="expiry_constraints" autofocus placeholder="Expiry Constraints" required>

                                <button class='brown-button' type='submit' name='add-reservation-type'>Add Type</button>
                                <img class="addbutton" src="./../../public/img/dashboard/add-button.png" alt="add-button">
                                <a class='outline-button' type='reset' name='cancel-adding' href="/reservation/type?page=1">Cancel Adding</a>
                                <img class="cancelbutton" src="./../../public/img/dashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                    </div>

                </div>

            </div>


        </div>

    </div>

</body>
</html>