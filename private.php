<?php
session_start();
if($_GET['sessionid']==session_id())
{
	echo 'Welcome '.$_SESSION['AUTH_USERNAME'];	
}
else
{
	header('Location:index.php');
}
require_once 'classes/autoload.php';
$config = NULL;
$config = (object) parse_ini_file('classes/config.ini', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog</title>
<?php
include 'includes/blogstyle.inc.php';
include 'includes/jquery.inc.php';
?>
</head>
<body>
<h1>Portable chat</h1>
<img src="<?php echo $config->IMAGE_LOC; ?>loading.gif" />
<?php
include 'includes/blogform.inc.php';
?>
<div id="entries">
<?php
$c = new blog;
$c->showEntries();
?>
</div>
<?php
include 'includes/blogscript.inc.php';
?>
</body>
</html>