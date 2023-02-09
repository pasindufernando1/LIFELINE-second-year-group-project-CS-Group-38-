
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/inc/delete.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="<?php echo $_SESSION['action']; ?>" method="POST">
  
    <div class="container">
      <h1>Delete Blood Packet</h1>
      <p>Are you sure you want to delete?</p>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
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