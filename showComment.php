<?php
require 'database.php';
 $comment_name=$_GET['comment_id'];
$stmt = $mysqli->prepare("select comment, comment_id from comments");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
//$stmt->bind_param('s', $story_name);
 
$stmt->execute();
 
$stmt->bind_result($comment,$comment_id);
 
echo "<ul>\n";
while($stmt->fetch()){
	if($comment_id == $comment_name) {
		printf("\t<li>%s</li>\n",htmlspecialchars($comment));
	}
}
echo "</ul>\n";
 
$stmt->close();
?>