<?php 
$metaTitle = "Inventory Donations" 
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
    <link href="../../../public/css/admin/inventory.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/admin/sidebar.css" rel="stylesheet">
     <!-- <link href="../../../public/css/admin/dashboard.css" rel="stylesheet"> -->

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/sidebar.php'); ?>
    <!-- Includes -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/includes/inventory_donation_confirm.php'); ?>
            
    <!-- main content -->
    <div class="box">
                        <p class="add-user-title">Donation Requests</p>
                        

                        <table class="user-types-table" style="width:90%">
                        <tr>
                            <th>Inventory Donation ID</th>
                            <th>Inventory Item</th>
                            <th>Quantity</th>
                            <th>Delivery Validation by System User</th>
                            <th>Actions</th>

                        </tr>
                        <hr class="blood-types-line">
                        
                        
                        <?php 
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['inventory_donations']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                        $page = 1;  
                        } else {  
                        $page = $_GET['page'];  
                        }  

                        //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['inventory_donations'];

                        //display the link of the pages in URL  
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> 
                                <tr>
                                        <td>' . $row["InventoryDonationID"]. "</td>
                                        <td>" . $row["Inventory_category"] . "</td>
                                        <td>" . $row["Quantity"] . "</td>";
                                        
                                        if($row["Accepted_date"] == NULL){
                                            echo "<td><button class='pending-btn'>Pending</button></td>";
                                            echo '<td><a class= "verify-btn" href="/inventory/verifyblock" <button class = "verify-btn">
                                            Verify Acceptance <img  class="tick" src="./../../public/img/admindashboard/tick.png" alt="tick.png"></a></button></td>
                                            </tr> </div>';
                                         }else{
                                            echo "<td><button class='validated-btn' >Validated</button></td>";
                                            echo '<td><a class= "verify-btn" onclick="document.getElementById('."'id01'".').style.display='."'block'".'; document.getElementById('."'del'".').action = '."'/inventory/verify_acceptance/".$row["InventoryDonationID"]."'".'";<button class = "verify-btn">
                                            Verify Acceptance <img  class="tick" src="./../../public/img/admindashboard/tick.png" alt="tick.png"></a></button></td>
                                            </tr> </div>';
                                        }
                                        
                            }
                        } 
                        else {
                            echo '<div class="table-content-types"> <tr>
                                <td>Not available</td>
                            </tr></div>';
                        }
                        echo "</table>";
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
                        
                        
                    </div>

</body>
</html>