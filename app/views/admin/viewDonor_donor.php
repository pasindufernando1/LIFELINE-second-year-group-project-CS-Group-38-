<?php 

$metaTitle = "View Donor" 
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/donors_active_sidebar.php'); ?>

    <div class="box">
        <p class="update-user-title">Donor details</p>
            <div class="hospital-viewicon">
                <img src="../../../public/img/admindashboard/blood-donor.png" alt="hospital" id="hospital-viewicon">
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
                <label class="dobview-lable" for="dob">Date of Birth   : <div class="content"><?php echo $_SESSION['DOB'] ?></div></label>
                <br>
            </div>
            <div class="btype-container">
                <label class="btypeview-lable" for="btype">Blood type   : <div class="content"><?php echo $_SESSION['Bloodtype'] ?></div></label>
                <br>
            </div>

            <div class="donorlocation-container">
                <label class="locationview-lable" for="location">Location    : <div class="content"><?php echo $_SESSION['Number'] ?> , <?php echo $_SESSION['LaneName'] ?>,<br><?php echo $_SESSION['City'] ?>,<br><?php echo $_SESSION['District'] ?>,<br><?php echo $_SESSION['Province'] ?> Province.<br></div></label>
                <br>
            </div>
            <div class="donoremail-viewcontainer">
                <label class="emailview-lable" for="email">Email    : <div class="content"><?php echo $_SESSION['Email'] ?></div></label>
                <br>
            </div>
            <div class="donorcontact-viewcontainer">
                <label class="contactview-lable" for="contact">Contact No    : <div class="content"><?php echo $_SESSION['Contact_no'] ?></div></label>
                <br>
            </div>
            <div class="donoruname-viewcontainer">
                <label class="unameview-lable" for="uname">Username: <div class="content"><?php echo $_SESSION['Username'] ?></div></label>
                <br>
            </div>
            <div class="donorgender-viewcontainer">
                <label class="genderview-lable" for="uname">Gender: <div class="content"><?php echo $_SESSION['Gender'] ?></div></label>
                <br>
            </div>
            <div>
                <a href="/donors/type?page=1"><button class='brown-button-view' type='submit' name='update-hosmed' >Back to donors</button></a>
            </div>
        
    </div>
                

</body>
</html>