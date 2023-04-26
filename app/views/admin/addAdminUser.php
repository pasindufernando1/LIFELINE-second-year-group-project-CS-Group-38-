<?php 
$metaTitle = "Add Admin" 
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
    <link href="../../../public/css/admin/sysadd.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    
    <!-- header -->
   <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/users_active_sidebar.php'); ?>
    <div class="box">
        <p class="add-user-title">Add New Admin</p>
        
        <form action="/usermanage/addnewAdmin" method="post" enctype="multipart/form-data" id="addform"> 
            <div class="form-placement">
                <div class="fullname-container">
                    <label class="fullname-lable" for="fullname">Full Name</label>
                    <br>
                    <input id="fullname" class="fullname-input" type="text" name="fullname" autofocus placeholder="Fullname" required>
                </div>
                <div class="email-container">
                    <label id="email-label" class="email-lable" for="email">Email</label>
                    <br>
                    <input id="email" class="email-input" type="text" name="email" autofocus placeholder="Email" required>
                </div>
                <div class="contact-container">
                    <label id="contact-label" class="contact-lable" for="contact">Contact No</label>
                    <br>
                    <input id="contact" class="contact-input" type="text" name="contact" autofocus placeholder="Contact number" required>
                </div>
                <div class="uname-container">
                    <label class="uname-lable" for="uname">Username</label>
                    <br>
                    <input id="uname" class="uname-input" type="text" name="uname" autofocus placeholder="Username" required>
                </div>
                
                <div class="password-container">
                    <label id="password-label" class="password-lable" for="password">Password</label>
                    <br>
                    <input id="password" class="password-input" type="password" name="password" autofocus placeholder="Password" required>
                </div>
                
                <div>
                    <button id="submit-btn" class='brown-button' type='submit' name='add-admin'>Add Admin</button>
                    <img class="addbutton" src="./../../public/img/admindashboard/add-button.png" alt="add-button">
                    <a class='outline-button' type='reset' name='cancel-adding' href="/usermanage/type?page=1">Cancel Adding</a>
                    <img class="cancelbutton" src="./../../public/img/admindashboard/cancel-button.png" alt="cancel-button">
                </div>
            </div>
        </form>
    </div>
    <script src="../../../public/js/validation/uservalidation.js"></script>
</body>

</html>