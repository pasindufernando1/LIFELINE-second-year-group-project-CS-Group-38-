
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/campaigns.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_campaigns?page=1&filtered=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <a class="removefil" href="/sys_campaigns?page=1">Remove Filters</a>
    <div>
        <div>
        <p>
            Select Acceptance Status
        </p>
            <select name="status" id="stat">
                <option value="0">Pending</option>
                <option value="1">Approved</option>
            </select>
        </div>

        <div>
        <p>
            Select Date Range
        </p>
            <label for="start">From:</label>
            <input name="start" type="date" ></input>
            <label for="end">To:</label>
            <input name="end" type="date"></input>
        </div>
      </div>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="filter" type="submit"  class="deletebtn">Filter</button>
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