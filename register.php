<!DOCTYPE html>
<?php
require 'database.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
password_hash($password, PASSWORD_DEFAULT);
$hashedPassword = crypt($password,'$2$random-salt$hashed-password');
$stmt = $mysqli->prepare("insert into login (username, password) values (?, ?)");
if(!$stmt){
	printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
}
 
$stmt->bind_param('ss',$username, $hashedPassword);
 
$stmt->execute();
 
$stmt->close();
 
?>

<html>
	<head>
		<title>Congratulations!</title>
	</head>
	<body>
	You have registered successfully!
	<form action="mainpageBeforeLogin.php">
	<input type="submit" value="Back to Login" />
	</form>
	</body>
</html>
