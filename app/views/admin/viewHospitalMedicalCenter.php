<?php 

$metaTitle = "Admin Dashboard" 
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
    <div class="top-bar">
        <div class="logo">
            <img src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
        </div>
        <div class="search">
            <img src="./../../public/img/admindashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/admindashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/admindashboard/pasindudp.jpg" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo ($_SESSION['username']); ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo ($_SESSION['type']); ?> <br> 
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/admindashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/adminuser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard-non menu-item">       
                        <img class="" src="./../../public/img/dashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash " src="../../../public/img/dashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/adminuser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="reservation menu-item">
                        <img class="reservation-active" src="./../../public/img/admindashboard/non-active/reservation.png" alt="reservation">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reservation.png" alt="reservation">
                        <p class="reservation-nav menu-item"><a href="#">Reserves</a></p>

                    </div>
                    <div class="users-selected">
                        <div class="marker"></div>
                        <img class="users-active" src="./../../public/img/admindashboard/active/cards.png" alt="users">
                        <p class="users-act "><a href="/usermanage/type?page=1">Users</a></p>

                    </div>
                    <div class="inventory menu-item">
                        <img src="./../../public/img/admindashboard/non-active/inventory.png" alt="inventory">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/inventory.png" alt="inventory">
                        <p class="inventory-nav "><a href="#">Inventory</a></p>

                    </div>
                    <div class="donors menu-item">
                        <img src="./../../public/img/admindashboard/non-active/donors.png" alt="donors">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/donors.png" alt="donors">
                        <p class="donors-nav menu-item"><a href="#">Donors</a></p>

                    </div>
                    <div class="reports menu-item">
                        <img src="./../../public/img/admindashboard/non-active/reports.png" alt="reports">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reports.png" alt="reports">
                        <p class="reports-nav "><a href="#">Reports</a></p>

                    </div>
                    <div class="campaigns menu-item">
                        <img src="./../../public/img/admindashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/campaigns.png" alt="campaigns">
                        <p class="campaigns-nav "><a href="#">Campaigns</a></p>

                    </div>
                     <div class="badges menu-item">
                        <img src="./../../public/img/admindashboard/non-active/badge.png" alt="badges">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/badge.png" alt="campaigns">
                        <p class="badges-nav "><a href="#">Badges</a></p>

                    </div>
                    <div class="advertisements menu-item">
                        <img src="./../../public/img/admindashboard/non-active/ad.png" alt="advertisements">
                        <img class="reservation-non-active " src="./../../public/img/admindashboard/active/ad.png" alt="campaigns">
                        <p class="advertisements-nav "><a href="#">Advertisements</a></p>

                    </div>
                    <div class="line"></div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/admindashboard/non-active/profile.png" alt="profile">
                        <img class="reservation-non-active" src="./../../public/img/admindashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>

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
                            <!-- <div class="uid-container">
                                <label class="uid-lable" for="userID">UserID</label>
                                <br>
                                <input id="uid" class="uid-input" type="text" name="uid" autofocus placeholder="UserID">
                            </div> -->
                            <!-- <div class="password-container">
                                <label class="password-lable" for="password">Password</label>
                                <br>
                                <input id="password" class="password-input" type="text" name="password" autofocus placeholder="New Password" >
                            </div> -->
                            <!-- <div class="reserve-id-container">
                                <label class="reserve-id-lable" for="reserve_id">Reserve ID:</label>
                                <br>
                                <input id="reserve_id" class="reserve-id-input" type="text" name="reserve_id" autofocus placeholder="<?php echo $_SESSION['rowCount']+1 ?>" disabled>
                            </div>
                            <div class="blood-group-container">
                                <label class="blood-group-lable" for="blood_group">Blood Group/Type:</label>
                                <br>
                                
                                <div class="custom-select">
                                    <select name="blood_group" id="blood_group" class="blood-group-input" autofocus placeholder="Blood Group/Type" required>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB+">AB+</option>
                                    </select>
                                </div>
                                <script src="../../../public/js/custom-select.js"></script>
                            </div>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="quantity">Quantity:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Quantity" required>
                            </div> -->
                            <!-- <div class="expiry-constraints-container">
                                <label class="expiry-constraints-lable" for="expiry_constraints">Expiry Constraints:</label>
                                <br>
                                <input id="expiry_constraints" class="expiry-constraints-input" type="text" name="expiry_constraints" autofocus placeholder="Expiry Constraints" required> -->
                            <div>
                                <a href="/usermanage/type?page=1"><button class='brown-button-view' type='submit' name='update-hosmed' >Back to users</button></a>
                            </div>
                        
                    </div>
                </div>

            </div>


        </div>

    </div>

</body>
</html>