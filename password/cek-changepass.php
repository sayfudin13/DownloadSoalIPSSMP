<?php
include_once("../db/config.inc.php");
session_start();
$query = mysqli_query($link,"SELECT * FROM data WHERE username = '".$_SESSION['username']."'");
$data = mysqli_fetch_array($query);
$oldpwq = $_POST['oldpwd'];
$newpwd = $_POST['newpwd'];
$renewpwd = $_POST['renewpwd'];
$Err=array(0,0,0);

if(empty($oldpwq)){
	$Err[0]="Tidak boleh kosong!";
}else if(sha1($oldpwq)!=$data['password']){
	$Err[0]="Password tidak sesuai!";
}

if (empty($newpwd)) {
	$Err[1]="Tidak boleh kosong!";
} else if (strlen($newpwd) < 6) {
	$Err[1]="Harus lebih dari 6 karakter!";
} else if (strlen(trim($newpwd)) == 0){
  $Err[1]="Tidak boleh hanya spasi!";
} else if (!preg_match('/^[a-zA-Z0-9]+$/', $newpwd)) {
	$Err[1]="Tidak boleh ada karakter spesial!";
}

if (empty($renewpwd)) {
  $Err[2]="Tidak boleh kosong";
}else if ($renewpwd != $newpwd){
	$Err[2]="Password tidak sesuai";
}

	echo json_encode($Err);
?>
