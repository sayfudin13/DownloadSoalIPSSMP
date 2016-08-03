<?php
include_once("../db/config.inc.php");
$nama = $_POST['nama'];
$gender = $_POST['gender'];
$bornday = $_POST['bornday'];
$pendidikan = $_POST['pendidikan'];
$provinsi = $_POST['provinsi'];
$kota = $_POST['kota'];
$kecamatan = $_POST['kecamatan'];
$kelurahan = $_POST['kelurahan'];
$alamat = $_POST['alamat'];
$username = $_POST['username'];
$password = sha1($_POST['password']);
$email = $_POST['email'];

$q = "INSERT INTO `data` VALUES ('$username', '$password', '$email', '$nama', '$gender', '$bornday', '$pendidikan', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$alamat', 0, 'none')";
$res = mysqli_query($link,$q);
echo $res;
?>
