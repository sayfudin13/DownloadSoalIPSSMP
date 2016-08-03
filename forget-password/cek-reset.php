<?php
$newpwd = $_POST['newpwd'];
$renewpwd = $_POST['renewpwd'];
$Err=array(0,0);

if (empty($newpwd)) {
	$Err[0]="Tidak boleh kosong!";
} else if (strlen($newpwd) < 6) {
	$Err[0]="Harus lebih dari 6 karakter!";
} else if (strlen(trim($newpwd)) == 0){
  $Err[0]="Tidak boleh hanya spasi!";
} else if (!preg_match('/^[a-zA-Z0-9]+$/', $newpwd)) {
	$Err[0]="Tidak boleh ada karakter spesial!";
}

if (empty($renewpwd)) {
  $Err[1]="Tidak boleh kosong";
}else if ($renewpwd != $newpwd){
	$Err[1]="Password tidak sesuai";
}

	echo json_encode($Err);
?>
