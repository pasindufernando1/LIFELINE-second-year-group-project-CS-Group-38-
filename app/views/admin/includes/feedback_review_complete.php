<!DOCTYPE html>
<head>
    <link href="../../../public/css/admin/popups/popups.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1>Feedback review completion</h1>
      <p>Are you sure you need to proceed?</p>
    
      <div class="clearfix">
        <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Yes</button>
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">No</button>
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