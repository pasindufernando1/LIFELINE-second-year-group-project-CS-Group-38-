<?php
$metaTitle = 'Donation Campaigns'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $metaTitle; ?>
    </title>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

    <!-- CSS Files -->
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/header.php'); ?>


    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>

    <div class="reg-edit-box">
        <form action="/getcampaign/editreg" method="post" id="reg-to-campaign">

            <p class="edit-reg-title">Edit Campaign Registration</p>
            <label class="reg-lable-cont-no " for="contno">Contact Number: </label>
            <br />
            <input class="edit-contno" id="contno" type="text" name="contno" autofocus value="<?php echo $_SESSION[
                'reg_info'
            ][1]; ?>" required>
            <p class="contno-edit-error" id="contno-error"></p>

            <label class="reg-lable-emcont-no " for="emcontno">Emergency Contact Number: </label>
            <br />
            <input class="edit-emcontno" id="emcontno" type="text" name="emcontno" autofocus value="<?php echo $_SESSION[
                'reg_info'
            ][0]; ?>" placeholder="Emergency Contact Number" required>
            <p class="emcontno-edit-error" id="emcontno-error"></p>
            <button class="regedit-button" type="submit" name="reg-edit">Save Changes
                <img src="./../../public/img/donordashboard/saved.png" class="reg-edit-btn"></button>
            <a class="regcancel-button" href="cancel_edit">Cancel Editing
                <img src="./../../public/img/donordashboard/delete-btn.png" class="reg-delete-btn"></a>
        </form>
        <script src="../../../public/js/validation/donorupdatevalidation.js"></script>


    </div>




</body>

</html>