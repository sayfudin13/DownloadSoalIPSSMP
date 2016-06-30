<?php
	include_once("../db/config.inc.php");
	session_start();
	$sender = $_SESSION['username'];
	$isi = $_POST['feedback'];
	$q = "INSERT INTO `messages` (`no`, `isi`, `tanggal`, `dibaca`, `sender`) VALUES (NULL, '$isi',  CURRENT_TIMESTAMP, 0, '$sender')";
	$res = mysqli_query($link,$q);
	$q_changeBrTag = "UPDATE messages SET isi=REPLACE(isi,'\n','<br />')";
	$query_update = mysqli_query($link,$q_changeBrTag);
	echo $res;
?>
