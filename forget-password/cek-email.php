<?php
include_once("../db/config.inc.php");
$email = $_POST['email'];
$query_email = mysqli_query($link,"SELECT * FROM data WHERE email = '".$email."'");
$row_email = mysqli_num_rows($query_email);

$Err=array(0);

if (empty($email)) {
  $Err[0]="Tidak boleh kosong!";
} else if ($row_email != 1) {
  $Err[0] = "Email tidak terdaftar!";
}

  echo json_encode($Err);
?>
