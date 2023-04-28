<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/reports/type?page=1" method="POST">
  
    <div class="container">
      <h1>Filter & Short</h1>
      <div class="remove-filter">
        <input name="all_type" type="checkbox" value="all">Remove all filters</input>
      </div>
    <div>
        <div>
        <p id="heading">
            Select Month & Year
        </p>
            <!-- Only the date section in date format
            <input type="int" name="date" id="date" placeholder="Date" class="date"> -->
            <!-- Only the month section in date format -->
            <select id="month" name="month">
                <option value="" disabled selected hidden>--Select Month--</option>
                <option value="1">January</option>
                <option value="2">February</option>
                <option value="3">March</option>
                <option value="4">April</option>
                <option value="5">May</option>
                <option value="6">June</option>
                <option value="7">July</option>
                <option value="8">August</option>
                <option value="9">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
            <!-- Only the year section in date format -->
            <input type="int" name="year" id="year" placeholder="Year" class="years">

        </div>
        <div>
            <p>
                Select the Requestor
            </p>
            <select name="requestor">
                    <!-- Give a placeholder for the options -->
                    <option value="" disabled selected hidden>Select Requestor</option>
                    <?php
                        $entity = $_SESSION['entityNames'];
                        foreach($entity as $row){
                            echo '<option value="'.$row.'">'.$row.'</option>';
                        }
                    ?>
                </select>
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