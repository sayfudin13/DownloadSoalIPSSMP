<?php
   include_once("../db/config.inc.php");
   session_start();
   $newpwd = sha1($_POST['newpwd']);
   $q = "UPDATE admin SET password = '$newpwd' WHERE username = '".$_SESSION['usernameAdmin']."'";
   $res = mysqli_query($link,$q);
   echo $res;
?>
