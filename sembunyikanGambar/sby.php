<?php
session_start();
if(isset($_SESSION['sembunyikanGambar'])){
  unset($_SESSION['sembunyikanGambar']);
} else {
  $_SESSION['sembunyikanGambar'] = true;
}

 ?>
