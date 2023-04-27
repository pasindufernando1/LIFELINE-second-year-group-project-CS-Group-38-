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

     <!-- CSS Files -->
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
     <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/reservation.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/reservation_type.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/inc/calender.css" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="../../../public/js/systemuser/filter/quantityDate.js"></script>

    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"> </script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"> </script>  

    

    

</head>
<body>
    
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>
    <!-- Side bar -->
    <?php $delete = "Blood types"; ?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>

    
            
                    <div class="box-big">
                        <p class="add-reservation-title">Pending Blood Quantity Updates</p>
                        
                        <a href="/reservation?page=1" class="brown-button expired-stock-btn">Back to Reservas</a>
                        <img class="expired-stocks-img" src="./../../public/img/dashboard/white-icons/reservation.png" alt="expired-stocks">

                        <table id="blood-types-table" class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Date</th>
                            <th>Donor NIC</th>
                            <th>Blood Group</th>
                            <th>Quantities</th>
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
                        $result = $_SESSION['bloodtypes'];

                        //display the link of the pages in URL  
                          
                        
                        // print_r($result[0]);die();
                        if ($_SESSION['rowCount'] > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr class="t-row">
                        
                                        <td class="t-det">' . $row["Date"] . '</td>
                                        <td class="t-det">' . $row["NIC"] . '</td>
                                        <td class="t-det">' . $row["BloodType"] . '</td>
                                        <form action="/reservation/update_quantity/'.$row["PacketID"].'" method="POST">
                                        <td>
                                            <input title="RBC" class="sub-input" type="text" id="RBC" name="RBC" placeholder="RBC" required>
                                            <input title="WBC" class="sub-input" type="text" id="WBC" name="WBC" placeholder="WBC" required>
                                            <input title="Platelet" class="sub-input" type="text" id="Platelet" name="Platelet" placeholder="Platelet" required>
                                            <input title="Plasma" class="sub-input" type="text" id="Plasma" name="Plasma" placeholder="Plasma" required>
                                         </td>
                                        <td> <button type="submit" class="update-btn">Update </button> </td>
                                    </tr> </div>
                                    
                                    </form>';
                                
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
           
            <div class = "container" >  
            <input id="search-nic" class="search-donor" autofocus placeholder="Search By NIC" onchange="filterNIC()"> 
            <input id = "calendar" class="cale" autofocus placeholder="Filter By Date" onchange="filterDate()"> 
            
             <script>  
            $('#calendar').datepicker({  
            inline:true,  
            firstDay: 1,  
            showOtherMonths:false,  
            dateFormat: "yy-mm-dd",
            dayNamesMin:['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] ,
            
           
            }); 

            

             
            </script>   
            </div>  
           

</body>
</html>