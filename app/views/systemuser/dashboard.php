<?php 
$metaTitle = "System User Dashboard" 
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
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/dashboardxtra.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    
    <script src="../../../public/js/drop-down.js"></script>
    
    

    

</head>
<body>
    <!-- header --> <!-- Side bar -->
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); 
    require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?> 
    
<div class="bo1">
    <p class="te1">Donations Today</p>
    <p class="te2">8566</p>
</div>

<div class="bo2">
    <p class="te1">Card Issued</p>
    <p class="te2">1,234</p>
</div>

<div class="bo3">
    <p class="te1">Advertisements Ongoing</p>
    <p class="te2">7</p>
</div>

<div class="bo4">
    <p class="te1">Campaign Requests</p>
    <p class="te2">17</p>
    
</div>

<div class="bo5">
<p class="tebar">Blood Donation Statistics</p>
<canvas id="usage-months">
                <script>
                    var ctx = document.getElementById('usage-months').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Donation Received',
                                data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
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
                                text: 'Donation Received',
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
                                        borderDash: [8, 4],
                                        display: true,
                                        tickBorderDash: [10,15]
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

        <div class="bo6">
            <p class="tebar">Inventory Donation Status</p>
            <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Donated Item</th>
                            <th>Date</th>
                            <th>Details</th>
                         
                            <th>Status</th>
                          
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $results_per_page = 3;
                        $number_of_results = $_SESSION['rowCount'];
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['packets'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($_SESSION['rowCount'] > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["PacketID"]. "</td>
                                        <td>" . $row["Name"] . '</td>
                                        <td ' . '<span class="validate">view </span>' . '</td>
                            
                                        <td ' . '<span class="validates">validate </span>' . '</td>
                                        
                                    </tr> </div>';
                                
                            }
                        } else {
                            echo "0 results";
                        }
                       
                  
                       echo '<div class="pag-box">';
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

        <div class="bo7">
            
            <p class="tebar">Donor Composition</p>
            <canvas id="pie-chart" width="800" height="450"></canvas>
            <script>
                new Chart(document.getElementById("pie-chart"), {
                    type: 'bar',
                     labels: ['Male', 'Female'],
                            
                    data: {
                            labels: ['Male', 'Female'],
                            datasets: [{
                                label: 'Donation Received',
                                data: [12, 19 ],
                                backgroundColor: [
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
                        text: 'Predicted world population (millions) in 2050',
                        hoverOffset: 4
                    }
                    },
                    
                });
                </script>
        </div>
</body>
</html>