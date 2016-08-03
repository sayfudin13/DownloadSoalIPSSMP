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
$query_username = mysqli_query($link,"SELECT * FROM data WHERE username = '".$username."'");
$row_username = mysqli_num_rows($query_username);
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$email = $_POST['email'];
$query_email = mysqli_query($link,"SELECT * FROM data WHERE email = '".$email."'");
$row_email = mysqli_num_rows($query_email);
$Err=array(0,0,0,0,0,0,0,0,0,0,0,0,0);

if(empty($nama)){
  $Err[0]="Tidak boleh kosong!";
} else if(strlen($nama) > 255){
  $Err[0]="Nama terlalu panjang!";
} else if (strlen(trim($nama)) == 0){
  $Err[0]="Tidak boleh hanya spasi!";
}

if(empty($gender)){
  $Err[1]="Tidak boleh kosong!";
} else if ($gender == 0) {
  $Err[1]="Mohon pilih jenis kelamin Anda!";
} else if (strlen(trim($gender)) == 0){
  $Err[1]="Tidak boleh hanya spasi!";
}

if(empty($bornday)){
  $Err[2]="Tidak boleh kosong!";
} else if (strtotime($bornday) > time()) {
  $Err[2]="Mohon isi data dengan benar!";
} else if (!preg_match("/^(0[1-9]|[1-2][0-9]|3[0-1])-(0[1-9]|1[0-2])-[0-9]{4}$/",$bornday)){
  $Err[2]="Format tanggal tidak benar!";
} else if (strlen(trim($bornday)) == 0){
  $Err[2]="Tidak boleh hanya spasi!";
}

if(empty($pendidikan)){
  $Err[3]="Tidak boleh kosong!";
} else if(strlen($pendidikan) > 225){
  $Err[3]="Pendidikan terlalu panjang!";
} else if (strlen(trim($pendidikan)) == 0){
  $Err[3]="Tidak boleh hanya spasi!";
}

if(empty($provinsi)){
  $Err[4]="Mohon pilih provinsi Anda tinggal!";
} else if(strlen($provinsi) > 11 || strlen(trim($provinsi)) == 0){
  $Err[4]="Data tidak valid!";
} else if ($provinsi == 0){
  $Err[4]="Mohon pilih provinsi Anda tinggal!";
}

if(empty($kota)){
  $Err[5]="Mohon pilih kota Anda tinggal!";
} else if(strlen($kota) > 11 || strlen(trim($kota)) == 0){
  $Err[5]="Data tidak valid!";
} else if ($kota == 0){
  $Err[5]="Mohon pilih kota Anda tinggal!";
}

if(empty($kecamatan)){
  $Err[6]="Mohon pilih kecamatan Anda tinggal!";
} else if(strlen($kecamatan) > 11 || strlen(trim($kecamatan)) == 0){
  $Err[6]="Data tidak valid!";
} else if ($kecamatan == 0){
  $Err[6]="Mohon pilih kecamatan Anda tinggal!";
}

if(empty($kelurahan)){
  $Err[7]="Mohon pilih kelurahan Anda tinggal!";
} else if(strlen($kelurahan) > 11 || strlen(trim($kelurahan)) == 0){
  $Err[7]="Data tidak valid!";
} else if ($kelurahan == 0){
  $Err[7]="Mohon pilih kelurahan Anda tinggal!";
}

if(empty($alamat)){
  $Err[8]="Tidak boleh kosong!";
} else if(strlen($alamat) > 500){
  $Err[8]="Pendidikan terlalu panjang!";
} else if (strlen(trim($alamat)) == 0){
  $Err[8]="Tidak boleh hanya spasi!";
}

if(empty($username)){
  $Err[10]="Tidak boleh kosong!";
} else if (strlen($username) < 6) {
  $Err[10]="username harus lebih dari 6 karakter!";
} else if(strlen($username) > 20){
  $Err[10]="username harus kurang dari 20 karakter!";
} else if (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
  $Err[10]="Spesial karakter tidak diperbolehkan!";
} else if ($row_username > 0) {
  $Err[10]="Username ini sudah terdaftar!";
}

if (empty($password)) {
  $Err[11]="Tidak boleh kosong!";
} else if (strlen($password) < 6) {
  $Err[11]="password harus lebih dari 6 karakter!";
} else if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
  $Err[11]="Spesial karakter tidak diperbolehkan!";
}

if (empty($repassword)) {
  $Err[12]="Tidak boleh kosong!";
} else if ($repassword != $password){
  $Err[12]="password tidak sama!";
}

if (empty($email)) {
  $Err[9]="Tidak boleh kosong!";
} else if (strlen($email) > 254) {
  $Err[9] = "tidak boleh lebih dari 254 karakter!";
} else if (!validEmail($email)) {
  $Err[9] = "Masukkan email yang valid!";
} else if ($row_email > 0) {
  $Err[9] = "Email ini sudah terdaftar!";
}

function validEmail($email){
  // First, we check that there's one @ symbol, and that the lengths are right
  if (!preg_match("/^[^@]{1,64}@[^@]{1,255}$/", $email)) {
    // Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if (!preg_match("/^(([A-Za-z0-9!#$%&'*+\/=?^_`{|}~-][A-Za-z0-9!#$%&'*+\/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$/", $local_array[$i])) {
      return false;
    }
  }
  if (!preg_match("/^\[?[0-9\.]+\]?$/", $email_array[1])) { // Check if domain is IP. If not, it should be valid domain name
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
      return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if (!preg_match("/^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$/", $domain_array[$i])) {
        return false;
      }
    }
  }
    return true;
}

  echo json_encode($Err);
?>
