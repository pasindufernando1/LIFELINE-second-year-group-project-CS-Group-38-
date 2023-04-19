
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/inventory.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_inventory?page=1&filtered=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <a class="removefil" href="/sys_inventory?page=1">Remove Filters</a>
    <div>
        <div>
        <p>
            Select Inventory Types
        </p>
            <select class="inv-type" name="inv-type[]" id="inv-type" multiple="multiple">
                <?php 
                foreach ($_SESSION['inv_types'] as $row) {
                    echo '<option  >'.$row['Type'].' </option>';
                }
                ?>
            </select>
        </div>
      </div>
    
      <div class="clearfix">
        <button  type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button  name="filter" type="submit" onclick="document.getElementById('id02').style.display='none'" class="deletebtn">Filter</button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>