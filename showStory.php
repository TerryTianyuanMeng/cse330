<?php
require 'database.php';

 $story_name=$_GET['story_name'];


$stmt = $mysqli->prepare("select story, comment_id from stories join comments on stories.story_name=comments.story_name where comments.story_name = ?");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->bind_param('s', $story_name);
 
$stmt->execute();
 
$stmt->bind_result($story,$comment_id);
 
echo "<ul>\n";
$i = 1;




while($stmt->fetch()){
	if($i == 1) {
		printf("\t<li>%s</li>\n",htmlspecialchars($story));
		$i = $i + 1; 
		


	}
	$path = sprintf("showComment.php?comment_id=%s", $comment_id);
	echo'<p><a href="'.$path.'">'. htmlspecialchars($comment_id).'</a></p><br>';
}
echo "</ul>\n";
 
$stmt->close();
?>