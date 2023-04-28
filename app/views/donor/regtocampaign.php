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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/donor/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/app/views/donor/layout/campaign_active.php'); ?>

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
                        <input class="contno" id="contno" type="text" name="contno" autofocus value="<?php echo $_SESSION[
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