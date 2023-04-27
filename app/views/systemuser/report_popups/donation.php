
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/expired_stock.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="r06" class="modal">
  <span onclick="document.getElementById('r06').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_reports?page=1&report=r6generated" method="POST">
  
    <div class="container">
      <h1>Generate Donation Report</h1>
    <div>
        <div>
        <p>
            Select Blood Groups
        </p>
            <input name="0" type="checkbox" value="A+">A+</input>
            <input name="1" type="checkbox" value="A-">A-</input>
            <input name="2" type="checkbox" value="B+">B+</input>
            <input name="3" type="checkbox" value="B-">B-</input>
            <input name="4" type="checkbox" value="O+">O+</input>
            <input name="5" type="checkbox" value="O-">O-</input>
            <input name="6" type="checkbox" value="AB+">AB+</input>
            <input name="7" type="checkbox" value="AB-">AB-</input>
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
        <button type="button" onclick="document.getElementById('r06').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="r6" type="submit" class="deletebtn">Generate  </button>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('r06');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>