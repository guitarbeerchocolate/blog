<?php
session_start();
require_once 'classes/autoload.php';
$config = NULL;
$config = new config;
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
<img src="<?php echo $config->values->IMAGE_LOC; ?>loading.gif" />
<?php
include 'includes/loginform.inc.php';
?>
</body>
</html>