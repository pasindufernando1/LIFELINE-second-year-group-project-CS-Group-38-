
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/expired_stock.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    

</html>
<div id="r04" class="modal">
  <span onclick="document.getElementById('r04').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_reports?page=1&report=r4generated" method="POST">
  
    <div class="container">
      <h1>Generate Inventory Donation Report</h1>
    <div>
        <div>
        <p>
            Select Orgaizations
        </p>
            <select class="inv-type" name="inv-type[]" id="inv-type" multiple="multiple">
                <?php 
                foreach ($_SESSION['don_org'] as $row) {
                    echo '<option  >'.$row['Name'].' </option>';
                }
                ?>
            </select>
        </div>
        
      </div>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('r04').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="r4" type="submit" class="deletebtn">Generate  </button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('r04');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>