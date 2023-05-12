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
            <p>Are you sure you want to cancel the reservation for this time slot?</p>
            <div><button class="yes-button">Yes</button>
                <button class="no-button">No</button>
            </div>


            <img class="close" onclick="hidealert()" src="../../../public/img/donordashboard/close.png">

        </div>
    </div>

    <div class="popup" id="popupc">
        <div>
            <p>Are you sure you want to change this time slot?</p>
            <div><button class="yes-button" id="yes-button">Yes</button>
                <button class="no-button" onclick="hidealertc()">No</button>
            </div>


            <img class="close" onclick="hidealertc()" src="../../../public/img/donordashboard/close.png">

        </div>
</div>
</body>

</html>