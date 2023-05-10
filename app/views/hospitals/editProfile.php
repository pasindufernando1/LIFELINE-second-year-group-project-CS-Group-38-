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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>


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
                        <p class="profile-act "><a href="/requestBlood/viewProfile">Profile</a></p>

                    </div>

                </div>

            </div>

            
            <div class="cont">
                <form action="/requestBlood/edit_profile" method="POST" id="addform" enctype="multipart/form-data">
                    <div class="user-details">
                        <div class="image-1">
                            
                            <img class="edit_hospital_img" id="hospital_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_user_pic']);?>" alt="profile-pic">
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
                            <p class="edit_usr-name"><?php echo ($_SESSION['user_username']); ?></p><br>
                            <p class="edit_usr-type"><?php echo ($_SESSION['user_userType']); ?></p><br>
                        </div>
                    </div>
                    
                    
                    <label id="hosName-label" class="hosName-label" for="campName">Hospital Name:</label>
                    <br>
                    <input class="hosName-input" id="hosName"  type="text" name="hosName" value="<?php echo $_SESSION['user_Name']?>" >
                    <br>
                    

                <label id="teleNo-label" class="teleNo-label" for="teleNo">Telephone Number:</label>
                <br>
                <input class="teleNo-input" id="teleNo"  type="text" name="teleNo"  value="<?php echo $_SESSION['user_telno']?>" >
                <br>

                <label id="loc-label" class="loc-label" for="loc">Location:</label>
                <br>
                <input class="num-input" id="num"  type="text" name="num" value="<?php echo $_SESSION['user_Number']?>" >
                <br>
                <input class="laneNme-input" id="laneNme"  type="text" name="laneNme" value="<?php echo $_SESSION['user_LaneName']?>" >
                <br>
                <input class="cit-input" id="cit"  type="text" name="cit" value="<?php echo $_SESSION['user_City']?>" >
                <br>
                <select class="dis-input" id="dis"  type="text" name="dis" value="<?php echo $_SESSION['user_District']?>" >
                
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
                <select class="prov-input" id="prov"  type="text" name="prov" value="<?php echo $_SESSION['Province']?>" >
                
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

                <label id="newPw-label" class="newPw-label" for="newPw">New Password:</label>
                <br>
                <input class="newPw-input" id="newPw"  type="password" name="newPw" autofocus placeholder="New Password" >
                <br>

                <label id="confirmPw-label" class="confirmPw-label" for="confirmPw">Confirm Password:</label>
                <br>
                <input class="confirmPw-input" id="confirmPw"  type="password" name="confirmPw" autofocus placeholder="Confirm Password" >
                <br>

                <button class="update-button" type="submit" name="request" id="submit-btn">Update Profile</button>
                <button class="cancl-button" type="reset" name="cancel-adding" ><a href="/requestBlood/viewProfile/" class="cancel">Cancel Adding</a></button>

                <script src="../../../public/js/validation/orgvalidation.js"></script> 
                </form>
            </div>
            