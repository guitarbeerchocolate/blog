<?php
session_start();
if($_GET['sessionid']==session_id())
{
	$username = $_SESSION['AUTH_USERNAME'];
	$uid = $_SESSION['AUTH_ID'];
	$sessionid = $_GET['sessionid'];
	echo 'Welcome '.$username;	
}
else
{
	header('Location:index.php');
}
$refid = NULL;
if($_GET && $_GET['refid'])
{
	$refid = $_GET['refid'];
}
require_once 'classes/autoload.php';
$config = NULL;
$config = new config;
$c = new blog;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blog</title>
<style>
img
{
	display:none;
}
</style>
<script src="http://www.google.com/jsapi"></script>
<script>
  google.load("jquery", "1");
</script>
</head>
<body>
<h1>Blog</h1>
<?php
if($refid)
{
	echo '<h2>Response to:</h2>';
	$c->getResponse($refid);
}
include 'includes/blogform.inc.php';
?>
<div id="entries">
<?php
$c->showEntries($sessionid);
?>
</div>
</body>
</html>