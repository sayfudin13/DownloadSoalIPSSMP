<?php
include_once("../db/config.inc.php");

$feedback = $_POST['feedback'];
$Err[0]=0;

if(empty($feedback)){
	$Err[0]="Tidak boleh kosong!";
} else if(strlen($feedback) > 1000){
	$Err[0]="Tidak boleh lebih dari 1000 karakter!";
} else if (strlen(trim($feedback)) == 0){
  $Err[0]="Tidak boleh hanya spasi!";
}
	echo json_encode($Err);
?>
