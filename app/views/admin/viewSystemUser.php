<?php 
$metaTitle = "View System User" 
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
        <p class="update-user-title">SystemUser details</p>
            <div class="hospital-viewicon">
                <img src="../../../public/img/admindashboard/systemuser.png" alt="hospital" id="hospital-viewicon">
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
                <label class="statusview-lable" for="status">NIC   : <div class="content"><?php echo $_SESSION['NIC'] ?></div></label>
                <br>
            </div>
            <div class="dob-container">
                <label class="dobview-lable" for="dob">Blood Bank ID   : <div class="content"><?php echo $_SESSION['BloodBankID'] ?></div></label>
                <br>
            </div>
            <div class="btype-container">
                <label class="btypeview-lable" for="btype">Blood Bank Name   : <div class="content"><?php echo $_SESSION['BloodBankName'] ?></div></label>
                <br>
            </div>

            <div class="donorlocation-container">
                <label class="locationview-lable" for="location">Email    : <div class="content"><?php echo $_SESSION['Email'] ?><br></div></label>
                <br>
            </div>
            <div class="sysemail-viewcontainer">
                <label class="emailview-lable" for="email">Contact No    : <div class="content"><?php echo $_SESSION['Contact_no'] ?></div></label>
                <br>
            </div>
            <div class="syscontact-viewcontainer">
                <label class="contactview-lable" for="contact">Username    : <div class="content"><?php echo $_SESSION['Username'] ?></div></label>
                <br>
            </div>
            <div>
                <a href="/usermanage/type?page=1"><button class='brown-button-view' type='submit' name='update-hosmed' >Back to users</button></a>
            </div>
        
    </div>
                
    

</body>
</html>