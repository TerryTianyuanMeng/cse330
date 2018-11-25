<!DOCTYPE html>
<?php
session_start();
$_SESSION['story_name']=$_GET['story_name'];
//echo $_SESSION['story_name'];
?>
<html>
	<head>
		<title>Want to post a story?</title>
	</head>
	<body>
		Please edit here:
		<form method="post" action="update.php">
			<input type="text" name="content" size="2000" />
			<input type="submit" value="Post">
		</form>

	</body>
</html>