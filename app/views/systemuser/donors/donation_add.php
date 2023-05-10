<?php 
$metaTitle = "Donation - Add New" ;

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
    <link href="../../../public/css/extra/custom-select.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/sidebar.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/donor.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/donation_add.css" rel="stylesheet">
    

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/datalist-css/dist/datalist-css.min.js"></script>
    
    

    

</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#input").keyup(function(){
				var searchText = $(this).val();
				$.ajax({
					url: './verify_donation',
					type: 'post',
					data: {search: searchText},
					success: function(response){
                        console.log(response);
						$("#sub-btn").html(response);
					}
				});
			});
		});
	</script>
    <!-- header -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); ?>
    <!-- Side bar -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); ?>
                    <div class="box">
                        <p class="add-reservation-title">Add to Donation</p>
                        <form action="/sys_donors/store_donation" method="post">
                            <div class="reserve-id-container">
                                <label id="donor_nic" class="reserve-id-lable" for="type_id">Donor NIC</label>
                                <br>
                                <input id="input" class="reserve-id-input" type="text" name="nic" autocomplete="off" autofocus placeholder="Donor NIC" list="donors" required>
                                
                                
                                <datalist id="donors">                                    
                                    <?php 
                                        $count = count($_SESSION['Donor_dets']);
                                        for ($i=0; $i <$count ; $i++) { 
                                            echo'<option value="'.$_SESSION['Donor_dets'][$i]['NIC'].'">'.$_SESSION['Donor_dets'][$i]['NIC'].' - '.$_SESSION['Donor_dets'][$i]['Fullname'].'</option> ';
                                        }
                                    ?>
                                </datalist>

                                
                            </div>
                        
                            <div class="expiry-constraints-container">
                                <label class="expiry-constraints-lable" for="expiry_constraints">Complication:</label>
                                <br>
                                <input id="expiry_constraints" class="expiry-constraints-input" type="text" name="comp" autofocus placeholder="Complication" >
                                <div id="sub-btn">
                                <button  class='brown-button' type='submit' name='add-donation'>Add Donation</button>
                                
                                <img class="addbutton" src="./../../public/img/dashboard/add-button.png" alt="add-button">
                                </div>
                                <a class='outline-button' type='reset' name='cancel-adding' href="/sys_donors/donation?page=1">Cancel Adding</a>
                                <img class="cancelbutton" src="./../../public/img/dashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                    </div>

               

</body>
</html>
<script src="../../../public/js/drop-down.js"></script>