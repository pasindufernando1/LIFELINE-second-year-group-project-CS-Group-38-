<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/inventory/type?page=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all">Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select Inventory Category
        </p>
            <!-- Give options to select the inventory category from the content in the sessin variable _SESSION['inventory_names']-->
            <?php
                $inventory_names = $_SESSION['inventory_names'];
                $i = 0;
                foreach($inventory_names as $inventory_name){
                    echo '<input name="'.$i.'" type="checkbox" value="'.$inventory_name.'" id="'.$i.'">'.$inventory_name.'</input>';
                    $i++;
                }
            ?>
        </div>
        <div>
        <p>
            Select the blood banks needed
        </p>
                <!-- Giving a drop down to select the required blood bank -->
                <select name="blood_bank">
                    <!-- Give a placeholder for the options -->
                    <option value="" disabled selected hidden>Select BloodBank</option>
                    <?php
                        $blood_banks = $_SESSION['bloodbank_names'];
                        foreach($blood_banks as $blood_bank){
                            echo '<option value="'.$blood_bank.'">'.$blood_bank.'</option>';
                        }
                    ?>
                </select>
        </div>
    </div>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="filter" type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Filter</button>
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>