<?php 
$_SESSION['bloodbankid']=$_GET['bloodbank'];
$metaTitle = "Hospitals Dashboard" 
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
    <link href="../../../public/css/hospitals/requestBlood.css" rel="stylesheet">

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
            <img src="../../../public/img/hospitalsdashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/hospitalsdashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/hospitalsdashboard/hospital logo.png" alt="profile-pic">
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
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/hospitalsdashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/hospitaluser/logout">Log Out</a>
                </div>
            </div>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                    <div class="dashboard menu-item">       
                        <img class="dashboard-active" src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="dashboard-non-active" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-nav"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="requestBlood menu-items">
                        <div class="marker"></div>
                        <img src="./../../public/img/hospitalsdashboard/active/request blood.png" alt="requestBlood">
                        <p class="requestBlood-active"><a href="#">Request Blood</a></p>
                    </div>
                    <div class="profile menu-item">
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="#">Profile</a></p>
                    </div>

                    
                    <div class="box1">
                    <h2 class="add-user-title">Request Blood</h2>
                    <form action="/requestBlood/addRequest/" method="post">
                    
                        <div class="bloodGroup-container">
                            <label class="bloodGroup-label" for="bloodGroup">Blood Group:</label>
                            <br>
                            <select class="bloodGroup-input" id="bloodGroup"  type="text" name="bloodGroup" autofocus placeholder="Enter BloodGroup" required>
                            <img class="dropDown" src="./../../public/img/hospitalsdashboard/dropDown.png" alt="dropDown">
                            
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+" >B+</option>
                                <option value="B-" >B-</option>
                                <option value="O+" >O+</option>
                                <option value="O-" >O-</option>
                                <option value="AB+" >AB+</option>
                                <option value="AB-" >AB-</option>
                            <select>
                            
                        </div>
                        <div class="bloodComp-container">
                            <label class="bloodComponent-label" for="bloodComponent">Blood Component:</label>
                            <br>
                            <select class="bloodComponent-input" id="bloodComponent"  type="text" name="bloodComponent" autofocus placeholder="Enter BloodComponent" required>
                            <img class="dropDown" src="./../../public/img/hospitalsdashboard/dropDown.png" alt="dropDown">
                                <option value="Red Blood Cells">Red Blood Cells</option>
                                <option value="Platelets">Platelets</option>
                                <option value="Plasma" >Plasma</option>
                            <select>
                        </div>
                        <div class="quant-container">
                            <label class="quantity-label" for="quantity">Quantity:</label>
                            <br>
                            <input class="quantity-input" id="quantity"  type="text" name="quantity" autofocus placeholder="Enter Quantity" required>
                        </div>
                        <!-- <div class="bloodbank-container">
                            <label class="bloodbank-label" for="bloodbank">Blood Bank:</label>
                            <br>
                            <input class="bloodbank-input" id="bloodbank"  type="text" name="bloodbank" autofocus placeholder="Enter BloodbankID" required>
                        </div> -->
                        <div>
                            <button class='brown-button' type='submit' name='request'>Request</button>
                            <!--img class="requestbutton" src="./../../public/img/hospitalsdashboard/requestbtn.png" alt="request-button"-->
                            <a class='outline-button' type='reset' name='cancel-adding' href="/requestBlood">Cancel Adding</a>
                            <img class="cancelbutton" src="./../../public/img/hospitalsdashboard/cancelbtn.png" alt="cancel-button">
                        </div>
                    </form>

                    </div>


                    
                    

                    
                    
                
                </div>

            </div>


        </div>

    </div>

</body>
</html>