<?php 
$metaTitle = "Inventory" 
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/filters/inventory_filter.php'); ?>
            
    <!-- main content -->
    <div class="box">
        <p class="add-user-title">Inventory</p>
        
        <a href="/inventory/donations?page=1" class="brown-button types-user">Inventory donations</a>
        <img class="userbutton-user" src="./../../public/img/admindashboard/briefcase.png" alt="add-button">
        
        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id01').style.display='block'">Filter & Short</a>
        <img class="user-filter-img" src="./../../public/img/admindashboard/filter-icon.png" alt="reservation-filter-img">

        <table class="user-types-table" style="width:90%">
        <tr>
            <th>Inventory ID</th>
            <th>Inventory Type</th>
            <th>Category</th>
            <th>Blood Bank</th>
            <th>Quantity</th>
        </tr>
        <hr class="blood-types-line">
        
        
        <?php 
        $status = false;
        if(isset($_SESSION['is_filtered'])){
            $status = $_SESSION['is_filtered']? 'true' : 'false';
        }else{
            $status = 'false';
        }
        $results_per_page = 7;
        $number_of_results = count($_SESSION['inventory']);
        $number_of_page = ceil($number_of_results / $results_per_page);

        //determine which page number visitor is currently on  
        if (!isset ($_GET['page']) ) {  
        $page = 1;  
        } else {  
        $page = $_GET['page'];  
        }  

        //determine the sql LIMIT starting number for the results on the displaying page  
        $page_first_result = ($page-1) * $results_per_page;  
        $result = $_SESSION['inventory'];

        //display the link of the pages in URL  
        if ($number_of_results > 0) {
            
            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                echo '<div class="table-content-types"> <tr>
                        <td>' . $row["InventoryID"]. "</td>
                        <td>" . $row["Inventory_Category"] . "</td>
                        <td>" . $row["Inventory_Name"] . "</td>
                        <td>" . $row["BloodBank_Name"] . "</td>
                        <td>" . $row["Quantity"] . '</td>
                    </tr> </div>';
                
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
                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . 1 . '">&laquo;</a> </div>'; 
        }else{
            echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page-1 . '">&laquo;</a> </div>';   
        }

        for($page = 1; $page<= $number_of_page; $page++) {  
            if ($page == $_GET['page']) {
                echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';
            }else{
                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $page . '">' . $page . ' </a> </div>';  
            }
        }
        if ($_GET['page'] == $number_of_page) {
                echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $number_of_page . '">&raquo; </a> </div>';
        }else{
            echo '<div class="pag-div"> <a class="pagination-number" href = "?filter='.$status.'&page=' . $_GET['page']+1 . '">&raquo; </a> </div>';  
        }
            
        echo '</div>' ;?>
        
    </div>

</body>
</html>