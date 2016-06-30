<?php
   include_once("../db/config.inc.php");
   session_start();
   $newpwd = sha1($_POST['newpwd']);
   $q = "UPDATE data SET password = '$newpwd' WHERE username = '".$_SESSION['username']."'";
   $res = mysqli_query($link,$q);
   echo $res;
?>
