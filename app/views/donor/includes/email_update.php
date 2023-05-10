<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Files -->
    <link href="../../../../public/css/donor/dashboard.css" rel="stylesheet">
</head>

<body>
    <?php include $_SERVER['DOCUMENT_ROOT'] .'/app/views/donor/layout/header.php'; ?>
        <div id="myDialog" class="dialog">
            <div class="dialog-content">
                <h2>Change Your Email</h2>
                <form action="/donorprofile/confirm_password" method="POST">
                    <?php if (isset($_SESSION['p_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['p_error'] . "</p>";
                    } ?>
                    <label for="password">Please enter your password :</label>
                    <input type="password" id="password" name="password">
                    <button type="submit" name='confirm'>Enter</button>
                    <button id="cancelButton" onclick="hidealert()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myEmail" class="dialog">
            <div class="dialog-content">
                <p class="ppp">After submitting the new email, you will receive an OTP code...</p>
                <form action="/donorprofile/get_email" method="POST" id="email_update">
                    <?php if (isset($_SESSION['e_error'])) {
                        echo "<p class='pass_error'>" . $_SESSION['e_error'] . "</p>";
                    } ?>
                    <label for="email">Please enter your new email :</label>
                    <input type="text" id="email" name="email">
                    <p id="email-error"></p>
                    <button id="esub" type="submit" name="confirm">Enter</button>
                    <button id="cancelButton1"
                        onclick="document.getElementById('myEmail').style.display = 'none';return false;">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myOTP" class="dialog">
            <div class="dialog-content">
                <!-- <p>After submitting the new email, you will receive an OTP code...</p> -->
                <form action="/donorprofile/confirm_OTP" method="POST">
                    <?php if (isset($_SESSION['otp_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['otp_error'] . "</p>";
                    } ?>
                    <label for="otp">Please enter the received OTP :</label>
                    <input type="text" id="otp" name="otp">
                    <button id="otpsub" type="submit" name="confirm">Enter</button>
                    <button id="cancelButton2" onclick="hideotp()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myPassword" class="dialog">
            <div class="dialog-content">
                <h2>Delete Your LIFELINE Account</h2>
                <form action="/donorprofile/d_confirm_password" method="POST">
                    <?php if (isset($_SESSION['p_error'])) {
                        echo "<p id='pass_error'>" . $_SESSION['p_error'] . "</p>";
                    } ?>
                    <label for="password1">Please enter your password :</label>
                    <input type="password" id="password1" name="password1">
                    <button type="submit" name='confirm'>Enter</button>
                    <button id="cancelButton" onclick="hidepalert()">Cancel</button>
                </form>
            </div>
        </div>

        <div id="myConfirm" class="popup">
        <div>
            <p>Are you sure you want to delete your LIFELINE account?</p>
            <div><button class="yes-button"><a href="/donorprofile/delete_success">Yes</a></button>
                <button class="no-button" onclick="hidecalert()" >No</button>
            </div>
            <img class="close" onclick="hidecalert()" src="../../../public/img/donordashboard/close.png">

        </div>
        </div>

        <script>
            function hidepalert() {
                pword.style.display = "none";
                <?php if (isset($_SESSION['p_error'])){
                    unset($_SESSION['p_error']);
                }
                ?>
            }
        </script>
</body>

</html>