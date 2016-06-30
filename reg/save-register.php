<?php
	include_once("../db/config.inc.php");
	session_start();
	$oldusername = $_POST['oldusername'];
	$username = $_POST['username'];
	$password = sha1($_POST['password']);
	$email = $_POST['email'];
	$q = "UPDATE data SET username = '$username', password = '$password', email = '$email', status = '1' WHERE username = '$oldusername'";
	$res = mysqli_query($link,$q);
	if ($res) {
		$_SESSION['username'] = $username;
	}
	echo $res;
?>
