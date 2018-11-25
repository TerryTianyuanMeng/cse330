<?php
session_start();
require 'database.php';
 $comment_name=$_GET['comment_id'];
$stmt = $mysqli->prepare("select comment, comment_id, username from comments");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
$stmt->execute();
 
$stmt->bind_result($comment,$comment_id,$username);
echo "<ul>\n";

while($stmt->fetch()){
	if($comment_id == $comment_name) {
		printf("\t<li>%s</li>\n",htmlspecialchars($comment));
	}
}
echo "</ul>\n";
 
$stmt->close();
?>