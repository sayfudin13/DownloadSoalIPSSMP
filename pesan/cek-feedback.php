<?php
include_once("../db/config.inc.php");

$feedback = $_POST['feedback'];
$Err[0]=0;

if(empty($feedback)){
	$Err[0]="This field cannot be empty!";
} else if(strlen($feedback) > 1000){
	$Err[0]="Username must be less than 1000 characters!";
}
	echo json_encode($Err);
?>