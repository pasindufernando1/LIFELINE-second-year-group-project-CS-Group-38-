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
    <link href="../../../public/css/systemuser/donor_view.css" rel="stylesheet">
    
    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="../../../public/js/drop-down.js"></script>
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
     <script scr="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"> </script>
     <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script
			src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"
			integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer">
    
    </script>

</head>
<body>
   
    <script>
        function exportpdf()
        {
            
            const front = document.getElementById("content");
		    html2canvas(front).then((canvas) => {
			let base64image = canvas.toDataURL('image/png');
			//console.log(base64image);
			let pdf = new jsPDF('l', 'mm' , [420, 220]); 
			pdf.addImage(base64image, 'PNG', 10, 10, 400,200);
            // Generate a random number for the file name
            var random = Math.floor(Math.random() * 1000000001);
            var filename = 'DonorDetails'+ random + '.pdf'; 
			pdf.save('DonorDetails' + random + '.pdf');
            });
        }

        function exportpng()
        {
            const front = document.getElementById("front");
		    html2canvas(front).then((canvas) => {
			 var imagedata = canvas.toDataURL('image/png');
            var imgdata = imagedata.replace(/^data:image\/(png|jpg);base64,/, "");
			$.ajax({
                    url: '/sys_donors/card_upload',
                    data: {
                        imgdata:imgdata
                        },
                    type: 'post',
                    success: function (response) {   
                    console.log(response);
                    }
                });
            });


            
            
        }
    </script>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>

    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>  

    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/donor_card_added.php'); ?>
    
     
                    <div id="content" class="box">
                        <div class="box-top">
                            <p class="add-reservation-title">Donor info - <?php echo $_SESSION['Donor_det'][0]['Fullname'] ?></p>

                             <a onclick="exportpng();document.getElementById('id01').style.display='block';" class="brown-button card-btn">Issue Card</a>
                            <img class="typebutton-reservation card-img" src="./../../public/img/dashboard/personalcard.png" alt="add-button">

                            
                             <a href="/sys_donors?page=1" class="brown-button donation-btn">Back to Donors</a>
                            <img class="typebutton-reservation donation-img" src="./../../public/img/dashboard/donation.png" alt="add-button">

                            <a onclick='exportpdf()'  class="ash-button export" title="Export data as pdf">
                                <img id="sub" class="export-img" src="./../../public/img/dashboard/export-icon.png" alt="">
                                
                                </a>
                        </div>
                        <div class="box-inner">
                            <div class="flip-card">
                                <div  class="flip-card-inner">
                                    <div class="flip-card-back">
                                      <p class="head-back">Donor Details</p>
                                      <div class="det-div">
                                            <p class="fb-txt1"><span class="fb-span1"> Full Name: </span>  <?php echo $_SESSION['Donor_det'][0]['Fullname'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> NIC: </span>  <?php echo $_SESSION['Donor_det'][0]['NIC'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Date of Birth: </span>  <?php echo $_SESSION['Donor_det'][0]['DOB'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Blood Group: </span>  <?php echo $_SESSION['Donor_det'][0]['BloodType'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> District: </span> <?php echo $_SESSION['Donor_det'][0]['District'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Province: </span> <?php echo $_SESSION['Donor_det'][0]['Province'] ;?> Province</p>
                                            <p class="fb-txt1"><span class="fb-span1"> Email: </span>  <?php echo $_SESSION['Donor_det'][0]['Email'] ;?></p>
                                            <p class="fb-txt1"><span class="fb-span1"> Contact No: </span>  <?php echo $_SESSION['Donor_det'][0]['ContactNumber'] ;?></p>
                                      </div>
                                      
                                    </div>
                                    <div id="front" class="flip-card-front">
                                        <div class="flip-card-front-top">
                                            <div class="flip-card-front-top-img">
                                                <img class = "img-flip" src="../../../public/img/logo/logo-horizontal.jpg" alt="logo-horizontal">
                                            </div>
                                            <div class="flip-card-front-left-img">
                                                <img class = "img-flip-2" src="./../../public/img/dashboard/donor_card.png" alt="">
                                            </div>
                                        </div>
                                        <div class="flip-card-front-body">
                                            
                                            <div class="flip-card-front-body-img">
                                                <?php 
                                                $cdonations = count($_SESSION['Past_donations']);
                                                if ($_SESSION['Donor_det'][0]['Userpic'] != 'default-path' ){
                                                    echo '<img class = "img-flip-body" src="../../../public/img/user_pics/'.$_SESSION['Donor_det'][0]['Userpic'].'" alt="logo-horizontal">';
                        
                                                }
                                                else {
                                                    echo '<img class = "img-flip-body" src="../../../public/img/user_pics/default.jpg" alt="logo-horizontal">';
                                                }
                                            ?>
                                                
                                            </div>
                                            <?php
                                                $age = (date('Y') - date('Y',strtotime($_SESSION['Donor_det'][0]['DOB'])));
                                                
                                             ?>
                                            <div class="flip-card-front-body-txt">
                                                <p class="fb-txt1"><span class="fb-span1"> Name: </span> <?php echo $_SESSION['Donor_det'][0]['Fullname'] ;?></p>
                                                <p class="fb-txt1"><span class="fb-span1"> Age: </span>  <?php echo $age ;?></p>
                                                <p class="fb-txt2"><span class="fb-span1"> Address: </span> <?php echo $_SESSION['Donor_det'][0]['Number'] . ", ".  $_SESSION['Donor_det'][0]['LaneName']. ", ".  $_SESSION['Donor_det'][0]['City'].", ".  $_SESSION['Donor_det'][0]['District'] .", ".  $_SESSION['Donor_det'][0]['Province'] . " Province";?></p>
                                                <p class="fb-txt1"><span class="fb-span1"> Total Donation: </span>  <?php echo $cdonations ;?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="bottom-box">
                                    <p class="last-don"><span class="fb-span1"> Last Donation:</span> <?php
                                    
                                    if ($cdonations == 0) {
                                        echo 'No Donations Yet';
                                    }
                                    else {
                                        echo $_SESSION['Past_donations'][0]['Date']; 
                                    }
                                    ?>
                                    

                                    </p>
                                    <?php
                                    if ($cdonations != 0){
                                        $lastdate = strtotime($_SESSION['Past_donations'][0]['Date']);
                                        $diff = 10520000;

                                        $datenow = date("Y-m-d");
                                        $dateinsec = strtotime($datenow);

                                        if($dateinsec - $lastdate >= $diff ){
                                                echo '<span class="eligible">Eligible For New Donations</span>';
                                            }else{
                                                echo '<span class="not-eligible">Not Eligible For New Donations</span>';
                                            }
                                    }else {
                                        echo '<span class="eligible">Eligible For New Donations</span>';
                                    }
                                     
                                     ?>
                                </div>
                            </div>
                            <div class="left-box">
                                <div class ="badge">
                                    <p class="head-Badge">Current Badge</p>
                                    <?php 
                                    $badgecount = count($_SESSION['Donor_badge']);
                                    if($badgecount != 0){
                                        echo '<img class="badge-img" src="../../../public/img/admindashboard/badges/'.$_SESSION["Donor_badge"][0]["BadgePic"].'" alt=""> </div>';
                                    }
                                    else {
                                        echo '<p class="Nobadge "> No Badges Earned Yet </p> </div>';
                                    }
                                    ?>
                                
                                <div class = "donations">
                                    <p class="head-history">Donation History</p>
                                    <div class="dona-div">
                                        <?php 
                                             if ($cdonations != 0) {
                                               for ($i=0; $i < $cdonations; $i++) { 
                                                echo ' <p class="past-donations">'.$_SESSION['Past_donations'][$i]['Date'].'</p> ';
                                                }
                                            }
                                            else {
                                                echo ' <p class="past-donations">No Donations Yet</p> ';
                                            }
                                            
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                            
                       
                           
                    </div>
                    </div>
                    <!-- <div id="image_id">
<img src="" alt="image" />
</div> -->

</body>
</html>