
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/filters/expired_stock.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="r07" class="modal">
  <span onclick="document.getElementById('r07').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/sys_reports?page=1&report=r7generated" method="POST">
  
    <div class="container">
      <h1>Generate Campaigns Report</h1>
    <div>
        <div>
        <p>
            Select Organized Orgaizations
        </p>
            <select class="inv-type" name="inv-type[]" id="inv-type" multiple="multiple">
                <?php 
                foreach ($_SESSION['camp_org'] as $row) {
                    echo '<option  >'.$row['Name'].' </option>';
                }
                ?>
            </select>
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
        <button type="button" onclick="document.getElementById('r07').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="r7" type="submit" class="deletebtn">Generate  </button>
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
var modal = document.getElementById('r07');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>