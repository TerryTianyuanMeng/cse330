<?php
session_start();
    $storyName =$_POST['storyName'];
	$content = $_POST['content'];
	$userName = $_SESSION['userName'];
    require 'database.php';
  
  //Add to DB stories
    $stmt1 = $mysqli->prepare("insert into stories (story_name, username, story) values (?, ?, ?)");

    if(!$stmt1){
	printf("Query Prep Failed: %s\n", $mysqli->error);
    }
    $stmt1->bind_param('sss', $storyName, $userName,$content);
    $stmt1->execute();
    $stmt1->close();

//Add to link DB
    $stmt = $mysqli->prepare("insert into story_links (story_name, story_link) values (?, ?)");

    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
    } 
    $stmt->bind_param('ss', $storyName, $storyName); 

$stmt->execute();
$stmt->close();
exit;
 
?>