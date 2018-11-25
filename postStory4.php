<?php
session_start();
    $storyName =$_POST['storyName'];
	$content = $_POST['content'];
	$userName = $_SESSION['username'];
    require 'database.php';
  
  //Add to DB stories
    $stmt = $mysqli->prepare("insert into stories (story_name, username, story) values (?, ?, ?)");

    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
    }
    $stmt->bind_param('sss', $storyName, $userName,$content);
    $stmt->execute();
    $stmt->close();

    $stmt = $mysqli->prepare("insert into story_links(story_name,story_link) values (?, ?)");

    if(!$stmt){
    printf("Query Prep Failed: %s\n", $mysqli->error);
    }
    $stmt->bind_param('ss', $storyName, $storyName);
    $stmt->execute();
    $stmt->close();
//Add to link DB
    
exit;
 
?>
