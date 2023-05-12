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
        <div class="popup">
        <div>
            <p>Are you sure you want to cancel this Registration?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>
            <img class="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">
        </div>
    </div>
</body>

</html>