<?php

include_once("../db/config.inc.php");
$username = $_POST['username'];
$changepass = $_POST['changepass'];
$query = mysqli_query($link,"SELECT * FROM data WHERE username = '$username' and changepass = '$changepass'");
$row = mysqli_num_rows($query);
if($row != 1){
  echo "-1";
} else if($row == 1){
  $newpwd = sha1($_POST['newpwd']);
  $queryChangePass = mysqli_query($link,"UPDATE data SET password = '$newpwd', changepass = 'none' WHERE username = '$username'");
  echo $queryChangePass;
}

?>
