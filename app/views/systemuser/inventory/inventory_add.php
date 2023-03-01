<?php 
$metaTitle = "System User Inventory" 
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
    <link href="../../../public/css/systemuser/inventory.css" rel="stylesheet">
    <link href="../../../public/css/systemuser/inventory_add.css" rel="stylesheet">
    
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
                        <p class="add-reservation-title">Add to Inventory</p>
                        
                        

                        <form action="/sys_inventory/store" method="post">
                    
                            <div class="blood-group-container">
                                <label class="blood-group-lable" for="blood_group">Inventory Type:</label>
                                <br>
                                
                                <div class="custom-select">
                                    <input name="type" id="blood_group" class="blood-group-input" list="type" autofocus placeholder="Inventory Type" required>
                                     <datalist id="type">                                    
                                        <?php 
                                            $count = count($_SESSION['invtypes']);
                                            for ($i=0; $i <$count ; $i++) { 
                                                echo'<option value="'.$_SESSION['invtypes'][$i]['Type'].'">'.$_SESSION['invtypes'][$i]['Type'].'</option> ';
                                            }
                                        ?>
                                    </datalist>

                                        
                                    </input>
                                </div>
                                <script src="../../../public/js/custom-select.js"></script>
                            </div>
                            <div class="quantity-container">
                                <label class="quantity-lable" for="quantity">Name:</label>
                                <br>
                                <input id="quantity" class="quantity-input" list="name" type="text" name="name" autofocus placeholder="Name" required>
                                <datalist id="name">                                    
                                        <?php 
                                            $count = count($_SESSION['invtypes']);
                                            for ($i=0; $i <$count ; $i++) { 
                                                echo'<option value="'.$_SESSION['invtypes'][$i]['Name'].'">'.$_SESSION['invtypes'][$i]['Name'].'</option> ';
                                            }
                                        ?>
                                    </datalist>
                            </div>
                            
                            <div class="quan-container">
                                <label class="quantity-lable" for="quantity">Quantity:</label>
                                <br>
                                <input id="quantity" class="quantity-input" type="text" name="quantity" autofocus placeholder="Quantity" required>
                            </div>
                            <div class="btn-container">
                                
                                <button class='brown-button' type='submit' name='add-reservation'>Add to Inventory</button>
                                <img class="addbutton" src="./../../public/img/dashboard/add-button.png" alt="add-button">
                                <a class='outline-button' type='reset' name='cancel-adding' href="/sys_inventory?page=1">Cancel Adding</a>
                                <img class="cancelbutton" src="./../../public/img/dashboard/cancel-button.png" alt="cancel-button">
                            </div>
                        </form>
                        

                </div>

            </div>


        </div>

    </div>

</body>
</html>