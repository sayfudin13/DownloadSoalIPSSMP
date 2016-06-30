<?php
	session_start();
	include_once("db/config.inc.php");
	$query = mysqli_query($link, "SELECT * FROM soal ");
	$row = mysqli_num_rows($query);
	$data = mysqli_fetch_array($query);
	while ($data = mysqli_fetch_array($query)) {
		if(sha1($data['no']) == $_GET['noSoal']){
			break;
		}
	}
	if(isset($_SESSION['username']) || $data['status'] == 'sample'){
		header('Location: '.$data['alamat_file']) and exit;
	}
?>