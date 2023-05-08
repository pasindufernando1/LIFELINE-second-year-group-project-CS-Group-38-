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
    <link href="../../../public/css/systemuser/inventory_view.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/inventory_fil.css" rel="stylesheet">
    
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

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/filters/inventory.php'); ?>    

                    <div class="box">
                        <p class="add-reservation-title">Inventory</p>
                        
                        <a href="/sys_inventory/add" class="brown-button addnew-reservation">Add New</a>
                        <img class="addbutton-reservation" src="./../../public/img/dashboard/add-button.png" alt="add-button">

                        <a href="/sys_inventory/request?page=1" class="brown-button types-reservation">Donation Requests</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/inv.png" alt="add-button">

                        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id02').style.display='block'">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">


                        <!-- <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img"> -->

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Inventory Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $_SESSION['filtered_inv'] = $_SESSION['inv'];
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['invtypes']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['inv'];
                        

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["Name"] . "</td>
                                        <td>" .$row["Type"] . "</td>
                                        <td>" . $row["Quantity"] . '</td>
                                        <td> 
                                        <div class="btns">
                                        <form action="/sys_inventory/add_quantity/'.$row["InventoryID"].'" method="POST">
                                        
                                            <input min="0" title="Add Quantity" class="sub-input" type="number" id="quantity" name="quantity" placeholder="" required>
                                            
                                         <button type="submit" class="update-btn">+</button> 
                                     
                                    
                                    </form>
                                    <form action="/sys_inventory/substract_quantity/'.$row["InventoryID"].'" method="POST">
                                        
                                            <input min="0" max="'. $row["Quantity"] .'" title="Substract Quantity" class="sub-input" type="number" id="quantity" name="quantity" placeholder="" required>
                                            
                                         <button type="submit" class="remove-btn">-</button> 
                                     
                                    
                                    </form>
                                    </div>
                                    </td>
                                    </tr> </div>';
                                
                            }
                        } else {
                            echo "0 results";
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

           <div class = "box-f">
                <div class = "box-t">
                    <p class="title-p">Inventory Item Types</p>
                </div>
                
                <div class="box-cont" >   
                    <?php
                    $count = count($_SESSION['invtypes']);
                    for ($i=0; $i < $count; $i++) { 
                    echo '  
                    <div class = "box-r">
                        <p class="type-p">'.$_SESSION['invtypes'][$i]['Name'].'</p>
                        <p class="count-p">'.$_SESSION['invtypes'][$i]['Type'].'</p>
                    </div>';
                }
                ?>
                    
                        
            </div>

</body>
</html>