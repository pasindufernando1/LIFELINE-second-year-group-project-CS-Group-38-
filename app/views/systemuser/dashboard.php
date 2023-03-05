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

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); 
    require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?> 
    
    <!-- Side bar -->
            


        </div>

<<<<<<< Updated upstream
    </div>
=======
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
>>>>>>> Stashed changes

    <div class="adminbox">
        <img src="./../../public/img/dashboard/system_dashboard.png" alt="admin dashboard">
    </div>

<<<<<<< Updated upstream
=======
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
            <div class="male">
                <img class="malepic" src="./../../public/img/dashboard/male.png" alt="male">
                <p class="matex">35%</p>

            </div>

            <div class="female">
                <img class="femalepic" src="./../../public/img/dashboard/female.png" alt="male">
                <p class="matex">65%</p>

            </div>
            <p class="tebar">Donor Composition</p>
            <canvas id="pie-chart" width="800" height="450"></canvas>
            <script>
                new Chart(document.getElementById("pie-chart"), {
                    type: 'doughnut',
                    data: {
                    
                    datasets: [{
                        label: "Donor Composition",
                        backgroundColor: ["#BF1B16", "#BF1B16"],
                        data: [2478,5267]
                        
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
>>>>>>> Stashed changes
</body>
</html>