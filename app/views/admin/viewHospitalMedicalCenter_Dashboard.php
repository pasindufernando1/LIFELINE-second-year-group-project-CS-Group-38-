<?php 

$metaTitle = "View Hospital Medical Center" 
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
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard menu-items">
                <div class="marker"></div>
                <img src="./../../public/img/admindashboard/active/dashboard.png" alt="dashboard">
                <p class="dashboard-active"><a href="/user/dashboard?page=1">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/admindashboard/non-active/reservation.png" alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reservation.png" alt="reservation">
                <p class="reservation-nav menu-item"><a href="/reserves/type?page=1">Reserves</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/admindashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/cards.png" alt="donor-cards">
                <p class="users-nav "><a href="/usermanage/type?page=1">Users</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/admindashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/inventory.png" alt="inventory">
                <p class="inventory-nav "><a href="/inventory/type?page=1">Inventory</a></p>

            </div>
            <div class="donors menu-item">
                <img src="./../../public/img/admindashboard/non-active/donors.png" alt="donors">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/donors.png" alt="donors">
                <p class="donors-nav menu-item"><a href="/donors/type?page=1">Donors</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/admindashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reports.png" alt="reports">
                <p class="reports-nav "><a href="/reports/type?page=1">Reports</a></p>

            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/admindashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/campaigns.png" alt="campaigns">
                <p class="campaigns-nav "><a href="/adcampaigns/type?page=1">Campaigns</a></p>

            </div>
                <div class="badges menu-item">
                <img src="./../../public/img/admindashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/badge.png" alt="campaigns">
                <p class="badges-nav "><a href="/adbadges/type?page=1">Badges</a></p>

            </div>
            <div class="advertisements menu-item">
                <img src="./../../public/img/admindashboard/non-active/ad.png" alt="advertisements">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/ad.png" alt="campaigns">
                <p class="advertisements-nav "><a href="/adadvertisements/type?page=1">Advertisements</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/admindashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/profile.png" alt="profile">
                <p class="profile-nav "><a href="/adprofile/">Profile</a></p>

            </div>
        </div>
    </div>
    

    <div class="box">
        <p class="update-user-title">Hospital/Medical Center details</p>
            <div class="hospital-viewicon">
                <img src="../../../public/img/admindashboard/hospitalviewicon.png" alt="hospital" id="hospital-viewicon">
            </div>
            <div class="quantity-container">
                <label class="nameview-lable" for="name">Name    : <div class="content"><?php echo $_SESSION['Name'] ?></div></label>
                <br>
            </div>
            <div class="reg-container">
                <label class="regview-lable" for="regno">Registration number    : <div class="content"><?php echo $_SESSION['Registration_no'] ?></div></label>
                <br>
            </div>
            <div class="status-container">
                <label class="statusview-lable" for="status">Status    : <div class="content">
                    <?php if($_SESSION['Status']==1)
                        {   echo "Verified";}
                        else{
                            echo "Not verified";
                        }        ?></div></label>
                <br>
            </div>
            <div class="location-container">
                <label class="locationview-lable" for="location">Location    : <div class="content"><?php echo $_SESSION['Number'] ?> , <?php echo $_SESSION['LaneName'] ?>,<br><?php echo $_SESSION['City'] ?>,<br><?php echo $_SESSION['District'] ?>,<br><?php echo $_SESSION['Province'] ?> Province.<br></div></label>
                <br>
            </div>
            <div class="email-viewcontainer">
                <label class="emailview-lable" for="email">Email    : <div class="content"><?php echo $_SESSION['Email'] ?></div></label>
                <br>
            </div>
            <div class="contact-viewcontainer">
                <label class="contactview-lable" for="contact">Contact No    : <div class="content"><?php echo $_SESSION['Contact_no'] ?></div></label>
                <br>
            </div>
            <div class="uname-viewcontainer">
                <label class="unameview-lable" for="uname">Username: <div class="content"><?php echo $_SESSION['Username'] ?></div></label>
                <br>
            </div>
            <div class="uid-viewcontainer">
                <label class="uidview-lable" for="uid">UserID: <div class="content"><?php echo $_SESSION['user_id'] ?></div></label>
                <br>
            </div>
            <div>
                <a href="/user/dashboard?page=1"><button class='brown-button-view' type='submit' name='update-hosmed' >Back to Dashboard</button></a>
            </div>
        
    </div>
                

</body>
</html>