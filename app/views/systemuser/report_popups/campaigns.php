
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/expired_stock.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="r07" class="modal">
  <span onclick="document.getElementById('r07').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_reports?page=1&report=r7generated" method="POST">
  
    <div class="container">
      <h1>Generate Campaigns Report</h1>
    <div>
        <div>
        <p>
            Select Organized Orgaizations
        </p>
            <select class="inv-type" name="inv-type[]" id="inv-type" multiple="multiple">
                <?php 
                foreach ($_SESSION['camp_org'] as $row) {
                    echo '<option  >'.$row['Name'].' </option>';
                }
                ?>
            </select>
        </div>
        <div>
        <p>
            Select Date Range
        </p>
            <label for="start">From:</label>
            <input name="start" type="date" required >
            <label for="end">To:</label>
            <input name="end" type="date" required>
        </div>
      </div>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('r07').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="r7" type="submit" class="deletebtn">Generate  </button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('r07');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>