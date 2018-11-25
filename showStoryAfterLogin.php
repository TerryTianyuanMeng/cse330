<!DOCTYPE html>
<?php
session_start();
require 'database.php';
$user = $_SESSION['username'];
$story_name=$_GET['story_name'];
$_SESSION['story_name']=$story_name;

$stmt = $mysqli->prepare("select stories.story, comments.comment_id, comments.username from stories join comments on stories.story_name=comments.story_name where comments.story_name = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $story_name);
$stmt->execute();
$stmt->bind_result($story,$comment_id,$username);
echo "<ul>\n";
$i = 1;
while($stmt->fetch()){

	if($i == 1) {
		printf("\t<li>%s</li>\n",htmlspecialchars($story));
		$i = $i + 1; 
	}
	$path = sprintf("showCommentAfterLogin.php?comment_id=%s", $comment_id);
	echo'<p><a href="'.$path.'">'. htmlspecialchars($comment_id).'</a></p><br>';
	
	if($user==$username) {
		$delete_path = sprintf("deleteComment.php?comment_id=%s", $comment_id);
		$edit_path = sprintf("editComment.php?comment_id=%s", $comment_id);
		echo'<a href="'.$delete_path.'">Delete</a>';
		echo'<p><a href="'.$edit_path.'">Edit</a></p><br>';
	}
}
echo "</ul>\n";
 
$stmt->close();
?>

<html>
	<head>
		<title>Welcome!</title>
	</head>
	<body>
		Please input your comment's name and content here:
		<form method="post" action="postComment.php">
			<label>Comment Name:<input type="text" name="commentId" size="20" /></label><br/>
			<label>Comment Text:<input type="text" name="content" size="100" /></label><br/>
			<input type="submit" value="Post">
		</form>

	</body>
</html>