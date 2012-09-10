<form id="chat">  
  <input type="hidden" name="myid" id="myid" value="<?php echo $_SESSION['AUTH_ID']; ?>" /><br />
  <textarea name="mymessage" id="mymessage" placeholder="your message…"></textarea><br />
  <button class="btn" type="submit">Submit</button><br />
</form><br />