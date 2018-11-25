<?php
session_start();
require 'database.php';
$storynameSearch = $_POST['content'];
$stmt = $mysqli->prepare("select story_links.story_link, stories.username, stories.story_name from stories join story_links on stories.story_name = story_links.story_name");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();
$sof=true;
$stmt->bind_result($story_link, $username, $story_name);
while($stmt->fetch()){
	if($storynameSearch==$story_name) {
		$_SESSION['storyNameForSearch'] = $storynameSearch;
		$sof=false;
		header("Location: showStoryNameForSearchAfterLogin.php");
    exit;
	}
}
if($sof){
	header("Location: searchFail.php");
}
?>