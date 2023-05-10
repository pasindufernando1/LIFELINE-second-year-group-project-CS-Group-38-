<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/reserves/type?page=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all" >Remove all filters</input>
      </div>
    <div>
        <div>
        <p>
            Select Blood Groups
        </p>
            
            <input name="0" type="checkbox" value="A+" id="0">A+</input>
            <input name="1" type="checkbox" value="A-" id="1">A-</input>
            <input name="2" type="checkbox" value="B+" id="2">B+</input>
            <input name="3" type="checkbox" value="B-" id="3">B-</input>
            <input name="4" type="checkbox" value="O+" id="4">O+</input>
            <input name="5" type="checkbox" value="O-" id="5">O-</input>
            <input name="6" type="checkbox" value="AB+" id="6">AB+</input>
            <input name="7" type="checkbox" value="AB-" id="7">AB-</input>
        </div>
        <div>
        <p>
            Select Sub Components
        </p>
            <input name="10" type="checkbox" value="RBC" id="10">RBC</input>
            <input name="11" type="checkbox" value="WBC" id="11">WBC</input>
            <input name="12" type="checkbox" value="Platelet" id="12">Platelet</input>
            <input name="13" type="checkbox" value="Plasma" id="13">Plasma</input>
        </div>
        <div>
        <p>
            Select Province
        </p>
            <input name="14" type="checkbox" value="Western">Western</input>
            <input name="15" type="checkbox" value="Central">Central</input>
            <input name="16" type="checkbox" value="Southern">Southern</input>
            <input name="17" type="checkbox" value="North Western">North Western</input>
            <input name="18" type="checkbox" value="North Central">North Central</input><br>
            <input name="19" type="checkbox" value="Northern">Northern</input>
            <input name="20" type="checkbox" value="Uva">Uva</input>
            <input name="21" type="checkbox" value="Sabaragamuwa">Sabaragamuwa</input>
            <input name="22" type="checkbox" value="Eastern">Eastern</input>
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

// Disable the ids 10,11,12,13 default
document.getElementById("10").disabled = true;
document.getElementById("11").disabled = true;
document.getElementById("12").disabled = true;
document.getElementById("13").disabled = true;

// If either of the ids 0,1,2,3,4,5,6,7 is checked, enable the ids 10,11,12,13 in a loop
for(let i = 0; i < 8; i++){
    document.getElementById(i).addEventListener("click", function() {
        if (document.getElementById(i).checked) {
            for (let i = 10; i < 14; i++) {
                document.getElementById(i).disabled = false;
            }
        } else {
            for (let i = 10; i < 14; i++) {
                document.getElementById(i).disabled = true;
            }
        }
    });
}



</script>
</body>