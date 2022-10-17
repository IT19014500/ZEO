<div id="id01" class="modal">
  <form class="modal-content animate" action="../login.php" method="post" style="width:330px;">
    <div class="imgcbody">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal"><br>&times;</span>
      <br>
      <img src="Images/login/log.jpg" style="display:block;margin-left:auto;margin-right:auto;width:20%;" alt="Avatar" class="avatar">
    </div>

    <div class="cbody">
      
      <input class="form-control" style="color:black;width:200px;" type="text" placeholder="Enter Username" name="uname" required><br><br><br>
      
      <input class="form-control" style="color:black;width:200px;" type="password" placeholder="Enter Password" name="psw" required><br><br><br>
        
      <button type="submit" class = "logi" name="login">Login</button><br><br><br>
      <label>
        <input type="checkbox" checked="checked" name="remember" > Remember me
      </label>
    </div>
<div class = "cancel">
    <div class="cbody">
	
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div><br>
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
<!-- Login End -->