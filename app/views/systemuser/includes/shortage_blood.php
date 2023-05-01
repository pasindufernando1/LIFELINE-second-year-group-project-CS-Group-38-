
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/inc/delete.css" rel="stylesheet">
    
</head>
<body>
    

</html>
<div id="id01" class="modal">
  <span onclick="location.href='/systemuser/dashboard'">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1>Mails Sent Successfully</h1>
    
      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Done</button>
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
    location.href='/systemuser/dashboard';
  }
}
</script>
</body>