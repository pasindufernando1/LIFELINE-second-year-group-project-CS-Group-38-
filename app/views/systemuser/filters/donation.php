
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_donors/donation?page=1&filtered=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <a class="removefil" href="/sys_donors/donation?page=1">Remove Filters</a>
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
            <input id="from" max="<?php echo date('Y-m-d') ?>" name="start" type="date" required>
            <label for="end">To:</label>
            <input id="to" max="<?php echo date('Y-m-d') ?>" name="end" type="date" required>
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
  document.getElementById("from").onchange = function () {
    var input = document.getElementById("to");
    input.setAttribute("min", this.value);
}

document.getElementById("to").onchange = function () {
    var input = document.getElementById("from");
    input.rem("max", this.value);
    input.setAttribute("max", this.value);
}

  $(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;    
    $('#txtDate').attr('max', maxDate);
});
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