<?php 
$metaTitle = "System User Dashboard" 
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
    <link href="../../../public/css/systemuser/dashboardxtra.css" rel="stylesheet">

    <!-- Font Files -->
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">

    <!-- js Files -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    
    <script src="../../../public/js/drop-down.js"></script>
    
    

    

</head>
<body>
    <!-- header --> <!-- Side bar -->
    <?php require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/header.php'); 
    require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/layout/sidebar.php'); 
    require($_SERVER['DOCUMENT_ROOT'].'/app/views/systemuser/includes/shortage_blood.php');?> 

<?php 
if (isset($_GET['mail'])) { 
    if ($_GET['mail'] == 'sent') { ?>
         <script>
                document.getElementById('id01').style.display='block';
            </script>
<?php } }?>


    
<div class="bo1">
    <p class="te1">Donations Today</p>
    <p class="te2">8566</p>
</div>

<div class="bo2">
    <p class="te1">Card Issued</p>
    <p class="te2">1,234</p>
</div>

<div class="bo3">
    <p class="te1">Advertisements Ongoing</p>
    <p class="te2">7</p>
</div>

<div class="bo4">
    <p class="te1">Campaign Requests</p>
    <p class="te2">17</p>
    
</div>

<div class="bo5">
<p class="tebar">Blood Donation Statistics</p>
<canvas id="usage-months">
                <script>
                    var ctx = document.getElementById('usage-months').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                            datasets: [{
                                label: 'Donation Received',
                                data: [12, 19, 3, 5, 2, 3, 1, 2, 3, 4, 5, 6],
                                backgroundColor: [
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16',
                                    '#BF1B16'
                                ],   
                                //Barwidth
                                //backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
                                
                                borderRadius: 8,
                                borderSkipped: false,
                                barpercentage: 1,
                                 borderWidth: 2,
                                
                                borderSkipped: false,
                                hoverOffset: 4
                            }]
                        },

                        
                        options: {

                            title: {
                                display: true,
                                text: 'Donation Received',
                                // Align the chart title to the top left
                                position: 'top',
                                fontSize: 30,
                                fontColor: '#000000',
                                fontFamily: 'Poppins',
                                fontStyle: 'bold',
                                hoverOffset: 4
                            },
                            scales: {
                                x: {
                                    
                                    grid: {
                                        display: false,
                                        tickBorderDash: [10,15]
                                        
                                }
                                },
                                y: {
                                    grid: {
                                        borderDash: [8, 4],
                                        display: true,
                                        tickBorderDash: [10,15]
                                    },
                                    ticks: {
                                        beginAtZero: true
                                    },
                                    
                                }
                        }
                        }
                    });
                </script>

            </canvas>
        </div>

        <div class="bo6">
            <p class="tebar">Send Blood Shortage Emails</p>
            <form action="./sendmail" method="POST">
            <div class="bloodtype-container-dash">
                <label class="bloodtype-lable-dash" for="bloodtype">Blood Type</label>
                <br>
                <select id="bloodtype" class="bloodtype-input-dash bloodtype-input" type="text" name="bloodtype" autofocus placeholder="Blood Type" required>
                    <!-- Placeholder -->
                    <option value="" disabled selected hidden>Select Blood Type</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="location-container-dash">
                <label class="location-lable-dash" for="location">Location:</label>
                <br>
                <select id="district" class="district-input custom-select-dash" type="text" name="district" autofocus placeholder="District"required>
                    <!-- Show placeholder -->
                    <option value="" disabled selected hidden>District</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya">Vavuniya</option>
                </select>
            </div>

            <button id="submit-btn" class='brown-button dash-form' type='submit' name='add-donor'>Send</button>
            

                                
            </form>
            

        </div>

        <div class="bo7">
            
            <p class="tebar">Donor Composition</p>
            <canvas id="pie-chart" width="800" height="450"></canvas>
            <script>
                new Chart(document.getElementById("pie-chart"), {
                    type: 'bar',
                     labels: ['Male', 'Female'],
                            
                    data: {
                            labels: ['Male', 'Female'],
                            datasets: [{
                                label: 'Donation Received',
                                data: [12, 19 ],
                                backgroundColor: [
                                    '#BF1B16',
    
                                    
                                    '#BF1B16'
                                ],   
                                //Barwidth
                                //backgroundColor: Utils.transparentize(Utils.CHART_COLORS.blue, 0.5),
                                
                                borderRadius: 8,
                                borderSkipped: false,
                                barpercentage: 1,
                                 borderWidth: 2,
                                
                                borderSkipped: false,
                                hoverOffset: 4
                            }]
                        },
                    
                    options: {
                    title: {
                        display: true,
                        text: 'Predicted world population (millions) in 2050',
                        hoverOffset: 4
                    }
                    },
                    
                });
                </script>
        </div>
</body>
</html>