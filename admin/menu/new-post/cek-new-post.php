<?php

	$judul=$_POST['judul'];
	$dokumen=$_POST['dokumen'];
	$gambar=$_POST['gambar'];
	$status=$_POST['status'];
	$category=$_POST['category'];
	$deskripsi=$_POST['deskripsi'];
	$tagsinput=$_POST['tagsinput'];
	$Err = array(0,0,0,0,0,0,0);

	
	if (empty($judul)) {
		$Err[0]="This field is required.";
	}
	
	if(!file_exists("../../../soal/soal/$dokumen")){
		$Err[1]="$dokumen not found, please re-upload";
	}

	if(!file_exists("../../../soal/cover/$gambar")){
		$Err[2]="$gambar not found, please re-upload";
	}

	if (empty($status)) {
		$Err[3]="This field is required.";
	}

	if (empty($category)) {
		$Err[4]="This field is required.";
	}

	if (strlen($deskripsi) > 3000) {
		$Err[5]="Description too long, must be less than 3000 characters";
	}

	if (strlen($tagsinput) > 200) {
		$Err[6]="Tags too long, must be less than 200 characters";
	}
	
	echo json_encode($Err);
?>