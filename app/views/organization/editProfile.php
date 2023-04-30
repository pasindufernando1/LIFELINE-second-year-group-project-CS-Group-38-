<?php 

$metaTitle = "organizations Dashboard" 

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
    <link href="../../../public/css/organization/requestApproval.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/organization/layout/header.php'); ?>

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                <div class="dashboard-non menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard">
                        <img class="reservation-non-active dash" src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/organizationuser/dashboard/">Dashboard</a></p>
                    </div>

                    <div class="campaigns menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/campaigns.png" alt="campaigns">
                        <img class="campaigns-non-active" src="./../../public/img/orgdashboard/active/campaigns.png" alt="campaigns"> 
                        <p class="campaigns-nav"><a href="/requestApproval/chooseHere">Campaigns</a></p>
                    </div>
                
                    <div class="schedule-time menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/schedule time.png" alt="schedule time">
                        <img class="schedule-time-non-active" src="./../../public/img/orgdashboard/active/schedule time.png" alt="schedule time">
                        <p class="schedule-time-nav "><a href="/requestApproval/chooseHere_scheduleTime">Schedule time</a></p>
                    </div>

                    <div class="notifications menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/notifications.png" alt="notifications">
                        <img class="notifications-non-active" src="./../../public/img/orgdashboard/active/notifications.png" alt="notifications">
                        <p class="notifications-nav "><a href="/requestApproval/getAcceptedCamps">Notifications</a></p>
                    </div>

                    <div class="cash-donations menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/cash donations.png" alt="cash donations">
                        <img class="cash-donations-non-active" src="./../../public/img/orgdashboard/active/cash donations.png" alt="cash donations">
                        <p class="cash-donations-nav "><a href="/requestApproval/donateCash">Cash donations</a></p>
                    </div>

                    <div class="inventory-donations menu-item">
                        
                        <img src="./../../public/img/orgdashboard/non-active/inventory donations.png" alt="inventory donations"> 
                        <img class="inventory-donations-non-active" src="./../../public/img/orgdashboard/active/inventory donations.png" alt="inventory donations">
                        <p class="inventory-donations-nav "><a href="/requestApproval/viewAdvertisements">Inventory </a></p>
                    </div>

                    <div class="instructions menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/instructions.png" alt="instructions">
                        <img class="instructions-non-active" src="./../../public/img/orgdashboard/active/instructions.png" alt="instructions">
                        <p class="instructions-nav "><a href="/requestApproval/viewInstructions">Instructions</a></p>
                    </div>

                    <div class="feedback menu-item">
                        <img src="./../../public/img/orgdashboard/non-active/feedback.png" alt="instructions">
                        <img class="feedback-non-active" src="./../../public/img/orgdashboard/active/feedback.png" alt="instructions">
                        <p class="feedback-nav "><a href="/requestApproval/addFeedback">Improve LIFELINE</a></p>
                    </div>

                    <div class="profile-selected">
                        <div class="marker"></div>
                        <!-- <img src="./../../public/img/orgdashboard/non-active/profile.png" alt="profile"> -->
                        <img class="profile-active" src="./../../public/img/orgdashboard/active/profile.png" alt="profile">
                        <p class="profile-act "><a href="/requestApproval/viewProfile">Profile</a></p>
                    </div>    
                </div>
            </div>
             
            <div class="profilebox">
            <form action="/requestApproval/edit_profile/" method="post" id="addform" enctype="multipart/form-data"> 
            <!-- <img class="hospital_img" src="../../../public/img/hospitalsdashboard/hospital logo.png"><br> -->
            <div class="profile-pic">
                <div class="image-1">
                    <img class="edit_hospital_img" id="hospital_img" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']);?>" alt="profile-pic">
                    <div class="image-upload">
                        <label for="file-input">
                        <img class="change_img" src="../../../public/img/hospitalsdashboard/lil_cam.png" />
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
                
                 <p class="edit_usr-name"><?php echo ($_SESSION['Username'])?></p><br>
                <p class="edit_usr-type"><?php echo($_SESSION['UserType'])?></p><br>
            </div>    
                <label id="orgName-label" class="orgName-label" for="campName">Organization Name:</label>
                <br>
                <input class="orgName-input" id="orgName"  type="text" name="orgName" value="<?php echo $_SESSION['username']?>" required>
                <br>

                <label id="teleNo-label" class="teleNo-label" for="teleNo">Telephone Number:</label>
                <br>
                <input class="teleNo-input" id="teleNo"  type="text" name="teleNo" value="<?php echo $_SESSION['telno']?>" required>
                <br>

                <label id="loc-label" class="loc-label" for="loc">Location:</label>
                <br>
                <input class="num-input" id="num"  type="text" name="num" value="<?php echo $_SESSION['Number']?>" required>
                <br>
                <input class="laneNme-input" id="laneNme"  type="text" name="laneNme" value="<?php echo $_SESSION['LaneName']?>" required>
                <br>
                <input class="cit-input" id="cit"  type="text" name="cit" value="<?php echo $_SESSION['City']?>" required>
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

                

                

                <label id="newPw-label" class="newPw-label" for="newPw">New Password:</label>
                <br>
                <input class="newPw-input" id="newPw"  type="password" name="newPw" autofocus placeholder="New Password" required>
                <br>

                <label id="confirmPw-label" class="confirmPw-label" for="confirmPw">Confirm Password:</label>
                <br>
                <input class="confirmPw-input" id="confirmPw"  type="password" name="confirmPw" autofocus placeholder="Confirm Password" required>
                <br>
                

                <button class="update-button" type="submit" name="request" id="submit-btn">Update Profile</button>
                <button class="cancl-button" type="reset" name="cancel-adding" ><a href="/requestApproval/viewProfile/" class="cancel">Cancel Adding</a></button>
                </form>
                <script src="../../../public/js/validation/orgvalidation.js"></script>
            </div>
            