<?php 
$metaTitle = "Admin Dashboard";
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
    <link href="../../../public/css/admin/dashboard.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/includes/validation_confirmation.php'); ?>


    <!-- Side bar -->
    <div class="side-bar">
        <div class="side-nav">
            <div class="dashboard menu-items">
                <div class="marker"></div>
                <img src="./../../public/img/admindashboard/active/dashboard.png" alt="dashboard">
                <p class="dashboard-active"><a href="/user/dashboard?page=1">Dashboard</a></p>
            </div>
            <div class="reservation menu-item">
                <img class="reservation-active" src="./../../public/img/admindashboard/non-active/reservation.png" alt="reservation">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reservation.png" alt="reservation">
                <p class="reservation-nav menu-item"><a href="/reserves/type?page=1">Reserves</a></p>

            </div>
            <div class="users menu-item">
                <img src="./../../public/img/admindashboard/non-active/cards.png" alt="donor-cards">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/cards.png" alt="donor-cards">
                <p class="users-nav "><a href="/usermanage/type?page=1">Users</a></p>

            </div>
            <div class="inventory menu-item">
                <img src="./../../public/img/admindashboard/non-active/inventory.png" alt="inventory">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/inventory.png" alt="inventory">
                <p class="inventory-nav "><a href="/inventory/type?page=1">Inventory</a></p>

            </div>
            <div class="donors menu-item">
                <img src="./../../public/img/admindashboard/non-active/donors.png" alt="donors">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/donors.png" alt="donors">
                <p class="donors-nav menu-item"><a href="/donors/type?page=1">Donors</a></p>

            </div>
            <div class="reports menu-item">
                <img src="./../../public/img/admindashboard/non-active/reports.png" alt="reports">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/reports.png" alt="reports">
                <p class="reports-nav "><a href="/reports/type?page=1">Reports</a></p>
            </div>
            <div class="campaigns menu-item">
                <img src="./../../public/img/admindashboard/non-active/campaigns.png" alt="campaigns">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/campaigns.png" alt="campaigns">
                <p class="campaigns-nav "><a href="/adcampaigns/type?page=1">Campaigns</a></p>

            </div>
                <div class="badges menu-item">
                <img src="./../../public/img/admindashboard/non-active/badge.png" alt="badges">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/badge.png" alt="campaigns">
                <p class="badges-nav "><a href="/adbadges/type?page=1">Badges</a></p>

            </div>
            <div class="advertisements menu-item">
                <img src="./../../public/img/admindashboard/non-active/ad.png" alt="advertisements">
                <img class="reservation-non-active " src="./../../public/img/admindashboard/active/ad.png" alt="campaigns">
                <p class="advertisements-nav "><a href="/adadvertisements/type?page=1">Advertisements</a></p>

            </div>
            <div class="line"></div>
            <div class="profile menu-item">
                <img src="./../../public/img/admindashboard/non-active/profile.png" alt="profile">
                <img class="reservation-non-active" src="./../../public/img/admindashboard/active/profile.png" alt="profile">
                <p class="profile-nav "><a href="/adprofile/">Profile</a></p>

            </div>
        </div>
    </div>
    <!-- $_SESSION['dashboard_stats'] -->
    <div class="bo1">
    <p class="te1">Blood Donations Today</p>
    <p class="te2"><?php echo $_SESSION['dashboard_stats']['Today_donations'];?></p>
</div>

<div class="bo2">
    <p class="te1">Unread Feedbacks</p>
    <p class="te2"><?php echo $_SESSION['dashboard_stats']['Unread_feedbacks']?></p>
    <!-- Button to take a look at the feedbacks -->
    <a href="/feedbacks/type?page=1"><button class="feedback-btn">Review</button></a>
</div>

<div class="bo3">
    <p class="te1">Cash Donations Today</p>
    <p class="te2">Rs.<?php 
    if($_SESSION['dashboard_stats']['Today_cash_donations'] != 0){
        echo $_SESSION['dashboard_stats']['Today_cash_donations'];
    }else{
        echo "0";
    }
    ?></p>
</div>

<div class="bo4">
    <p class="te1">Approval Requests</p>
    <p class="te2"><?php echo $_SESSION['dashboard_stats']['Total_hospital_requests']?></p>
    
</div>

<div class="bo5">
<p class="tebar">Recent Blood Donation Statistics</p>

<!-- Barchart of donations -->
<canvas id="usage-months">
                <script>
                    <?php 
                        $result = $_SESSION['blood_donations'];
                    ?>
                    
                    
                    var ctx = document.getElementById('usage-months').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: 
                                <?php 
                                    // Get the keys, and print them out.
                                    $keys = array_keys($result);
                                    echo json_encode($keys);
                                ?>,
                            datasets: [{
                                label: 'Number of donations received',
                                data: 
                                    <?php 
                                        // Get the values, and print them out.
                                        $values = array_values($result);
                                        echo json_encode($values);
                                    ?>,
                                backgroundColor: [
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16'
                                ],   
                                //Barwidth
                                //backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
                                
                                borderRadius: 8,
                                borderSkipped: false,
                                barpercentage: 1,
                                borderWidth: 2,
                                
                                borderSkipped: false,
                                hoverOffset: 4
                            }]
                        },

                        
                        options: {

                            title: {
                                display: true,
                                text: 'Donation Received ',
                                // Align the chart title to the top left
                                position: 'top',
                                fontSize: 30,
                                fontColor: '#000000',
                                fontFamily: 'Poppins',
                                fontStyle: 'bold',
                                hoverOffset: 4
                            },
                            scales: {
                                x: {
                                    
                                    grid: {
                                        display: false,
                                        tickBorderDash: [10,15]
                                        
                                }
                                },
                                y: {
                                    grid: {
                                        display: true,
                                        borderDash: [5, 5],
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    
                                }
                        }
                        }
                    });
                </script>
            </canvas>
        </div>

        <!-- Validations of hospitals -->
        <div class="bo6">
            <p class="tebar">Hospital and Medical Center Status</p>
                <table class="blood-types-table" style="width:90%">
                <tr>
                    <th>Hospital/Medical Center ID</th>
                    <th>Name</th>
                    <th>Profile</th>
                    <th>Status</th>
                
                </tr>
                <hr class="blood-types-line2">
                <?php 
                $results_per_page = 3;
                $number_of_results = count($_SESSION['hospitals']);
                $number_of_page = ceil($number_of_results / $results_per_page);

                //determine which page number visitor is currently on
                if (!isset ($_GET['page']) ) {  
                    $page = 1;
                } else {  
                    $page = $_GET['page'];  
                }  

                //determine the sql LIMIT starting number for the results on the displaying page  
                $page_first_result = ($page-1) * $results_per_page;  
                $result = $_SESSION['hospitals'];
            
                // print_r($result[0]);die();
                if ($number_of_results > 0) {
                
                    foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                        echo '<div class="table-content-types"> <tr>
                                <td>' . $row["UserID"]. "</td>
                                <td>" . $row["Name"] . '</td>
                                <td ' . '<span><a class="validate" href="/adminuser/view_user/'.$row["UserID"].'">View</a></span>' . '</td>
                    
                                <td ' . '<span><a class="validates" onclick="document.getElementById('."'id01'".').style.display='."'block'".';      
                                document.getElementById('."'del'".').action = '."'/adminuser/validate_user/".$row["UserID"]."'".'";
                                ">Validate</a></span>' . '</td>
                                
                            </tr> </div>';
                        
                    }
                } else {
                    echo "0 results";
                }
                
                echo '</div>' ;
                echo '<div class="pag-box-dash">';
                if ($_GET['page'] == 1) {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . 1 . '">&laquo;</a> </div>'; 
                }else{
                    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page-1 . '">&laquo;</a> </div>';   
                }
            
                for($page = 1; $page<= $number_of_page; $page++) {  
                    if ($page == $_GET['page']) {
                        echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';
                    }else{
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';  
                    }
                }
                if ($_GET['page'] == $number_of_page) {
                        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $number_of_page . '">&raquo; </a> </div>';
                }else{
                    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $_GET['page']+1 . '">&raquo; </a> </div>';  
                }
                    
                echo '</div>' ;?>
        
                
                </table>
        </div>
        
        <!-- Donor composition chart -->
        <div class="bo7">
            <!-- <div class="male">
                <img class="malepic" src="./../../public/img/admindashboard/male.png" alt="male">
                <p class="matex">35%</p>
            </div>

            <div class="female">
                <img class="femalepic" src="./../../public/img/admindashboard/female.png" alt="female">
                <p class="matex">65%</p>
            </div> -->
            <p class="tebar">Donor Composition</p>
            <canvas id="pie-chart" width="800" height="450"></canvas>
            <script>
                <?php 
                        $result = $_SESSION['donor_composition'];
                ?>
                new Chart(document.getElementById("pie-chart"), {
                    type: 'doughnut',
                    data: {
                        labels: <?php echo json_encode(array_keys($result)); ?>,
                        datasets: [{
                            label: "Donor Composition",
                            backgroundColor: ["#BF1B16", "#360806"],
                            data: <?php echo json_encode(array_values($result)); ?>,
                        }]
                    },
                    options: {
                        plugins: {
                            labels: {
                                fontSize: 28,
                                position: 'outside',
                            }
                        },
                        legend: {
                            display: true,
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'Donor Composition'
                        }
                    }
                });
            </script>
        </div>

</body>
</html>