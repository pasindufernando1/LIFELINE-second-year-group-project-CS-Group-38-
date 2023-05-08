<?php 
$metaTitle = "System User Reservations" 
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
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/inventory.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/inventory_request.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>  

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/filters/inv_donation.php'); ?>      
                    <div class="box">
                        <p class="add-reservation-title">Donation Requests</p>
                        
                        
                        <a href="/sys_inventory?page=1" class="brown-button types-reservation">Inventory</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/inv.png" alt="add-button">

                        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id02').style.display='block'">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Inventory Item</th>
                            <th>Quantity</th>
                            <th>Donated By</th>
                            <th>Verification Status</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $_SESSION['filtered_invdon'] = $_SESSION['invdonation'];
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['invdonation']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['invdonation'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["Inventory_category"]. "</td>
                                        <td>" . $row["Quantity"] . "</td>
                                        <td>" . $row["Name"] . "</td>"; ?>
                                        <td>
                                        <?php 
                                        if ($row['Accepted_date'] != null) {
                                            echo '<span class="verified">Verified</span>';
                                        } else {
                                            echo '<a href="/sys_inventory/verify/'.$row['InventoryDonationID'].'"><span class="verify">Verify</span></a>';
                                        }
                                        
                                        ?>
                                        </td>
                                        
                                
                            <?php } 
                        } else {
                            echo '<tr class="t-row">
                            <td colspan="4" class="t-det">No Records Available</td>
                            
                            </tr>';
                        }
                        echo '<div class="pag-box">';
                        if (isset($_GET['filtered'])) {
                            if ($_GET['page'] == 1) {
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . 1 . '&filtered=1">&laquo;</a> </div>'; 
                            }else{
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page-1 . '&filtered=1">&laquo;</a> </div>';   
                            }
                    
                            for($page = 1; $page<= $number_of_page; $page++) {  
                                if ($page == $_GET['page']) {
                                    echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?page=' . $page . '&filtered=1">' . $page . ' </a> </div>';
                                }else{
                                    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page . '&filtered=1">' . $page . ' </a> </div>';  
                                }
                            }
                            if ($_GET['page'] == $number_of_page) {
                                    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $number_of_page . '&filtered=1">&raquo; </a> </div>';
                            }else{
                                echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $_GET['page']+1 . '&filtered=1">&raquo; </a> </div>';  
                            }
                            
                            echo '</div>' ;
                        } else {
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
                            
                            echo '</div>' ;
                        }?>
                        
                        </table>

                </div>
                <div class="box-2">
                    <p class="b-title">Donations Verified</p>
                    <p class="b-sub"><?php echo $_SESSION['count_ver']; ?></p>
                </div>

                <div class="box-3">
                    <p class="b-title">Donations Pending</p>
                    <p class="b-sub"><?php echo $_SESSION['count_non_ver']; ?></p>
                </div>

                <div class="box-4">
                      <p class="b-title">Contributors</p>
                      <div class="box-in">
                        <?php 
                        $c_con = count($_SESSION['contri']); 
                        for ($i=0; $i < $c_con ; $i++) { 
                            echo '<p class="b-sub">'.$_SESSION['contri'][$i]['Name'].'</p> '; 
                        }
                        ?>
                      </div>
                    
                </div>

            

</body>
</html>