<?php
session_start();
require 'database.php';
//$content = $_POST['content'];
//echo $content;
//$storyName =$_SESSION['story_name'];
$commentId = $_GET['comment_id'];
$userName = $_SESSION['username'];
//echo $storyName;
//echo $userName;

//$stmt = $mysqli->prepare("UPDATE stories SET content = $content WHERE username = $userName AND storyname = $storyName");
$stmt = $mysqli->prepare("DELETE FROM comments WHERE comment_id= ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('s', $commentId);
 
$stmt->execute();
 
$stmt->close();
//exit;




exit;
?>

