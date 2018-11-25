<!DOCTYPE html>
	<html>
		<head>
			<title>Login</title>
		</head>
		<body>
			<form name="myform" method="POST" action="userVerify.php">
				<label>Username:<input type="text" name="username" value="" /></label><br/>
				<laebl>Password:<input type="text" name="password" value=""/></laebl><br/>
				<input type="submit" name="sub" value="Sign In" />
			</form>
			Plese register here
			<form name="myform2" method="POST" action="register.php">
			<label>Username:<input type="text" name="username" value="" /></label><br/>
				<laebl>Password:<input type="text" name="password" value=""/></laebl><br/>
				<input type="submit" name="register" value="Sign Up">
			</form>
		</body>
	</html>
<?php
session_start();
require 'database.php';
$stmt = $mysqli->prepare("select story_links.story_link, stories.username, stories.story_name from stories join story_links on stories.story_name = story_links.story_name");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->execute();
 
$stmt->bind_result($story_link, $username, $story_name);
$_SESSION['story_name'] = $story_name;
//$_SESSION['username'] = $username;

echo "<ul>\n";
while($stmt->fetch()){
	//echo '<p>Story_name:'
	$path = sprintf("showStory.php?story_name=%s", $story_link);
	echo'<p><a href="'.$path.'">'. htmlspecialchars($story_link).'</a></p><br>';
	//echo $_SESSION['username'];
	//echo $username;
}
echo "</ul>\n";
 
$stmt->close();
?>
<html>
	<head>
		
	</head>
	<body>
		Please search story here:
		<form method="post" action="searchStory.php">
			<label>Story Name:<input type="text" name="content" value=""/></label>
			<input type="submit" value="Search"></laebl>
		</form>

	</body>
</html>