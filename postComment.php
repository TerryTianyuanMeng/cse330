<?php
session_start();
    $commentId =$_POST['commentId'];
	$content = $_POST['content'];
	$userName = $_SESSION['username'];
    $storyName = $_SESSION['story_name'];
    require 'database.php';
  
  //Add to DB stories
    $stmt = $mysqli->prepare("insert into comments (comment_id, username, story_name, comment) values (?, ?, ?, ?)");

    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
    }
    $stmt->bind_param('ssss', $commentId, $userName, $storyName, $content);
    $stmt->execute();
    $stmt->close();

//Add to link DB
    
exit;
 
?>