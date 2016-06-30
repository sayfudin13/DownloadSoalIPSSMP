<?php
	include_once("../../db/config.inc.php");
	$searchUsername = $_POST['searchUsername']."";
	$searchEmail = $_POST['searchEmail']."";
	$text = array("","");
	$qry = "SELECT * FROM data WHERE username LIKE '%".$searchUsername."%' AND email LIKE '%".$searchEmail."%'";

	$query_user = mysqli_query($link,$qry);
	$row_user = mysqli_num_rows($query_user);
	while ($data_user = mysqli_fetch_array($query_user)) { 
		$text[0] .= "<tr><td>".$data_user['username']."</td><td>".$data_user['email']."</td></tr>";
	}

	if ($row_user == 0) {
		$text[0] .= "no data";
	}

	echo json_encode($text);
?>