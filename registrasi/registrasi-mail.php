<?php

include_once("../db/config.inc.php");

$email = "";

if (isset($_POST['email'])) {
  $email = $_POST['email'];
}

$query = mysqli_query($link, "SELECT * FROM data where email = '$email' and status = 0");
$data = mysqli_fetch_array($query);
$row = mysqli_num_rows($query);
if ($row == 1) {

  require '../assets/PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer();
  // kofigurasi SMTP GMAIL$mail->IsSMTP(); // memilih pengiriman dengan metode SMTP
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "TLS";
  $mail->Host = "smtp.mail.yahoo.com"; // SMTP server
  $mail->Port = 465;
  $mail->Username = "mytemp.web@yahoo.com";
  $mail->Password = "tempjohan";
  $mail->From = "noreply@mytempweb.tk";
  $mail->FromName = "MyTempWeb";
  $mail->Subject = "Pendaftaran Akun";
  $body = file_get_contents('./registrasi-mail-html.DSISmail');
  // untuk mail klien yang tidak bisa baca format html
  $text_body = file_get_contents('./registrasi-mail-text.DSISmail');

  //change inner mail
  //nama
  $body = str_replace("[nama]",$data['nama'],$body);
  $text_body = str_replace("[nama]",$data['nama'],$text_body);
  //username
  $body = str_replace("[username]",$data['username'],$body);
  $text_body = str_replace("[username]",$data['username'],$text_body);
  //email
  $body = str_replace("[email]",$data['email'],$body);
  $text_body = str_replace("[email]",$data['email'],$text_body);
  //gender
  if ($data['gender'] == 1) {
    $body = str_replace("[gender]","pria",$body);
    $text_body = str_replace("[gender]","pria",$text_body);
  } else {
    $body = str_replace("[gender]","wanita",$body);
    $text_body = str_replace("[gender]","wanita",$text_body);
  }
  //pendidikan
  $body = str_replace("[pendidikan]",$data['pendidikan'],$body);
  $text_body = str_replace("[pendidikan]",$data['pendidikan'],$text_body);
  //bornday
  $body = str_replace("[bornday]",$data['bornday'],$body);
  $text_body = str_replace("[bornday]",$data['bornday'],$text_body);
  //provinsi
  $query_provinces = mysqli_query($link, "SELECT * FROM provinces where id = ".$data['province']);
  $data_provinces = mysqli_fetch_array($query_provinces);
  $body = str_replace("[provinsi]",$data_provinces['name'],$body);
  $text_body = str_replace("[provinsi]",$data_provinces['name'],$text_body);
  //kota
  $query_regencies = mysqli_query($link, "SELECT * FROM regencies where id = ".$data['regency']);
  $data_regencies = mysqli_fetch_array($query_regencies);
  $body = str_replace("[kota]",$data_regencies['name'],$body);
  $text_body = str_replace("[kota]",$data_regencies['name'],$text_body);
  //kecamatan
  $query_districs = mysqli_query($link, "SELECT * FROM districts where id = ".$data['district']);
  $data_districts = mysqli_fetch_array($query_districs);
  $body = str_replace("[kecamatan]",$data_districts['name'],$body);
  $text_body = str_replace("[kecamatan]",$data_districts['name'],$text_body);
  //kelurahan
  $query_villages = mysqli_query($link, "SELECT * FROM villages where id = ".$data['village']);
  $data_villages = mysqli_fetch_array($query_villages);
  $body = str_replace("[kelurahan]",$data_villages['name'],$body);
  $text_body = str_replace("[kelurahan]",$data_villages['name'],$text_body);
  //alamat
  $body = str_replace("[alamat]",$data['alamat'],$body);
  $text_body = str_replace("[alamat]",$data['alamat'],$text_body);

  $mail->Body = $body;
  $mail->AltBody = $text_body;
  $mail->AddAddress($data['email']);
  //attachment Foto
  // $mail->AddStringAttachment("images/potomu.jpg");
  echo $mail->Send();

}

?>
