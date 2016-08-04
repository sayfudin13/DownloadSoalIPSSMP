<?php

include_once("../db/config.inc.php");

$email = "";

if (isset($_POST['email'])) {
  $email = $_POST['email'];
}

$query = mysqli_query($link, "SELECT * FROM data where email = '$email' and status = 1");
$row = mysqli_num_rows($query);
if ($row == 1) {
  $queryChangePass = mysqli_query($link, "UPDATE data SET changepass = '".generateRandomString(20)."' WHERE email = '$email'");
  $query = mysqli_query($link, "SELECT * FROM data where email = '$email'");
  $data = mysqli_fetch_array($query);

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
  $mail->Subject = "Permintaan Ubah Password";
  $body = file_get_contents('./reset-password-html.DSISmail');
  // untuk mail klien yang tidak bisa baca format html
  $text_body = file_get_contents('./reset-password-text.DSISmail');

  //change inner mail
  $body = str_replace("[nama]",$data['nama'],$body);
  $text_body = str_replace("[nama]",$data['nama'],$text_body);
  $body = str_replace("[username]",$data['username'],$body);
  $text_body = str_replace("[username]",$data['username'],$text_body);
  $body = str_replace("[link]","http://".$_SERVER['HTTP_HOST']."/forget-password/reset?u=".$data['username']."&k=".$data['changepass'],$body);
  $text_body = str_replace("[link]","http://".$_SERVER['HTTP_HOST']."/forget-password/reset?u=".$data['username']."&k=".$data['changepass'],$text_body);
  $body = str_replace("[domain]","http://".$_SERVER['HTTP_HOST'],$body);
  $text_body = str_replace("[domain]","http://".$_SERVER['HTTP_HOST'],$text_body);

  $mail->Body = $body;
  $mail->AltBody = $text_body;
  $mail->AddAddress($data['email']);
  //attachment Foto
  // $mail->AddStringAttachment("images/potomu.jpg");
  echo $mail->Send();

}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>
