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
                        <p class="update-user-title">Update Hospital/Medical Center details</p>
                        
                        <!-- <a href="/reservation/add" class="brown-button addnew-user">Add New</a>
                        <img class="adduser-pic" src="./../../public/img/dashboard/add-button.png" alt="add-button">

                        <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img"> -->

                        
                        <?php echo '<form action="/usermanage/editHospitalMedCenter/'.$_SESSION['user_id']. '" method="post">' ?>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="name">Name:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="name" value="<?php echo $_SESSION['Name'] ?>" required>
                            </div>
                            <div class="reg-container">
                                <label class="reg-lable" for="regno">Registration number:</label>
                                <br>
                                <input id="regno" class="reg-input" type="text" name="regno" value="<?php echo $_SESSION['Registration_no'] ?>" required>
                            </div>
                            <div class="status-container">
                                <label class="status-lable" for="status">Status</label>
                                <br>
                                <input id="status" class="status-input" type="text" name="status" value="<?php echo $_SESSION['Status'] ?>" required>
                            </div>
                            <div class="location-container">
                                <label class="location-lable" for="location">Location:</label>
                                <br>
                                <input id="number" class="number-input" type="text" name="number" value="<?php echo $_SESSION['Number'] ?>" required>
                                <input id="lane" class="lane-input" type="text" name="lane" value="<?php echo $_SESSION['LaneName'] ?>" required>
                                <input id="city" class="city-input" type="text" name="city" value="<?php echo $_SESSION['City'] ?>" required>
                                <select id="district" class="district-input custom-select" type="text" required>
                                        <!-- Show placeholder -->
                                        <option value="<?php echo $_SESSION['District'] ?>"><?php echo $_SESSION['District'] ?></option>
                                        <option value="Ampara">Ampara</option>
                                        <option value="Anuradhapura">Anuradhapura</option>
                                        <option value="Badulla">Badulla</option>
                                        <option value="Batticaloa">Batticaloa</option>
                                        <option value="Colombo">Colombo</option>
                                        <option value="Galle">Galle</option>
                                        <option value="Gampaha">Gampaha</option>
                                        <option value="Hambantota">Hambantota</option>
                                        <option value="Jaffna">Jaffna</option>
                                        <option value="Kalutara">Kalutara</option>
                                        <option value="Kandy">Kandy</option>
                                        <option value="Kegalle">Kegalle</option>
                                        <option value="Kilinochchi">Kilinochchi</option>
                                        <option value="Kurunegala">Kurunegala</option>
                                        <option value="Mannar">Mannar</option>
                                        <option value="Matale">Matale</option>
                                        <option value="Matara">Matara</option>
                                        <option value="Monaragala">Monaragala</option>
                                        <option value="Mullaitivu">Mullaitivu</option>
                                        <option value="Nuwara Eliya">Nuwara Eliya</option>
                                        <option value="Polonnaruwa">Polonnaruwa</option>
                                        <option value="Puttalam">Puttalam</option>
                                        <option value="Ratnapura">Ratnapura</option>
                                        <option value="Trincomalee">Trincomalee</option>
                                        <option value="Vavuniya">Vavuniya</option>
                                </select>
                                <select id="province" class="province-input custom-select" type="text" name="province" required>
                                        <!-- Show placeholder -->
                                        <option value="<?php echo $_SESSION['Province'] ?>"><?php echo $_SESSION['Province'] ?></option>
                                        <option value="Central">Central</option>
                                        <option value="Eastern">Eastern</option>
                                        <option value="North Central">North Central</option>
                                        <option value="Northern">Northern</option>
                                        <option value="North Western">North Western</option>
                                        <option value="Sabaragamuwa">Sabaragamuwa</option>
                                        <option value="Southern">Southern</option>
                                        <option value="Uva">Uva</option>
                                        <option value="Western">Western</option>
                                </select>

                            </div>
                            <div class="email-container">
                                <label class="email-lable" for="email">Email</label>
                                <br>
                                <input id="email" class="email-input" type="text" name="email" value="<?php echo $_SESSION['Email'] ?>" required>
                            </div>
                            <div class="contact-container">
                                <label class="contact-lable" for="contact">Contact No</label>
                                <br>
                                <input id="contact" class="contact-input" type="text" name="contact" value="<?php echo $_SESSION['Contact_no'] ?>" required>
                            </div>
                            <div class="uname-container">
                                <label class="uname-lable" for="uname">Username</label>
                                <br>
                                <input id="uname" class="uname-input" type="text" name="uname" value="<?php echo $_SESSION['Username'] ?>" required>
                            </div>
                            <!-- <div class="uid-container">
                                <label class="uid-lable" for="userID">UserID</label>
                                <br>
                                <input id="uid" class="uid-input" type="text" name="uid" autofocus placeholder="UserID">
                            </div> -->
                            <div class="password-container">
                                <label class="password-lable" for="password">Password</label>
                                <br>
                                <input id="password" class="password-input" type="text" name="password" autofocus placeholder="New Password" >
                            </div>
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
                                <button class='brown-button-update' type='submit' name='update-hosmed'>Update Hospital/Medical Center</button>
                                <img class="addbutton" src="./../../public/img/admindashboard/updateuser.png" alt="edit-button">
                                <a class='outline-button' type='reset' name='cancel-adding' href="/usermanage/type?page=1">Cancel Updating</a>
                                <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                    </div>
                </div>

            </div>


        </div>

    </div>

</body>
</html>