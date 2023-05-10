<?php 
    $metaTitle = "View Admin" 
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
    <link href="../../../public/css/admin/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/users_active_sidebar.php'); ?>

    <div class="box">
        <p class="update-user-title">Admin details</p>
            <div class="hospital-viewicon">
                <img src="../../../public/img/user_pics/<?php echo $_SESSION['Userpic'] ?>" alt="systemuser" id="hospital-viewicon">
            </div>
            <div class="quantity-container">
                <label class="nameview-lable" for="name">Name    : <div class="content"><?php echo $_SESSION['Name'] ?></div></label>
                <br>
            </div>
            <div class="reg-container">
                <label class="regview-lable" for="regno">UserID    : <div class="content"><?php echo $_SESSION['user_id'] ?></div></label>
                <br>
            </div>
            <div class="status-container">
                <label class="statusview-lable" for="status">Email   : <div class="content"><?php echo $_SESSION['Email'] ?></div></label>
                <br>
            </div>
            <div class="dob-container">
                <label class="dobview-lable" for="dob">Contact No   : <div class="content"><?php echo $_SESSION['Contact_no'] ?></div></label>
                <br>
            </div>
            <div class="btype-container">
                <label class="btypeview-lable" for="btype">Username   : <div class="content"><?php echo $_SESSION['Username'] ?></div></label>
                <br>
            </div>

            
            <div>
                <?php 
                    $status = false;
                    if(isset($_SESSION['is_filtered'])){
                        $status = $_SESSION['is_filtered']? 'true' : 'false';
                    }else{
                        $status = 'false';
                    }
                
                echo '<a href="/usermanage/type?filter='.$status.'&page=1"><button class="brown-button-view-admin" type="submit" name="update-hosmed" >Back to users</button></a>'

                ?>
            </div>
        
    </div>
                
    

</body>
</html>