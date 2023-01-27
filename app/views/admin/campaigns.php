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
    <link href="../../../public/css/admin/campaign.css" rel="stylesheet">
    
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
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/admin/layout/campaign_active_sidebar.php'); ?>
            
    <!-- main content -->
    <div class="box">
    <p class="add-user-title">Campaigns</p>
        
        <a href="/usermanage/add_hosmed_successful" class="ash-button reservation-filter">Filter & Short</a>
        <img class="user-filter-img" src="./../../public/img/admindashboard/filter-icon.png" alt="reservation-filter-img">

        <table class="user-types-table" style="width:90%">
        <tr>
            <th>Campaign ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <hr class="blood-types-line">
        
        
        <?php 
        $results_per_page = 7;
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
        $result = $_SESSION['campaigns'];

        //display the link of the pages in URL  
        if ($_SESSION['rowCount'] > 0) {
            
            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                echo '<div class="table-content-types"> <tr>
                        <td>' . $row["CampaignID"]. "</td>
                        <td>" . $row["Name"] . "</td>
                        <td>" . $row["Location"] . "</td>
                        <td>" . $row["Date"] . '</td>
                        <td><div class="delete-btn-div"> <a href="/adcampaigns/delete_campaign/'.$row["CampaignID"].'"><img class="delete-btn" src="./../../public/img/admindashboard/delete-btn.png" alt="delete-btn"> </a> </div> </div></td>
                    </tr> </div>';
                
            }
        } 
        else {
            echo "0 results";
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