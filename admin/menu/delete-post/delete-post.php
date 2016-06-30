<?php
	include_once("../../db/config.inc.php");

	$no=$_POST['no'];
	$arr = array(0);
	if(!mysqli_query($link, "DELETE FROM soal WHERE no = '$no'")){
		$arr[0] = false;
	} else {
		$arr[0] = true;
	}

	echo json_encode($arr);
?>