<?php 

$metaTitle = "System User - Campaigns" 
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
    
        <link href="../../../public/css/systemuser/campaigns.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>
    <script>
        function swipe() {
        var largeImage = ;
        var url=;
        window.open(document.getElementById('pie').getAttribute('src'),'Image','width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');
        }
    </script>
    

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>       
                    <div class="box">
                        <p class="add-reservation-title">Campaign - <?php echo $_SESSION['campaign'][0][1] ; ?></p>
                        
                        <div class="donor-btns">
                        <a href="/sys_campaigns?page=1" class="brown-button addnew-card">Back to Campaigns</a>
                         <a href="/sys_campaigns/add_donation/<?php echo  $_SESSION['campaign'][0]['CampaignID'] ?>" class="brown-button donation-btn adddon">Add Donation</a>
                        <img class="typebutton-reservation donation-img" src="./../../public/img/dashboard/donation.png" alt="add-button">

                        </div>
                       

                        <div class="cover">
                            <p class="head-back">Request Details</p>
                                      <div class="det-div">
                                            <p class="fb-txt1"><span class="fb-span1"> Campaign Name: </span>  <?php echo $_SESSION['campaign'][0][1] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Location: </span>  <?php echo $_SESSION['campaign'][0]['Location'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Bed Quantity: </span>  <?php echo $_SESSION['campaign'][0]['BedQuantity'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Date: </span>  <?php echo $_SESSION['campaign'][0]['Date'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Starting Time: </span>  <?php echo $_SESSION['campaign'][0]['Starting_time'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Ending Time: </span>  <?php echo $_SESSION['campaign'][0]['Ending_time'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Number of Donors: </span> <?php echo $_SESSION['campaign'][0]['Number_of_donors'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Organized By: </span> <?php echo $_SESSION['campaign'][0]['Name'] ;?></p>
                                            </div>
                        </div>

                        <div class="right">
                           <p class="head-back">Advertisements</p>
                           <?php 
                           if ($_SESSION['adcount'] == 0) {?>
                                <p class=" text1">No Advertisement Published Yet</p>
                         <div class="cont-form">    
                        <p class="add-reservation-title add-title">Add New Advertisement</p>
                        <form action="/sys_campaigns/storead/<?php echo  $_SESSION['campaign'][0]['CampaignID'] ?>" method="post" enctype="multipart/form-data">
                            <div class="reserve-id-container">
                                <label class="reserve-id-lable" for="Description">Description:</label>
                                <br>
                                <input id="Description" class="reserve-id-input" type="text" name="Description" autofocus placeholder="Description" required>
                            </div>
                             <div class="reserve-id-container imageup">
                                <label class="reserve-id-lable" for="imag">Image:</label>
                                <br>
                                <input id="img" class="reserve-id-input" type="file" name="fileimg[]" autofocus placeholder="Description" multiple required>
                            </div>
                            
                                <button class='brown-button adbtn' type='submit' name='add-ad'>Add Advertisement</button>
                                <img class="addbutton adbtnimg" src="./../../public/img/dashboard/add-button.png" alt="add-button">
                                </div>
                        </form>
                        </div>   
                    
                           <?php } else { ?>
                            <div class="w3-content w3-display-container">
                                <div class="img-contain">
                                <?php 
                    
                                foreach($_SESSION['addet'] as $row){ ?>
                                    <img title="Open Image In New Tab" id="pie" class="mySlides" src="./../../public/img/adv/<?php echo $row['AdvertisementPic'] ?>" style="width:100%" onclick=" window.open(this.getAttribute('src'),'Image','width=largeImage.stylewidth,height=largeImage.style.height,resizable=1');">
                                <?php }
                                
                                ?>
                                </div>
                                 
                                

                                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
                            </div>
                            <p class="destext"> Description: <?php echo $row['Description']; ?></p>
                            <p class="destext"> Published Date: <?php echo $row['PublishedDate']; ?></p>
                            <div class="del-div"><a title="Delete This Advertisement" href="/sys_campaigns/deletead/<?php echo  $_SESSION['campaign'][0]['CampaignID'] ?>">   <img class="delete-btn" src="./../../public/img/dashboard/delete-btn.png" alt="delete-btn"> </a> </div>
                            <script>
                                var slideIndex = 1;
                                showDivs(slideIndex);

                                function plusDivs(n) {
                                showDivs(slideIndex += n);
                                }

                                function showDivs(n) {
                                var i;
                                var x = document.getElementsByClassName("mySlides");
                                if (n > x.length) {slideIndex = 1}
                                if (n < 1) {slideIndex = x.length}
                                for (i = 0; i < x.length; i++) {
                                    x[i].style.display = "none";  
                                }
                                x[slideIndex-1].style.display = "block";  
                                }
                            </script>
                           <?php }
                           
                           ?>
                                            
                        </div>

                        
                        

                </div>

            </div>


        </div>

    </div>

</body>
</html>