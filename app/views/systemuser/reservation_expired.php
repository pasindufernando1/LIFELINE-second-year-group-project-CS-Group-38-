<?php 
$metaTitle = "Blood Type - Reservations" 
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

    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

     <!-- CSS Files -->
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/reservation.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/expired.css" rel="stylesheet">


    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/filters/expired_stocks.php'); ?>
            
                    <div class="box">
                        <p class="add-reservation-title">Expired Blood Reserves</p>
                        
                        
                        <a href="/reservation?page=1" class="brown-button expired-stock-btn">Back to Reservas</a>
                        <img class="expired-stocks-img" src="./../../public/img/dashboard/white-icons/reservation.png" alt="expired-stocks">

                        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id01').style.display='block'">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <a href="/reservation/downloadcsv" class="ash-button export" title="Export data as csv"><img class="export-img" src="./../../public/img/dashboard/export-icon.png" alt=""></a>
                        
                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            
                            <th>Blood Group</th>
                            <th>Quantity</th>
                            <th>Received Date</th>
                            <th>Expired Date</th>
                            
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['exp_packs']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['exp_packs'];

                        


                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if (count($_SESSION['exp_packs']) > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                $rec = strtotime($row["Date"]);
                                $diff = $row['Expiry_constraint']*86400;
                                $total = $rec + $diff;
                                $ex_date = date('Y-m-d', $total);

                                echo '<div class="table-content-types"> <tr>
                                        
                                        <td>' . $row["Name"] ." ". $row["Subtype"]."</td>
                                        <td>" . $row["Quantity"] . "</td>
                                        <td>" . $row["Date"] . "</td>
                                        <td>" . $ex_date . '</td>
                                        <td> </td>
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

            </div>


        </div>

    </div>
    <div class = "box-f">
        <div class = "box-t">
            <p class="title-p">Total Expired Stocks</p>
        </div>
        
        <div class="box-cont" >   
            <?php
            $count = count($_SESSION['exp_packs_count']);
            for ($i=0; $i < $count; $i++) { 
            echo '  
            <div class = "box-r">
                <p class="type-p">'.$_SESSION['exp_packs_count'][$i]['type'].'</p>
                <p class="count-p">'.$_SESSION['exp_packs_count'][$i]['totalquantity'].'</p>
            </div>';
        }
        ?>
            
                
    </div>

</body>
</html>