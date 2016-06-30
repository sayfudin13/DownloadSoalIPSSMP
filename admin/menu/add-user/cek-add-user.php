<?php
	
	include_once("../../db/config.inc.php");
	$username=$_POST['username'];
	$query_username = mysqli_query($link,"SELECT * FROM data WHERE username = '".$username."'");
	$row_username = mysqli_num_rows($query_username);
	$Err = array(0);

	
	if(empty($username)){
		$Err[0]="This field cannot be empty!";
	} else if (strlen($username) < 6) {
		$Err[0]="Username must be higher than 6 characters!";
	} else if(strlen($username) > 20){
		$Err[0]="Username must be less than 20 characters!";
	} else if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
		$Err[0]="Special characters are not allowed!";
	} else if ($row_username > 0) {
		$Err[0]="This username already exist!";
	}
	
	echo json_encode($Err);
?>