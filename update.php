<?php
session_start();
require 'database.php';
$content = $_POST['content'];
//echo $content;
//$storyName =$_SESSION['story_name'];
$storyName = $_SESSION['story_name'];
$userName = $_SESSION['username'];
echo $storyName;

//$stmt = $mysqli->prepare("UPDATE stories SET content = $content WHERE username = $userName AND storyname = $storyName");
$stmt = $mysqli->prepare("update stories set stories.story = ? where stories.username = ? and stories.story_name = ?");
    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('sss', $content, $userName, $storyName);
 
$stmt->execute();
 
$stmt->close();
exit;
?>
