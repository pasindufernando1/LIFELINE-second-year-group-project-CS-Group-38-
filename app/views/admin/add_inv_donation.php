<?php 
$metaTitle = "Inventory Donation" 
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
    <link href="../../../public/css/admin/advertisements.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/ad_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <p class="add-user-title">New inventory donation advertisement</p>
        <form action="/adadvertisements/add_invad_done" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label id= "description-lable" class="quantity-lable" for="description">Description : </label>
                <br>
                <input id="quantity" class="quantity-input" type="text" name="description" autofocus placeholder="Description" required>
            <div class="reg-container">
                <label id ="reg-label" class="reg-lable" for="total_amt">Inventory Category:</label>
                <br>
                <select class="reg-input" type="text" name="inventory_category" id="category" placeholder="Category" required>
                    <option value="" disabled selected hidden>Select Category</option>
                        <?php foreach ($_SESSION['inventory'] as $category) : ?>
                            <option value="<?php echo $category ?>"><?php echo $category ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
            <div class="blood-container">
                <label id ="reg-label" class="reg-lable" for="total_amt">Related Blood Bank:</label>
                <br>
                <select class="reg-input" type="text" name="bloodbankid" id="bloodbankid" placeholder="Blood Bank ID" required>
                    <option value="" disabled selected hidden>Select BloodBank</option>
                        <?php foreach ($_SESSION['bloodbanks'] as $bloodbank) : ?>
                            <option value="<?php echo $bloodbank[0]; ?>"><?php echo $bloodbank[0]." : ".$bloodbank[1]; ?></option>
                        <?php endforeach; ?>
                </select>
            </div>
            <!-- Container to upload the badge image -->
            <div class="image-1">
                    <label id="image-label" class="image-lable" for="file-input">Advertisement Pic</label>
                    <div class="image-upload">
                        <label for="file-input" class="icons">
                            <img class="camera-icon" id="camera-icon" src="../../../public/img/admindashboard/camera.png" src/>
                            <img id="browsepic" class="browsepic" src="../../../public/img/admindashboard/browseimg.png" />
                        </label>

                        <input id="file-input" name="fileToUpload" type="file" onchange="readURL(this);" />
                        <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    document.getElementById("camera-icon").src = e.target.result;
                                };
                                reader.readAsDataURL(input.files[0]);
                                }
                            }
                        </script>
                    </div>
            </div>

            <div>
                <button id="submit-btn" class='brown-button' type='submit' name='add-badge'>Publish Add</button>
                <img class="addbutton" src="./../../public/img/admindashboard/publish.png" alt="add-button">
                <a class='outline-button' type='reset' name='cancel-adding' href="/adadvertisements/type?page=1">Cancel Adding</a>
                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
            </div>
        </form>       
    
    </div>
    <script src="../../../public/js/validation/basicvalidation.js"></script>


</body>
</html>