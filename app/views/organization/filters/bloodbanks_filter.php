<!DOCTYPE html>
<head>
     <link href="../../../public/css/organization/filters/bloodbank.css" rel="stylesheet">
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/requestApproval/typeBloodbank?page=1" method="POST">
  
    <div class="containerR">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all" >Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select District
        </p>
            
        <select class="District" id="0"  type="text" name="district" value="District" >
                <option value="" disabled selected hidden>District</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Galle">Galle</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Kegalle">Kegalle</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Matale">Matale</option>
                    <option value="Matara">Matara</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Vavuniya">Vavuniya</option>
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