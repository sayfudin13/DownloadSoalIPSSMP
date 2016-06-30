<?php
include_once("../db/config.inc.php");
session_start();
$query = mysqli_query($link,"SELECT * FROM admin WHERE username = '".$_SESSION['usernameAdmin']."'");
$data = mysqli_fetch_array($query);
$oldpwq = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$renewpwd = $_POST['renewpwd'];
$Err=array(0,0,0);

if(empty($oldpwq)){
	$Err[0]="This field cannot be empty";
}else{
	if(sha1($oldpwq)!=$data['password']){
		$Err[0]="Password is incorrect!";
	}
}

if (empty($newpwd)) {
    $Err[1]="This field cannot be empty";
}

if (empty($renewpwd)) {
    $Err[2]="This field cannot be empty";
}else{
	if ($renewpwd != $newpwd){
		$Err[2]="Password doesn't match";
	}
}

	echo json_encode($Err);
?>