<!DOCTYPE html>
<?php
session_start();

$user = $_SESSION['username'];
require 'database.php';

$stmt = $mysqli->prepare("select story_links.story_link, stories.username, stories.story_name from stories join story_links on stories.story_name = story_links.story_name");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();

$stmt->bind_result($story_link, $username, $story_name);
echo "<ul>\n";
while($stmt->fetch()){
	$path = sprintf("showStoryAfterLogin.php?story_name=%s", $story_link);
	echo'<p><a href="'.$path.'">'. htmlspecialchars($story_link).'</a></p>';
	if($user==$username) {
		$delete_path = sprintf("deleteStory.php?story_name=%s", $story_link);
		$edit_path = sprintf("edit.php?story_name=%s", $story_link);
		echo'<a href="'.$delete_path.'">Delete</a>';
		echo'<p><a href="'.$edit_path.'">Edit</a></p><br>';
	}
}
echo "</ul>\n";
 
$stmt->close();
?>
<html>
	<head>
		
	</head>
	<body>
		Please search story here:
		<form method="post" action="searchStoryAfterLogin.php">
			<label>Story Name:<input type="text" name="content" value=""/></label>
			<input type="submit" value="Search">
		</form>

	</body>
</html>

<html>
	<head>
		<title>Welcome!</title>
	</head>
	<body>
		Please input your story's name and content here:
		<form method="post" action="postStory4.php">
			<label>Story Name:<input type="text" name="storyName" size="20" /></label><br/>
			<label>Story Text:<input type="text" name="content" size="100" /></label><br/>
			<input type="submit" value="Post">
		</form>

	</body>
</html>