<?php 

$metaTitle = "Hospitals Dashboard" 
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
    <link href="../../../public/css/hospitals/requestBlood.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/hospitals/layout/header.php'); ?>


            <!-- Side bar -->
            <div class="side-bar">
                <div class="side-nav">
                    
                <div class="dashboard menu-item">       
                        <img src="./../../public/img/hospitalsdashboard/non-active/dashboard.png" alt="dashboard"> 
                        <img class="reservation-non-active dash" src="../../../public/img/hospitalsdashboard/active/dashboard.png" alt="dashboard">
                        <p class="dashboard-non-active menu-item"><a href="/hospitaluser/dashboard">Dashboard</a></p>
                    </div>
                    <div class="requestBlood-selected">
                        <div class="marker"></div>
                        <img class="requestBlood-active" src="./../../public/img/hospitalsdashboard/active/request blood.png" alt="requestBlood">
                        <p class="requestBlood-act"><a href="/requestBlood/viewReqBlood">Request Blood</a></p>
                    </div>
                    <div class="profile menu-item">
                        <img src="./../../public/img/hospitalsdashboard/non-active/profile.png" alt="profile">
                        <img class="profile-non-active" src="./../../public/img/hospitalsdashboard/active/profile.png" alt="profile">
                        <p class="profile-nav "><a href="/requestBlood/viewProfile">Profile</a></p>
                    </div>     
                </div>
            </div>
            <div class="box">
                        <p class="view-bloodBank-title">Select Blood Bank to Request Blood</p>
                        <form action="/requestBlood/add_Request/" method="post">
                        <table class="bloodBanks-table" style="width:80%">
                        <tr>
                            
                            <th>Name</th>
                            <th>Address</th>
                            <th>Province</th>
                            <th>Action</th>
                        </tr>
                        <hr class="bloodBanks-line">
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
                        $result = $_SESSION['bloodBanks'];

                        //display the link of the pages in URL  
                          

                         //print_r($result);die();
                        if ($_SESSION['rowCount'] > 0) {
                            //print_r($result);die();
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                                echo '<div class="table-content-types"> <tr>
                                        
                                        <td>' . $row["BloodBank_Name"] . "</td>
                                        <td>" . $row["Number"] ," , ",$row["LaneName"]," , ",$row["City"]," , ",$row["District"] ."</td>
                                        
                                       
                                        
                                        <td>" . $row["Province"] . '</td>
                                        <td> 
                                        
                                        <a href="/requestBlood/add_Request?bloodbank='.$row["BloodBankID"].'"><button class="req-btn" type="button" name="request">Request</a></button>                                
                                        
                                        </td>
                                    </tr> </div>';
                                
                            }
                        } 
                        else {
                            echo "0 results";
                        }
                        echo '<div class="pag-box">';
if (!isset($_GET['page']) || $_GET['page'] == 1) {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . 1 . '">&laquo;</a> </div>'; 
} else {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . ($_GET['page'] - 1) . '">&laquo;</a> </div>';   
}

for($page = 1; $page <= $number_of_page; $page++) {  
    if (!isset($_GET['page'])) {
        $current_page = 1;
    } else {
        $current_page = $_GET['page'];
    }
    if ($page == $current_page) {
        echo '<div class="pag-div pag-div-'.$page. '"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';
    } else {
        echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $page . '">' . $page . ' </a> </div>';  
    }
}

if (!isset($_GET['page']) || $_GET['page'] == $number_of_page) {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . $number_of_page . '">&raquo; </a> </div>';
} else {
    echo '<div class="pag-div"> <a class="pagination-number" href = "?page=' . ($_GET['page'] + 1) . '">&raquo; </a> </div>';  
}

echo '</div>';
 ?>
                        
                        </table>
                    </form>

                </div>


        </div>

    </div>

</body>
</html>