
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/expired_stock.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="r03" class="modal">
  <span onclick="document.getElementById('r03').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_reports?page=1&report=r3generated" method="POST">
  
    <div class="container">
      <h1>Generate Inventory Report</h1>
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
        <button type="button" onclick="document.getElementById('r03').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="r3" type="submit" class="deletebtn">Generate  </button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('r03');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>