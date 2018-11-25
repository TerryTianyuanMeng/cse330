  <?php
session_start();
    $storyName =$_POST['storyName'];
    require 'database.php';

    $stmt = $mysqli->prepare("insert into story_links (story_name, story_link) values (?, ?)");

    if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
}
 
$stmt->bind_param('ss', $storyName, $storyName);
 
$stmt->execute();
 
$stmt->close();
exit;
 