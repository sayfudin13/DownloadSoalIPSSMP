<?php
	include_once("../../db/config.inc.php");

	$no=$_POST['no'];
	$arr = array('isi'=>0, 'tanggal'=>0, 'sender'=>0);

	$query_update_message = mysqli_query($link, "UPDATE `messages` SET `dibaca`=1 WHERE `no`='$no'");
	
	$query_message = mysqli_query($link, "SELECT * FROM messages WHERE no = '$no'");
	$data_message = mysqli_fetch_array($query_message);

	$date = new DateTime($data_message['tanggal']);

	$arr['isi']=$data_message['isi'];
	$arr['tanggal']=$date->format('H:i:s, d M Y');
	$arr['sender']=$data_message['sender'];

	echo json_encode($arr);
?>