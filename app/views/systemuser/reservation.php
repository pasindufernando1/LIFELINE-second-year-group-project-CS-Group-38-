<?php 
// print_r($_SESSION['packets']);die();
$metaTitle = "System User Reservations" ;

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
    <link href="../../../public/css/systemuser/reservation.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="../../../public/js/drop-down.js"></script>
    <script src="../../../public/js/systemuser/reservation.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>   

    <?php $delete = "Blood Reserve"; ?>

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/delete_confirmation.php'); ?>
    
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/filters/reservation.php'); ?>


                    <div class="box" id="box">
                        <p class="add-reservation-title">Blood Reserves</p>
                        
                        <!-- <a href="/reservation/add" class="brown-button addnew-reservation">Add Reserves</a>
                        <img class="addbutton-reservation" src="./../../public/img/dashboard/add-button.png" alt="add-button"> -->

                        <a href="/reservation/type?page=1" class="brown-button types-reservation pending-quan">Pending Quantity</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/blood-types.png" alt="add-button">

                        <a href="/reservation/expired_stocks?page=1" class="brown-button expired-stock-btn">Expired Stocks</a>
                        <img class="expired-stocks-img" src="./../../public/img/dashboard/expired-stocks.png" alt="expired-stocks">

                        <a href="#" class="ash-button reservation-filter" onclick="document.getElementById('id02').style.display='block'">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            
                            <th>Blood Group</th>
                            <th>Quantity</th>
                            <th>Expiry Constraints</th>
                            <th>Status</th>
                        </tr>
                        <hr class="blood-types-line">
                        <?php 
                        $_SESSION['filtered_pack'] = $_SESSION['packets'];
                        $results_per_page = 7;
                        $number_of_results = count($_SESSION['packets']);
                        $number_of_page = ceil($number_of_results / $results_per_page);

                        //determine which page number visitor is currently on  
                        if (!isset ($_GET['page']) ) {  
                            $page = 1;  
                        } else {  
                            $page = $_GET['page'];  
                        }  
                         //determine the sql LIMIT starting number for the results on the displaying page  
                        $page_first_result = ($page-1) * $results_per_page;  
                        $result = $_SESSION['packets'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($number_of_results > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                            
                               
                                echo '<div class="table-content-types"> <tr>
                                        <td>' . $row["Name"] . " " .$row['Subtype'] . "</td>
                                        <td>" . $row["Quantity"] ." Counts" ."</td>
                                        <td>" . $row["Expiry_constraint"] . " Days". "</td>
                                        <td>" ;
                                        if ($row["Status"] == 1) {
                                            echo 'Available';
                                        } else if($row["Status"] == 2) {
                                             echo 'Expired';
                                        }else {
                                             echo 'Reserved';
                                        }
                                        
                                          
                                        
                                        
                                        echo  '</td>
                                        </tr> </div>'; ?>
            
                                    <?php

                                    
                                    
                                
                            }
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
                        }
                        ?>
                        
                        </table>
                        

                </div>
            </div>
            </div>
            <div class="box-small" >
                <p class="count-title">Blood Quantity Count</p>
                <div class="count-box">
                    <?php
                    $result2 = $_SESSION['count'];
                    $lable = array();
                    $quandata = array();
                        foreach($result2 as $item){
                            array_push($lable,($item['type']));
                            array_push($quandata,$item['totalquantity']);
                        echo ' <p><span class="c-name">'.$item['type'].'</span> -<span class="c-quan"> '.$item['totalquantity']. " Counts".'</span></p>';                    }
                    
                    ?>
                </div>
            </div>
             
            <div class="box-pie" id="pie"  >
           
            <script type="text/javascript">

                window.addEventListener('click', function(e){   
                    if (document.getElementById('pie').contains(e.target)){
                       document.getElementById("pie").style.width = "41%";
                        document.getElementById("pie").style.height = " 90.1%";
                        document.getElementById("pie").style.left = "30%";
                        document.getElementById("pie").style.top = "96px";
                        document.getElementById("pie").style.transition = "width 1s";
                        document.getElementById("pie").style.transition = "height 1s";
                        document.getElementByID("box").style.filter = "blur(8px)";
                        
                    } else{
                        document.getElementById("pie").style.width = "19%";
                    document.getElementById("pie").style.height = " 38.1%";
                    document.getElementById("pie").style.left = "81%";
                    document.getElementById("pie").style.top = "575px";
                    document.getElementById("pie").style.transition = "width 1s";
                    document.getElementById("pie").style.transition = "height 1s";
                    }
                    });

                

            
            </script>
<canvas id="myChart" style="width:100%;" ></canvas>

<script>
var xValues =  <?php echo json_encode($lable); ?>;
var yValues = <?php echo json_encode($quandata); ?>;
var barColors = [
  "#640E0B",
  "#960018", 
  "#8D021F", 
  "#9F1D35", 
  "#D21F3C", 
  "#841617", 
  "#E30B5D", 
  "#7C0A02",

  "#933A16",
  "#DA2C43", 
  "#ED2939", 
  "#D9381E", 
  "#FFA07A", 
  "#FA8072", 
  "#E9967A", 
  "#F08080",

  "#E2062C",
  "#EA3C53", 
  "#C04000", 
  "#5E1914", 
  "#B43757", 
  "#CD5C5C", 
  "#FF6347", 
  "#C21807",

  "#D03D33",
  "#BA1607", 
  "#FF3C28", 
  "#B22222", 
  "#8B0000", 
  "#E0115F", 
  "#BF0A30", 
  "#CB4154"
];

new Chart(document.getElementById("myChart"), {
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Blood Reserve"
    }
  }
});
</script>

            </div>
</body>
</html>