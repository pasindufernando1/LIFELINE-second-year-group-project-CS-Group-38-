
<!DOCTYPE html>
<head>
    <link href="../../../public/css/systemuser/inc/delete.css" rel="stylesheet">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    

</html>
<div id="done" class="modal">
  <span onclick="document.getElementById('done').style.display='none'" class="close" title="Close Modal">×</span>
  <form class="modal-content" id="del" action="" method="POST">
  
    <div class="container">
      <h1>Report Generated Successfully</h1>
    
      <div class="clearfix">
        <a id="action2" href="/sys_reports/download" type="button" class="dwn-btn">Download</a>
        <a id="action" href="/sys_reports/save" type="button" class="save-btn">Save</a>
        </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('done');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>