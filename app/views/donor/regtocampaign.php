<?php
//$_SESSION['çamp'] = $_GET['camp'];
// print_r($_SESSION['contno']);
// die();
$metaTitle = 'Donor Campaigns'; ?>

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
    <link href="../../../public/css/donor/dashboard.css" rel="stylesheet">

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
            <img src="./../../public/img/donordashboard/search-icon.png" alt="search-icon">
            <input class="search-box" type="text" autofocus placeholder="Search">
        </div>
        <div class="notification">
            <img class="bell-icon" src="../../../public/img/donordashboard/bell-icon.png" alt="bell-icon">

        </div>
        <div class="login-user">
            <div class="image">
                <img src="../../../public/img/donordashboard/profilepic.jpg" alt="profile-pic">
            </div>
            <div class="user-name">
                <p><?php echo $_SESSION['username']; ?></p>
            </div>
            <div class="role">
                <div class="role-type">
                    <p><?php echo $_SESSION['type']; ?> <br>
                </div>
                <div class="role-sub">

                </div>

            </div>
            <div class="more">
                <img class="3-dot" onclick="dropDown()" src="../../../public/img/donordashboard/3-dot.png" alt="3-dot">
                <div id="more-drop-down" class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="/donoruser/logout">Log Out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard-non menu-item">
                <img class="" src="./../../public/img/donordashboard/non-active/dashboard.png" alt="dashboard">
                <img class="reservation-non-active dash" src="./../../public/img/donordashboard/active/dashboard.png"
                    alt="dashboard">
                <p class="dashboard-non-active menu-item"><a href="/donoruser/dashboard">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/donordashboard/non-active/history.png"
                    alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/history.png"
                    alt="reservation">
                <p class="reservation-nav menu-item"><a href="/donationhistory">History</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/donordashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/cards.png"
                    alt="donor-cards">
                <p class="users-nav "><a href="/card">Donor Card</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/donordashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/inventory.png"
                    alt="inventory">
                <p class="inventory-nav "><a href="/contactus">Contact Us</a></p>

            </div>
            <div class="badges menu-item">
                <img src="./../../public/img/donordashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/donordashboard/active/badge.png"
                    alt="campaigns">
                <p class="badges-nav "><a href="/badges">Badges</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/donordashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/reports.png"
                    alt="reports">
                <p class="reports-nav "><a href="/ratecampaign/feedback_page">Feedback</a></p>

            </div>
            <div class="campaigns-selected">
                <div class="campaigns-marker"></div>
                <img class="campaigns-active" src="./../../public/img/donordashboard/active/campaigns2.png"
                    alt="campaigns">
                <p class="campaigns-act "><a href="/getcampaign?page=1">Campaigns</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/donordashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/donordashboard/active/profile.png"
                    alt="profile">
                <p class="profile-nav "><a href="/donorprofile">Profile</a></p>

            </div>
        </div>
    </div>
    <div class="box">
        <form action="/getcampaign/register_to_campaign" method="post" id="donor-form">
            <table width="1420px" style="margin-left: auto;margin-right: auto;">
                <col style="width:50%">
                <col style="width:50%">
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <h1>Register to Campaign</h1>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: left;">
                        <label class="reg-lable " for="contno">Contact Number: </label>
                        <br />
                        <input class="contno" id="contno" type="text" name="contno" autofocus
                            value="<?php echo $_SESSION[
                                'contno'
                            ][0]; ?>" required>
                        <p class="contno-error" id="contno-error"></p>
                    </td>
                    <td style="text-align: left;">
                        <label class="reg-lable " for="emcontno">Emergency Contact Number: </label>
                        <br />
                        <input class="emcontno" id="emcontno" type="text" name="emcontno" autofocus
                            placeholder="Emergency Contact Number" required>
                        <p class="emcontno-error" id="emcontno-error"></p>
                    </td>
                </tr>
            </table>
            <table class="qtable-reg">
                <col style="width:70%">
                <col style="width:15%">
                <col style="width:15%">
                <tr>
                    <td colspan="3" style="text-align: center;">Please select the appropriate option to
                        following options</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Yes</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td class="reg-question">Have you already given blood in the last 8 weeks?</td>
                    <td>
                        <fieldset><input type="radio" name="g1" value="on" required>
                    </td>
                    <td><input type="radio" name="g1" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Are you pregnant or breastfeeding?</td>
                    <td>
                        <fieldset><input type="radio" name="g2" value="on" required>
                    </td>
                    <td><input type="radio" name="g2" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever had injections of human pituitary growth
                        hormone, pituitary gonadotrophin (fertility medicine) or seen a neurosurgeon or
                        neurologist?</td>
                    <td>
                        <fieldset><input type="radio" name="g3" value="on" required>
                    </td>
                    <td><input type="radio" name="g3" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you or close relatives had an unexplained neurological
                        condition or been diagnosed with Creutzfeldt-Jacob Disease or ‘mad cow disease’?
                    </td>
                    <td>
                        <fieldset><input type="radio" name="g4" value="on" required>
                    </td>
                    <td><input type="radio" name="g4" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever injected yourself or been injected with
                        illegal or non-prescribed drugs including body-building drugs or cosmetics (even
                        if this was only once or a long time ago)?</td>
                    <td>
                        <fieldset><input type="radio" name="g5" value="on" required>
                    </td>
                    <td><input type="radio" name="g5" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever been refused as a blood donor, or told not to
                        donate blood?</td>
                    <td>
                        <fieldset><input type="radio" name="g6" value="on" required>
                    </td>
                    <td><input type="radio" name="g6" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you ever had yellow jaundice (excluding jaundice at
                        birth), hepatitis or liver disease or a positive test for hepatitis?</td>
                    <td>
                        <fieldset><input type="radio" name="g7" value="on" required>
                    </td>
                    <td><input type="radio" name="g7" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you been ill, received any treatment or taken any
                        medication?</td>
                    <td>
                        <fieldset><input type="radio" name="g8" value="on" required>
                    </td>
                    <td><input type="radio" name="g8" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">Have you been under a doctor’s care, undergone surgery, or
                        a diagnostic procedure, suffered a major illness, or been involved in a serious
                        accident?</td>
                    <td>
                        <fieldset><input type="radio" name="g9" value="on" required>
                    </td>
                    <td><input type="radio" name="g9" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">have you had close contact with a person with yellow
                        jaundice or viral hepatitis, or have you been given a hepatitis B vaccination
                    </td>
                    <td>
                        <fieldset><input type="radio" name="g10" value="on" required>
                    </td>
                    <td><input type="radio" name="g10" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td class="reg-question">have you been tattooed, had ear or body piercing,
                        acupuncture, circumcision or scarification, cosmetic treatment?</td>
                    <td>
                        <fieldset><input type="radio" name="g11" value="on" required>
                    </td>
                    <td><input type="radio" name="g11" value="off"></fieldset>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <button id="signup-button" class='register2-btn' type='submit' name='reg-to-campaign'>Register
                            To Campaign</button>
                    </td>
                </tr>
            </table>



        </form>
        <script src="../../../public/js/validation/donoruservalidation.js"></script>

    </div>

</body>

</html>