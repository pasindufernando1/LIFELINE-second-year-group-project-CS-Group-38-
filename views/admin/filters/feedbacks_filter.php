<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/filters/reservation.css" rel="stylesheet">
    
</head>
<body>
    
</html>
<div id="idfil01" class="modal">
  <span onclick="document.getElementById('idfil01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="/feedbacks/type?page=1" method="POST">
  
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
            <input type="int" name="year" id="year" placeholder="Year" class="year">

        </div>
        
    </div>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('idfil01').style.display='none'" class="cancelbtn">Cancel</button>
        <button name="filter" type="submit" onclick="document.getElementById('idfil01').style.display='none'" class="deletebtn">Filter</button>
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal = document.getElementById('idfil01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Date validation
// const date = document.getElementById('date');
const year = document.getElementById('year');
const head = document.getElementById('heading');

// Date should be in the range of 1-31
// date.addEventListener('input', function() {
//     const inputValue = parseInt(date.value); // Parse input value as an integer
//     if (isNaN(inputValue) || inputValue > 31 || inputValue < 1) {
//         head.innerHTML = "Date should be in the range of 1-31";
//         date.style.color = 'red';
//     } else {
//         head.innerHTML = "Select Date,Month,Year";
//         date.style.color = 'black';
//     }
// });

// Year should be a four digit number
year.addEventListener('input', function() {
    const inputValue = parseInt(year.value); // Parse input value as an integer
    if (isNaN(inputValue) || inputValue > 9999 || inputValue < 1000) {
        head.innerHTML = "Year invalid";
        year.style.color = 'red';
    } else {
        head.innerHTML = "Select Date,Month,Year";
        year.style.color = 'black';
    }
});

</script>
</body>