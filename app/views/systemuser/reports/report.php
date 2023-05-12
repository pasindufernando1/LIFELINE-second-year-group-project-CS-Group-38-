<?php 
$metaTitle = "System User Reports" 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $metaTitle; ?></title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Favicons -->
    <link href="../../../public/img/favicon.jpg" rel="icon">

     <!-- CSS Files -->
    <link href="../../../public/css/systemuser/dashboard.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/report.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/report_view.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    <script src="../../../public/js/custom-select.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>   

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/filters/report.php'); ?>

    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/blood_reservation.php'); ?>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/expired_reservation.php'); ?>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/inventory.php'); ?>  
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/inventory_donation.php'); ?>  
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/donor.php'); ?>
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/donation.php'); ?>  
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/campaigns.php'); ?>  

    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/report_popups/generated.php'); ?> 

    <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r1generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver1";
                document.getElementById("action2").href="/sys_reports/downloadr1";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

    <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r2generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver2";
                document.getElementById("action2").href="/sys_reports/downloadr2";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

     <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r3generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver3";
                document.getElementById("action2").href="/sys_reports/downloadr3";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

    <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r4generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver4";
                document.getElementById("action2").href="/sys_reports/downloadr4";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

    <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r5generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver5";
                document.getElementById("action2").href="/sys_reports/downloadr5";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

     <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r6generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver6";
                document.getElementById("action2").href="/sys_reports/downloadr6";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

    <?php 
    if (isset($_GET['report'])) {
        if ($_GET['report'] == 'r7generated') { ?>
         <script>
                document.getElementById("action").href="/sys_reports/saver7";
                document.getElementById("action2").href="/sys_reports/downloadr7";
                document.getElementById('done').style.display='block';
            </script>
     <?php   }
    }
         
    ?>

                    <div class="box">
                        <p class="add-reservation-title">Reports</p>
                        
                        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('repf').style.display='block'">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Report Name</th>
                            <th>Date Taken</th>
                            <th>Action</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $_SESSION['filtered_rep'] = $_SESSION['reports'];
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['reports']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['reports'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["Name"] . "</td>
                                        <td>" . $row["Date_Generated"] . '</td>
                                        <td> <div class="action-btns" ><div class="edit-btn-div"> <a href="/sys_reports/downloadexist/?link='.$row["FileLink"].'"> <img class="edit-btn" src="./../../public/img/dashboard/download-grey.png" alt="edit-btn"> </a> </div> <div class="delete-btn-div"> <a  href="/sys_reports/delete/'.$row["ReportID"].'">   <img class="delete-btn" src="./../../public/img/dashboard/delete-btn.png" alt="delete-btn"> </a> </div> </div></td>
                                    </tr> </div>';
                                
                            }
                        } else {
                            echo '<tr class="t-row">
                            <td colspan="3" class="t-det">No Records Available</td>
                            
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

                <div class="box-generate">
                    <p  class="generate">Generate New Report</p>
                    <a onclick="document.getElementById('r01').style.display='block'" class="blood-reserve" href="#">Blood Reservation Report</a>
                    <a onclick="document.getElementById('r02').style.display='block'" class="blood-reserve" href="#">Expired Blood Report</a>
                    <a  onclick="document.getElementById('r03').style.display='block'" class="blood-reserve" href="#">Inventory Report</a>
                    <a onclick="document.getElementById('r04').style.display='block'" class="blood-reserve" href="#">Inventory Donation Report</a>
                    <a  onclick="document.getElementById('r05').style.display='block'" class="blood-reserve" href="#">Donor Report</a>
                    <a onclick="document.getElementById('r06').style.display='block'" class="blood-reserve" href="#">Donation Report</a>
                    <a onclick="document.getElementById('r07').style.display='block'" class="blood-reserve" href="#">Campaigns Report</a>
                </div>

</body>
</html>