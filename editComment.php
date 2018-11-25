<!DOCTYPE html>
<?php
session_start();
$_SESSION['comment_id']=$_GET['comment_id'];
//echo $_SESSION['story_name'];
?>
<html>
	<head>
		<title>Want to post a comment?</title>
	</head>
	<body>
		Please input your comment's name and content here:
		<form method="post" action="updateComment.php">
			<input type="text" name="content" size="2000" />
			<input type="submit" value="Post">
		</form>

	</body>
</html>