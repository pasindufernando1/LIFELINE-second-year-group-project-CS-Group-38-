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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>


            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                <div class="dashboard menu-item">       
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard"> 
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="requestBlood-selected">
                        <div class="marker"></div>
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/active/request blood.png" alt="requestBlood">
                        <p class="requestBlood-act"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>
                    </div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/requestBlood/viewProfile">Profile</a></p>
                    </div>  

                    
                    <div class="box1">
                    <h2 class="add-user-title">Request Blood</h2>
                    <form action="/requestBlood/addRequest/" method="post" id="addform">
                    
                        <div class="bloodGroup-container">
                            <label class="bloodGroup-label" for="bloodGroup">Blood Group:</label>
                            <br>
                            <select class="bloodGroup-input" id="bloodGroup"  type="text" name="bloodGroup" autofocus placeholder="Enter BloodGroup" required>
                            <img class="dropDown" src="./../../public/img/hospitalsdashboard/dropDown.png" alt="dropDown">
                                <option value="" disabled selected hidden>Blood Group</option>
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
                                <option value="" disabled selected hidden>Blood Component</option>
                                <option value="RBC">Red Blood Cells</option>
                                <option value="WBC">White Blood Cells</option>
                                <option value="Platelets">Platelets</option>
                                <option value="Plasma" >Plasma</option>
                            <select>
                        </div>
                        <div class="quant-container">
                            <label id="quantity-label" class="quantity-label" for="quantity">Quantity:</label>
                            <br>
                            <input class="quantity-input" id="quantity"  type="text" name="quantity" autofocus placeholder="Enter Quantity" required>
                        </div>
                        <!-- <div class="bloodbank-container">
                            <label class="bloodbank-label" for="bloodbank">Blood Bank:</label>
                            <br>
                            <input class="bloodbank-input" id="bloodbank"  type="text" name="bloodbank" autofocus placeholder="Enter BloodbankID" required>
                        </div> -->
                        <div>
                            <button class='brown-button' type='submit' name='request' id="submit-btn">Request</button>
                            <!--img class="requestbutton" src="./../../public/img/hospitalsdashboard/requestbtn.png" alt="request-button"-->
                            <button class='outline-button' type='reset' name='cancel-adding' ><a href="/requestBlood/viewReqBlood" class="cancel">Cancel Adding</a></button>
                            <!-- <img class="cancelbutton" src="./../../public/img/hospitalsdashboard/cancelbtn.png" alt="cancel-button"> -->
                        </div>
                    </form>
                   <script src="../../../public/js/validation/uservalidation.js"></script>

                    </div>


                    
                    

                    
                    
                
                </div>

            </div>


        </div>

    </div>

</body>
</html>