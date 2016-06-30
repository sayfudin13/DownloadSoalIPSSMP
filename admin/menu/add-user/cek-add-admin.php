<?php
include_once("../../db/config.inc.php");

$username = $_POST['username'];
$query_username = mysqli_query($link,"SELECT * FROM data WHERE username = '".$username."'");
$row_username = mysqli_num_rows($query_username);
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$email = $_POST['email'];
$query_email = mysqli_query($link,"SELECT * FROM data WHERE email = '".$email."'");
$row_email = mysqli_num_rows($query_email);
$Err=array(0,0,0,0);

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

if (empty($password)) {
	$Err[1]="This field cannot be empty!";
} else if (strlen($password) < 6) {
	$Err[1]="Password must be higher than 6 characters!";
} else if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
	$Err[1]="Special characters are not allowed!";
}

if (empty($repassword)) {
	$Err[2]="This field cannot be empty!";
} else if ($repassword != $password){
	$Err[2]="Password doesn't match!";
}

if (empty($email)) {
	$Err[3]="This field cannot be empty!";
} else if (strlen($email) > 254) {
	$Err[3] = "Must be less than 50 characters!";
} else if (!validEmail($email)) {
	$Err[3] = "This is not email!";
} else if ($row_email > 0) {
	$Err[3] = "This email has been registered!";
}

function validEmail($email){
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		return false;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	$local_array = explode(".", $email_array[0]);
	for ($i = 0; $i < sizeof($local_array); $i++) {
		if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
			return false;
		}
	}
	if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
		$domain_array = explode(".", $email_array[1]);
		if (sizeof($domain_array) < 2) {
			return false; // Not enough parts to domain
		}
		for ($i = 0; $i < sizeof($domain_array); $i++) {
			if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
				return false;
			}
		}
	}
		return true;
}

	echo json_encode($Err);
?>