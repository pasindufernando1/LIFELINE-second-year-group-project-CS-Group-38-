
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_donors?page=1&filtered=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <a class="removefil" href="/sys_donors?page=1">Remove Filters</a>
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
            Select the districts needed
        </p>
            <input name="10" type="checkbox" value="Ampara" id="10">Ampara</input>
            <input name="11" type="checkbox" value="Anuradhapura" id="11">Anuradhapura</input>
            <input name="12" type="checkbox" value="Badulla" id="12">Badulla</input>
            <input name="13" type="checkbox" value="Batticaloa" id="13">Batticaloa</input>
            <input name="14" type="checkbox" value="Colombo" id="14">Colombo</input><br>
            <input name="15" type="checkbox" value="Galle" id="15">Galle</input>
            <input name="16" type="checkbox" value="Gampaha" id="16">Gampaha</input>
            <input name="17" type="checkbox" value="Hambantota" id="17">Hambantota</input>
            <input name="18" type="checkbox" value="Jaffna" id="18">Jaffna</input>
            <input name="19" type="checkbox" value="Kalutara" id="19">Kalutara</input><br>
            <input name="20" type="checkbox" value="Kandy" id="20">Kandy</input>
            <input name="21" type="checkbox" value="Kegalle" id="21">Kegalle</input>
            <input name="22" type="checkbox" value="Kilinochchi" id="22">Kilinochchi</input>
            <input name="23" type="checkbox" value="Kurunegala" id="23">Kurunegala</input>
            <input name="24" type="checkbox" value="Mannar" id="24">Mannar</input><br>
            <input name="25" type="checkbox" value="Matale" id="25">Matale</input>
            <input name="26" type="checkbox" value="Matara" id="26">Matara</input>
            <input name="27" type="checkbox" value="Monaragala" id="27">Monaragala</input>
            <input name="28" type="checkbox" value="Mullaitivu" id="28">Mullaitivu</input>
            <input name="29" type="checkbox" value="Nuwara Eliya" id="29">Nuwara Eliya</input><br>
            <input name="30" type="checkbox" value="Polonnaruwa" id="30">Polonnaruwa</input>
            <input name="31" type="checkbox" value="Puttalam" id="31">Puttalam</input>
            <input name="32" type="checkbox" value="Ratnapura" id="32">Ratnapura</input>
            <input name="33" type="checkbox" value="Trincomalee" id="33">Trincomalee</input>
            <input name="34" type="checkbox" value="Vavuniya" id="34">Vavuniya</input>
        </div>
        <div>
        <p id="nic-label">
            Enter the NIC of the Donor
        </p>
            <input name="nic" type="text" placeholder="Enter the NIC of the Donor ...." id="nic" class="input-te"></input>
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