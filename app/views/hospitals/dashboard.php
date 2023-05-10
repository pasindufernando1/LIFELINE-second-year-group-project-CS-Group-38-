<?php

$metaTitle = 'Hospitals Dashboard';
// print_r($_SESSION['bloodbank_contact']);
// die();

// print_r($_SESSION['District']);die();
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
    <link href="../../../public/css/hospitals/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>



</head>

<body>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>
        

            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    <div class="dashboard menu-item">
                        <div class="marker"></div>
                        <img src="./../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-active"><a href="#">Dashboard</a></p>


                    </div>
                    <div class="requestBlood menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/Request blood.png"
                            alt="requestBlood">
                        <img class="requestBlood-non-active"
                            src="./../../public/img/hospitalsdashboard/active/Request blood.png" alt="requestBlood">
                        <p class="requestBlood-nav"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>

                    </div>

                    <div class="profile menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/hospitalsdashboard/active/profile.png"
                            alt="profile">
                        <p class="profile-nav "><a href="/requestBlood/viewProfile">Profile</a></p>
                    </div>

                </div>

            </div>
            <div class="box">
                <img class="dashboard-img" src="./../../public/img/hospitalsdashboard/dashboard_img.jpg" alt="dashboard_img">
                <p class="welcome">Welcome to <br>
                    <img class="welcome-image" src="./../../public/img/hospitalsdashboard/logo.jpg" alt="dashboard_img">
                </p>
            </div>
            <div class=box2>
                
                <p class="hospital_name"> <?php echo $_SESSION['username']; ?> </p>
                <p class="hospital_address"> <?php echo $_SESSION['Number'] . ', ' . $_SESSION['LaneName'] . ', ' . $_SESSION['City'] . ', ' . $_SESSION['District']; ?> </p>
                <img class="hospitalLogo" src="../../../public/img/user_pics/<?php echo ($_SESSION['user_pic']); ?>" alt="profile-pic">

                <img class="hospital_img" src="./../../public/img/hospitalsdashboard/hospital_img.png" alt="hospital_img"> 
            </div>
            <div class="box1">
                <p class="dashSub-title">Nearby Blood Banks for you</p>
                <div class="nearby_bb">
                    
                    <?php
                    
                    $_SESSION['rowCount'] = sizeof(
                        $_SESSION['nearbyBloodbanks']
                    );
                    $number_of_results = $_SESSION['rowCount'];
                    if (!isset($_GET['page'])) {
                        $page = 1;
                    } else {
                        $page = $_GET['page'];
                    }

                    $result = $_SESSION['nearbyBloodbanks'];
                    $count = 0;
                    if ($_SESSION['rowCount'] > 0) {
                        foreach ($result as $row) {
                            echo ' <div class="bb">
                        <p class="bbn">' .$row['BloodBank_Name'] . '</p>
                        <p class = "bbd">
                                Location : ' .
                                $row['Number'] . ', ' .$row['LaneName'] .', ' .$row['City'] .', ' .$row['District'] .' 
                                <br>
                                Email : ' .
                                $row['Email'] .
                                '
                                
                        </p>
                        <button><a href="/requestBlood/add_Request?bloodbank=' .
                                $row['BloodBankID'] .
                                '">Request Blood</a></button></div> ';
                            $count++;
                        }
                    } else {
                        echo 'No blood bank found in your district';
                    }
                    ?>



                </div>
            </div>

        </div>

    </div>

</body>

</html>