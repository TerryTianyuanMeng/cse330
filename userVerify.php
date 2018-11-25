<?php
session_start();
require 'database.php';
//$username = $_POST['username'];
//$password = $_POST['password'];
$user = $_POST['username'];
$stmt = $mysqli->prepare("SELECT COUNT(*), username, password FROM login WHERE username=?");
 
// Bind the parameter
$stmt->bind_param('s', $user);

$stmt->execute();
$_SESSION['username'] = $user;
// Bind the results
$stmt->bind_result($cnt, $user_id, $pwd_hash);
$stmt->fetch();
 $pwd_guess = $_POST['password'];
if($cnt == 1 && password_verify($pwd_guess, $pwd_hash)){
	// Login succeeded!
	//$_SESSION['user_id'] = $user_id;
	// Redirect to your target page
	header("Location: mainpageAfterLogin.php");
    exit;
} 
else{
	echo "you failed";
	//echo $_SESSION['username'];
}
?>