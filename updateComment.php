<?php
session_start();
require 'database.php';
$contentOfComment = $_POST['content'];
//echo $content;
$storyName =$_SESSION['story_name'];
$commentId = $_SESSION['comment_id'];
$userName = $_SESSION['username'];
//echo $storyName;

//$stmt = $mysqli->prepare("UPDATE stories SET content = $content WHERE username = $userName AND storyname = $storyName");
$stmt = $mysqli->prepare("update comments set comments.comment = ? where comments.username = ? and comments.comment_id = ? and comments.story_name = ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('ssss', $contentOfComment, $userName, $commentId, $storyName);
 
$stmt->execute();
 
$stmt->close();
exit;
?>