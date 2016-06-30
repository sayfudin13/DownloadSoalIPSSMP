<?php
	include_once("../../db/config.inc.php");

	$no=$_POST['no'];
	$arr = array('nama'=>0, 'dokumen'=>0, 'gambar'=>0, 'status'=>0, 'category'=>0, 'tanggal'=>0, 'deskripsi'=>0, 'tagsinput'=>0);
	
	$query_soal = mysqli_query($link, "SELECT * FROM soal WHERE no = '$no'");
	$data_soal = mysqli_fetch_array($query_soal);

	$date = new DateTime($data_soal['tanggal']);

	switch ($data_soal['category']) {
    case "kelas-7":$category="Kelas 7";break;
    case "kelas-8":$category="Kelas 8";break;
    case "kelas-9":$category="Kelas 9";break;
    case "osn":$category="Olimpiade Sains Nasional";break;
    case "silabus-rpp":$category="SILABUS - RPP";break;
    case "ppt":$category="Power Point File";break;
    case "sample":$category="Free Sample";break;
    default:$category="-";break;
	}

	if($data_soal['status'] == 'bukan')
		$status= "Bukan sample";
	else
		$status= "Sample";

	$tags = explode(',', $data_soal['tags']);
	$tagsinput = "";
	for ($i=0; $i < count($tags); $i++) { 
		$tagsinput .= " <span class='btn btn-xs btn-primary'>".$tags[$i]."</span> ";
	}

	$arr['nama']=$data_soal['nama'];
	$arr['dokumen']="/admin/download/".sha1($data_soal['no'])."/";
	$arr['namaDokumen']=after_last('/',$data_soal['alamat_file']);
	$arr['gambar']=$data_soal['alamat_gambar'];
	$arr['status']=$status;
	$arr['category']=$category;
	$arr['tanggal']=$date->format('M jS, Y');
	$arr['deskripsi']=$data_soal['deskripsi'];
	$arr['tagsinput']=$tagsinput;

	function after ($this, $inthat)
	{
	    if (!is_bool(strpos($inthat, $this)))
	    return substr($inthat, strpos($inthat,$this)+strlen($this));
	};

	function after_last ($this, $inthat)
	{
	    if (!is_bool(strrevpos($inthat, $this)))
	    return substr($inthat, strrevpos($inthat, $this)+strlen($this));
	};

	function before ($this, $inthat)
	{
	    return substr($inthat, 0, strpos($inthat, $this));
	};

	function before_last ($this, $inthat)
	{
	    return substr($inthat, 0, strrevpos($inthat, $this));
	};

	function between ($this, $that, $inthat)
	{
	    return before ($that, after($this, $inthat));
	};

	function between_last ($this, $that, $inthat)
	{
	 return after_last($this, before_last($that, $inthat));
	};
	// use strrevpos function in case your php version does not include it
	function strrevpos($instr, $needle)
	{
	  $rev_pos = strpos (strrev($instr), strrev($needle));
	  if ($rev_pos===false) return false;
	  else return strlen($instr) - $rev_pos - strlen($needle);
	};

	echo json_encode($arr);
?>