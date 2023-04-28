<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="idfilter01" class="modal">
  <span onclick="document.getElementById('idfilter01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/usermanage/deactivated_users?page=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all" >Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select User Type
        </p>
            
            <input name="0" type="checkbox" value="Admin">Admin</input>
            <input name="1" type="checkbox" value="System User">System User</input>
            <input name="2" type="checkbox" value="Donor">Donor</input>
            <input name="3" type="checkbox" value="Organization/Society">Organization/Society</input><br>
            <input name="4" type="checkbox" value="Hospital/Medical_Center">Hospital/Medical_Center</input>
        </div>
    </div>
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('idfilter01').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="filter" type="submit" onclick="document.getElementById('idfilter01').style.display='none'" class="deletebtn">Filter</button>
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