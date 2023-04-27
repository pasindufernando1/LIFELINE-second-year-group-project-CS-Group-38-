function filterDate() {
    var input, filter, table, tr, td, i, txtValue;
    input2 = document.getElementById("search-nic");
    input2.value="";
    input = document.getElementById("calendar");
    filter = input.value;
    console.log(filter);
    table = document.getElementById("blood-types-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }

  function filterNIC() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("search-nic");
    input2 = document.getElementById("calendar");
    input2.value="";
    filter = input.value;
    console.log(filter);
    table = document.getElementById("blood-types-table");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }