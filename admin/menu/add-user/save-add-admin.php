<?php
   include_once("../../db/config.inc.php");
  $username=$_POST['username'];
  $password=sha1($_POST['password']);
  $email=$_POST['email'];
   $q = "INSERT INTO `admin` (`username`, `password`, `email`) VALUES ('$username', '$password', '$email')";
   $res = mysqli_query($link,$q);
   echo $res;
?>
