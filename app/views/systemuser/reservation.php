<?php 
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
<<<<<<< Updated upstream

=======
    <?php $delete = "Blood Reserve"; ?>
>>>>>>> Stashed changes
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/delete_confirmation.php'); ?>
    


<<<<<<< Updated upstream
                    <div class="box">
=======
                    <div class="box" id="box">
>>>>>>> Stashed changes
                        <p class="add-reservation-title">Blood Reserves</p>
                        
                        <!-- <a href="/reservation/add" class="brown-button addnew-reservation">Add Reserves</a>
                        <img class="addbutton-reservation" src="./../../public/img/dashboard/add-button.png" alt="add-button"> -->

                        <a href="/reservation/type?page=1" class="brown-button types-reservation">Pending Quantity</a>
                        <img class="typebutton-reservation" src="./../../public/img/dashboard/blood-types.png" alt="add-button">

                        <a href="/reservation/expired_stocks?page=1" class="brown-button expired-stock-btn">Expired Stocks</a>
                        <img class="expired-stocks-img" src="./../../public/img/dashboard/expired-stocks.png" alt="expired-stocks">

                        <a href="#" class="ash-button reservation-filter">Filter & Short</a>
                        <img class="reservation-filter-img" src="./../../public/img/dashboard/filter-icon.png" alt="reservation-filter-img">

                        <table class="blood-types-table" style="width:90%">
                        <tr>
                            
                            <th>Blood Group</th>
                            <th>Quantity</th>
                            <th>Expiry Constraints</th>
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
                        $result = $_SESSION['packets'];

                        //display the link of the pages in URL  
                          

                        // print_r($result[0]);die();
                        if ($_SESSION['rowCount'] > 0) {
                           
                            foreach(array_slice($result, ($results_per_page*$page - $results_per_page), $results_per_page) as $row) {
                            
                               
                                echo '<div class="table-content-types"> <tr>
<<<<<<< Updated upstream
                                        <td>' . $row["PacketID"]. "</td>
                                        <td>" . $row["Name"] . "</td>
                                        <td>" . $row["Quantity"] . "</td>
                                        <td>" . $row["Expiry_constraint"] . '</td>
                                        <td>';

                                        
                                        
                                        
                                        
                                        
                                        
=======
                                        <td>' . $row["Name"] . " " .$row['Subtype'] . "</td>
                                        <td>" . $row["Quantity"] ." Packs" ."</td>
                                        <td>" . $row["Expiry_constraint"] . " Days". '</td>
                                        <td>';

                                        
>>>>>>> Stashed changes
                                         echo '<div class="action-btns" ><div class="edit-btn-div"> <a href="/reservation/edit_reservation_id/'.$row["PacketID"].'"> <img class="edit-btn" src="./../../public/img/dashboard/edit-btn.png" alt="edit-btn"> </a> </div> <div class="delete-btn-div"> 
                                         <a onclick="document.getElementById('."'id01'".').style.display='."'block'".';      
                                         document.getElementById('."'del'".').action = '."'/reservation/delete/".$row["PacketID"]."'".'";
                                         ">   
                                         
                                         
                                         
                                         <img class="delete-btn" src="./../../public/img/dashboard/delete-btn.png" alt="delete-btn"> </a> </div> </div></td>
                                    </tr> </div>'; ?>
            
                                    <?php

                                    
                                    
                                
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
                        echo ' <p><span class="c-name">'.$item['type'].'</span> -<span class="c-quan"> '.$item['totalquantity']. " Packets".'</span></p>';                    }
                    
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
                    document.getElementById("pie").style.top = "569px";
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
  "#F5AEAC", 
  "#F0817E", 
  "#EB5550", 
  "#E62822", 
  "#BF1B16", 
  "#911511", 
  "#FBDAD9"
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