<?php
include_once("../../db/config.inc.php");

$username = $_POST['username'];

$query = mysqli_query($link, "SELECT * FROM data WHERE username = '$username'");
$data = mysqli_fetch_array($query);

//username
$arr['username'] = $data['username'];
if ($data['status'] == 1) {
  $arr['username2'] = $arr['username']." (<font color='green'>Aktif</font>)";
  $arr['button'] = "<button class='btn btn-danger' data-toggle='modal' data-target='#konfirmasi-aktifasi'><i class='fa fa-times'></i> Nonaktifkan Akun</button>";
} else {
  $arr['username2'] = $arr['username']." (<font color='red'>Nonaktif</font>)";
  $arr['button'] = "<button class='btn btn-success' data-toggle='modal' data-target='#konfirmasi-aktifasi'><i class='fa fa-check'></i> Aktifkan Akun</button>";
}
//email
$arr['email'] = $data['email'];
//nama
$arr['nama'] = $data['nama'];
//gender
if ($data['gender'] == 1) {
  $arr['gender'] = "Pria";
} else {
  $arr['gender'] = "Wanita";
}

$query_provinces = mysqli_query($link, "SELECT * FROM provinces where id = ".$data['province']);
$data_provinces = mysqli_fetch_array($query_provinces);
$arr['provinsi'] = $data_provinces['name'];
//kota
$query_regencies = mysqli_query($link, "SELECT * FROM regencies where id = ".$data['regency']);
$data_regencies = mysqli_fetch_array($query_regencies);
$arr['kota'] = $data_regencies['name'];
//kecamatan
$query_districs = mysqli_query($link, "SELECT * FROM districts where id = ".$data['district']);
$data_districts = mysqli_fetch_array($query_districs);
$arr['kecamatan'] = $data_districts['name'];
//kelurahan
$query_villages = mysqli_query($link, "SELECT * FROM villages where id = ".$data['village']);
$data_villages = mysqli_fetch_array($query_villages);
$arr['kelurahan'] = $data_villages['name'];

$arr['bornday'] = $data['bornday'];
$arr['pendidikan'] = $data['pendidikan'];
$arr['alamat'] = $data['alamat'];

echo json_encode($arr);

 ?>
