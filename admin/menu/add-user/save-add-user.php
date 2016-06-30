<?php
   include_once("../../db/config.inc.php");
  $username=$_POST['username'];
  $password=sha1($_POST['username']);
   $q = "INSERT INTO `data` (`username`, `password`) VALUES ('$username', '$password')";
   $res = mysqli_query($link,$q);
   echo $res;
?>
