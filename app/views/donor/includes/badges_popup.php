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
    <?php include $_SERVER['DOCUMENT_ROOT'] .
        '/app/views/donor/layout/header.php'; ?>
        <div id="alertBox" class="hidden">
            <div>
                <p id="badgeName"></p>
                <img id="alertBadge" src='' alt="badge">
                <p>This Badge is Rewarded For Donating Blood <span class="alertMessage"></span> Times </p>
                <img id="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">
            </div>
        </div>
</body>

</html>