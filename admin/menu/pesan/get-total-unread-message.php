<?php
	include_once("../../db/config.inc.php");

	$query_messages = mysqli_query($link, "SELECT * FROM messages WHERE dibaca = 0");
	$row_messages = mysqli_num_rows($query_messages);
	$arr[0] = $row_messages;

	echo json_encode($arr);
?>