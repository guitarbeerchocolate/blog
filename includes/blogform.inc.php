<form name="blogpost" method="POST" action="posthandler.class.php">
	<input type="hidden" name="method" id="method" value="savemessage" />
	<input type="hidden" name="sessionid" id="sessionid" value="<?php echo $sessionid; ?>" />
	<input type="hidden" name="refid" id="refid" value="<?php echo $refid; ?>" />
	<input type="hidden" name="userid" id="userid" value="<?php echo $uid; ?>" /><br />
	<label for="title">Title</label>
	<input type="text" name="title" id="title" /><br />
	<label for="content">Content</label>
	<textarea name="content" id="content"></textarea><br />
	<button class="btn" type="submit">Submit</button><br />
</form><br />