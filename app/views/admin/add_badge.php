<?php 
$metaTitle = "Add Badges" 
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
    <link href="../../../public/css/admin/badges.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/badges_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box-white">
    <p class="add-user-title">Add new badge</p>
        <form action="/adbadges/add_badge_done" method="post" enctype="multipart/form-data" id="addform">
            <div class="quantity-container">
                <label id= "hospital_name-label" class="quantity-lable" for="category">Badge ID : </label>
                <br>
                <input id="quantity" class="quantity-input" type="text" name="badgeid" value="<?php echo $_SESSION['Badgeno']?>" required disabled>
            <div class="reg-container">
                <label id ="reg-label" class="reg-lable" for="badgename">Badge Name:</label>
                <br>
                <input id="reg" class="reg-input" type="text" name="badgename" autofocus placeholder="Badge Name" required>
            </div>
            <div class="status-container">
                <label class="status-lable" for="hosname">Donation Contraint</label>
                <br>
                <input id="status" class="status-input" type="text" name="constraint" autofocus placeholder="No. of donations required to achieve" required>  
            </div>
            <!-- Container to upload the badge image -->
            <div class="image-1">
                    <label id="image-label" class="image-lable" for="file-input">Badge Image</label>
                    <div class="image-upload">
                        <label for="file-input" class="icons">
                            <img class="camera-icon" id="camera-icon" src="../../../public/img/admindashboard/camera.png" src/>
                            <img id="browsepic" class="browsepic" src="../../../public/img/admindashboard/browseimg.png" />
                        </label>

                        <input id="file-input" name="fileToUpload" type="file" onchange="readURL(this);" required/>
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
                <button id="submit-btn" class='brown-button' type='submit' name='add-badge'>Add badge</button>
                <img class="addbutton" src="./../../public/img/admindashboard/badge.png" alt="add-button">
                <a class='outline-button' type='reset' name='cancel-adding' href="/adbadges/type?page=1">Cancel Adding</a>
                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
            </div>
        </form>       
    </div>

</body>
</html>