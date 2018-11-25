<?php
session_start();
require 'database.php';
//$content = $_POST['content'];
//echo $content;
//$storyName =$_SESSION['story_name'];
$storyName = $_GET['story_name'];
$userName = $_SESSION['username'];
echo $storyName;
echo $userName;

//$stmt = $mysqli->prepare("UPDATE stories SET content = $content WHERE username = $userName AND storyname = $storyName");
$stmt = $mysqli->prepare("DELETE FROM comments WHERE story_name= ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('s', $storyName);
 
$stmt->execute();
 
$stmt->close();
//exit;



$stmt = $mysqli->prepare("DELETE FROM story_links WHERE story_name = ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('s', $storyName);
 
$stmt->execute();
 
$stmt->close();
//exit;

$stmt = $mysqli->prepare("DELETE FROM stories WHERE story_name= ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('s', $storyName);
 
$stmt->execute();
 
$stmt->close();
exit;
?>

