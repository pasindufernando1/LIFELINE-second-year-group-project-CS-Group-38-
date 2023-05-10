<!DOCTYPE html>
<head>
    <link href="../../../public/css/organization/filters/rating.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  
  <form class="modal-content" id="del" action="/requestApproval/typeRating?campaign=<?php echo $_SESSION['campaignID']?>&page=1" method="POST">
  
    <div class="containerR">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all" >Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select Rating
        </p>
            
        <select class="Rating" id="0"  type="text" name="0" value="Rating">
                <option value="" disabled selected hidden>Rating</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    
                </select> 
            
            
        </div>
        
        
        <!-- <div>
        <p>
            Select Date Range
        </p>
            <label for="start">From:</label>
            <input name="start" type="date" ></input>
            <label for="end">To:</label>
            <input name="end" type="date"></input>
        </div> -->
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