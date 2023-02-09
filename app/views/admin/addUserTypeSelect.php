<?php 

$metaTitle = "Add User Type Select" 
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
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/users_active_sidebar.php'); ?>

    <div class="box">
        <p class="entity-select-title">Choose entity to be added</p>
        <!-- Add four buttons -->
        <a href="/usermanage/addSystemUser"><button class="button-sys-add user-btn"><img class="usericon"  src="./../../public/img/admindashboard/sysusericon.png" alt="systemuser"><p>System User<p></button></a>
        <a href="/usermanage/addHospitalMedCenter"><button class="button-hos-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/hospitalicon.png" alt="hospital/medical center">Hospital/Medical Center</button></a>
        <a href="/usermanage/addDonor"><button class="button-donor-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/donoricon.png" alt="donor">Donor</button></a>
        <a href="/usermanage/addOrganizationSociety"><button class="button-org-add user-btn" ><img class="usericon" src="./../../public/img/admindashboard/organizationicon.png" alt="organizaion/society">Organization/Society</button></a>
    </div>

</body>
</html>