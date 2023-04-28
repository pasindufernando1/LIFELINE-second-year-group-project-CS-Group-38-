<?php 
$metaTitle = "Profile" 
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
    <link href="../../../public/css/admin/profile.css" rel="stylesheet">
    <link href="../../../public/css/extra/custom-select.css" rel="stylesheet">


    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/profile_active_sidebar.php'); ?>
    
            
    <!-- main content -->
    <div class="box">
        <div class="user-details">
                <div class="image-1">
                    <img src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
                </div>
                <div class="user">
                    <p class="u-name"><?php echo ($_SESSION['username']); ?></p>
                    <p class="r-type"><?php echo ($_SESSION['type']); ?> <br></p>
                </div>
            </div>
            <div class="profile-det">
                <a href="/adprofile/edit" class="brown-button expired-stock-btn">Edit Profile</a>
                <img class="expired-stocks-img" src="./../../public/img/dashboard/white-edit.png" alt="expired-stocks">

                <div class="reserve-id-container">
                    <label class="reserve-id-lable" for="Name">Name:</label>
                    <br>
                    <input id="Name" class="reserve-id-input" type="text" name="Name" autofocus placeholder="<?php echo $_SESSION['username'] ?>" disabled>
                </div>
                <div class="blood-group-container">
                    <label class="blood-group-lable" for="Role">Role:</label>
                    <br>
                    <input id="Role" class="blood-group-input" type="text" name="Role" autofocus placeholder="<?php echo ($_SESSION['type']); ?>" disabled>

                </div>
                <div class="quantity-container">
                    <label class="quantity-lable" for="email">E-Mail:</label>
                    <br>
                    <input id="email" class="quantity-input" type="text" name="email" autofocus placeholder="<?php echo ($_SESSION['useremail']); ?>" disabled>
                </div>
                <div class="expirys-constraints-container">
                    <label class="expiry-constraints-lable" for="contact">Contact No:</label>
                    <br>
                    <input id="contact" class="expiry-constraints-input" type="text" name="contact" autofocus placeholder="<?php echo ($_SESSION['user_contact']); ?>" disabled>

                </div>
            </div>
                        
                        
    </div>

</body>
</html>