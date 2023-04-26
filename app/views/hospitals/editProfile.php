<?php 

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
            <img src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
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
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>

                    <div class="requestBlood menu-item">
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/non-active/Request blood.png" alt="requestBlood">
                        <img class="requestBlood-non-active" src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>
                    
                    
                    
                    <div class="profile-selected">
                    <div class="marker"></div>
                        <!-- <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="#">Profile</a></p>

                    </div>

                </div>

            </div>

            
            <div class="cont">
                <form action="/requestBlood/edit_profile" method="POST" id="addform" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="image-1">
                            
                            <img class="hospital_img" id="hospital_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
                            <div class="image-upload">
                                <label for="file-input">
                                <img class="change_img" src="../../../public/img/hospitalsdashboard/lil_cam.png">
                                </label>
                                <input id="file-input" name="fileToUpload" type="file" onchange="readURL(this);">
                            </div>
                        </div>
                        <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                document.getElementById("hospital_img").src = e.target.result;
                            };
                            reader.readAsDataURL(input.files[0]);
                            }
                        }
                        </script>
                        <div class="user">
                            <p class="usr-name"><?php echo ($_SESSION['username']); ?></p><br>
                            <p class="usr-type"><?php echo ($_SESSION['UserType']); ?></p><br>
                        </div>
                    </div>
                    
                    
                    <label id="hosName-label" class="hosName-label" for="campName">Hospital Name:</label>
                    <br>
                    <input class="hosName-input" id="hosName"  type="text" name="hosName" autofocus placeholder="Hospital Name" required>
                    <br>

                <label id="teleNo-label" class="teleNo-label" for="teleNo">Telephone Number:</label>
                <br>
                <input class="teleNo-input" id="teleNo"  type="text" name="teleNo" autofocus placeholder="Telephone Number" required>
                <br>

                <label id="loc-label" class="loc-label" for="loc">Location:</label>
                <br>
                <input class="num-input" id="num"  type="text" name="num" autofocus placeholder="Number" required>
                <br>
                <input class="laneNme-input" id="laneNme"  type="text" name="laneNme" autofocus placeholder="Lane Name" required>
                <br>
                <input class="cit-input" id="cit"  type="text" name="cit" autofocus placeholder="City" required>
                <br>
                <select class="dis-input" id="dis"  type="text" name="dis" autofocus placeholder="District" required>
                <option value="" disabled selected hidden>District</option>
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
                <br>
                <select class="prov-input" id="prov"  type="text" name="prov" autofocus placeholder="Province" required>
                <option value="" disabled selected hidden>Province</option>
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
                <br>

                <label id="em-label" class="em-label" for="em">Email Address:</label>
                <br>
                <input class="em-input" id="em"  type="text" name="em" autofocus placeholder="Email Address" required>
                <br>

                <label id="currentPw-label" class="currentPw-label" for="currentPw">Current Password:</label>
                <br>
                <input class="currentPw-input" id="currentPw"  type="password" name="currentPw" autofocus placeholder="Current Password" required>
                <br>

                <label id="newPw-label" class="newPw-label" for="newPw">New Password:</label>
                <br>
                <input class="newPw-input" id="newPw"  type="password" name="newPw" autofocus placeholder="New Password" required>
                <br>

                <button class="update-button" type="submit" name="request" id="submit-btn">Update Profile</button>
                <button class="cancl-button" type="reset" name="cancel-adding" ><a href="/requestApproval/viewProfile/" class="cancel">Cancel Adding</a></button>
                </form>
            </div>
            