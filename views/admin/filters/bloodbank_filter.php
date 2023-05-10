<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/usermanage/bloodbanks?page=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all" >Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select Province/Provinces
        </p>
            <input name="0" type="checkbox" value="Western">Western</input>
            <input name="1" type="checkbox" value="Eastern">Eastern</input>
            <input name="2" type="checkbox" value="Central">Central</input>
            <input name="3" type="checkbox" value="North Western">North Western</input><br>
            <input name="4" type="checkbox" value="North Central">North Central</input>
            <input name="5" type="checkbox" value="Northern">Northern</input>
            <input name="6" type="checkbox" value="Sabaragamuwa">Sabaragamuwa</input>
            <input name="7" type="checkbox" value="Southern">Southern</input>
            <input name="8" type="checkbox" value="Uva">Uva</input>
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