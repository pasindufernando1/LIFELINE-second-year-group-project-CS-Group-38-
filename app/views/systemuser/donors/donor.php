<?php 
$metaTitle = "System User Donors" 

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
    <link href="../../../public/css/systemuser/donor.css" rel="stylesheet">
    
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
                    <div class="box">
                        <p class="add-reservation-title">Donors</p>
                        
                        
                        <a href="/sys_donors/add_donor" class="brown-button types-reservation">Add New</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/add-button.png" alt="add-button">

                         <a href="/sys_donors/donation?page=1" class="brown-button donation-btn">Donation</a>
                        <img class="typebutton-reservation donation-img" src="./../../public/img/dashboard/donation.png" alt="add-button">

                        <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            <th>Full Name</th>
                            <th>NIC No</th>
                            <th>BloodType</th>
                            <th>Gender</th>
                            <th>District</th>
                            <th>Action</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['donors']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['donors'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($number_of_results > 0) {

                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                
                                $lastdate = strtotime($row["lastdate"]);
                                $diff = 10520000;

                                $datenow = date("Y-m-d");
                                $dateinsec = strtotime($datenow);
                                
                                
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["Fullname"] . '';
                                        if($dateinsec - $lastdate >= $diff){
                                            echo '<span class="eligible">Eligible</span>';
                                        }else{
                                             echo '<span class="not-eligible">Not Eligible</span>';
                                        }
                                        
                                echo       "</td>
                                        <td>" . $row["NIC"] . "</td>
                                        <td>" . $row["BloodType"] . "</td>
                                        <td>" . $row["Gender"] . "</td>
                                        <td>" . $row["District"] . '</td>
                                        <td> <div class="action-btns" ><div class="edit-btn-div"> <a href="/sys_donors/edit_donor/'.$row["UserID"].'"> <img class="edit-btn" src="./../../public/img/dashboard/edit-btn.png" alt="edit-btn"> </a> </div> <div class="edit-btn-div"> <a href="/sys_donors/view_donor/'.$row["UserID"].'">   <img class="edit-btn" src="./../../public/img/dashboard/view-icon.png" alt="delete-btn"> </a> </div> </div></td>
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

</body>
</html>