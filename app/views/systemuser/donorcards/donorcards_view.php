<?php 

$metaTitle = "System User - Blood Requests" 
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
    <link href="../../../public/css/systemuser/donorcards.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
    

    

</head>
<body>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/accepted_request.php'); 
    include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/rejected_request.php'); 
    if ($_GET['status'] == "accepted") { ?>
        <script>
            document.getElementById('id01').style.display='block';
        </script>
    <?php }
    ?>
    <?php
    if ($_GET['status'] == "rejected") { ?>
        <script>
            document.getElementById('id02').style.display='block';
        </script>
    <?php }
    ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>       
                    <div class="box">
                        <p class="add-reservation-title">Blood Request From - <?php echo $_SESSION['request'][0]['Name'] ; ?></p>
                        
                        <div class="donor-btns">
                        <a href="/blood_requests?page=1" class="brown-button addnew-card">Back to Requests</a>
                        <img class="addbutton-card" src="./../../public/img/dashboard/personalcard.png" alt="add-button">

                        </div>
                       

                        <div class="cover">
                            <p class="head-back">Request Details</p>
                                      <div class="det-div">
                                            <p class="fb-txt1"><span class="fb-span1"> Hostpital Name: </span>  <?php echo $_SESSION['request'][0]['Name'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Hospital Registration No: </span>  <?php echo $_SESSION['request'][0]['Registration_no'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Email: </span>  <?php echo $_SESSION['request'][0]['Email'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Contact No: </span>  <?php echo $_SESSION['request'][0]['ContactNumber'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Requested Blood Group: </span>  <?php echo $_SESSION['request'][0]['Blood_group'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Requested Blood Component: </span>  <?php echo $_SESSION['request'][0]['Blood_component'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Quantity: </span> <?php echo $_SESSION['request'][0]['Quantity'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Date Requested: </span> <?php echo $_SESSION['request'][0]['Date_requested'] ;?></p>
                                            </div>
                        </div>

                        <div class="right">
                           <p class="head-back"><?php echo $_SESSION['request'][0]['Blood_group'].' '.$_SESSION['request'][0]['Blood_component'];?></p>
                           <p class="fb-txt2"><span class="fb-span1"> Stock Available </span>  </p>
                           <p class="fb-txt3"><?php 
                           if ($_SESSION['quantity'] == NULL) {
                            echo "0" ;
                           }
                           else{
                           echo $_SESSION['quantity'] ;
                           }?></p>

                           <p class="fb-txt2"><span class="fb-span1"> Requested Quantity </span>  </p>
                           <p class="fb-txt3"> <?php echo $_SESSION['request'][0]['Quantity'] ;?></p>
                                            
                        </div>

                        <div class="right-bottom">
                           <p class="head-back">Status</p>
                           <?php
                           if ($_SESSION['request'][0]['Date_accepted'] == NULL) {
                                if ($_SESSION['request'][0][8] == 2) {
                                    echo '<p class="enough"> Already Rejected This Request </p>';

                                }elseif ($_SESSION['request'][0]['Quantity'] <= $_SESSION['quantity']) {
                                    echo '<p class="enough"> Have Enough Stock to Accept </p>';
                                    echo '<a class="accept" href="/blood_requests/accept/'.$_SESSION['request'][0]['RequestID'].'"> Accept </a>';
                                    echo '<a class="reject" href="/blood_requests/reject/'.$_SESSION['request'][0]['RequestID'].'"> Reject </a>';
                                }
                                
                                else {
                                    echo '<p class="enough"> Not Enough Stock to Accept </p>';
                                   echo '<a class="reject-2" href="/blood_requests/reject/'.$_SESSION['request'][0]['RequestID'].'"> Reject </a>';
                                }
                           }
                           else {
                            echo '<p class="enough"> Already Accepted This Request </p>';
                           }
                           ?>                 
                        </div>
                        

                </div>

            </div>


        </div>

    </div>

</body>
</html>