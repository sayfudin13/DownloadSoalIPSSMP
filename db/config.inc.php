<?php
//db info
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'a-database';

// connect db
$link = mysqli_connect($host,$username,$password,$dbname) or die('Cannot connect to server');
if(isset($_COOKIE['username']) && !isset($_SESSION['username'])){
  $_SESSION['username'] = $_COOKIE['username']; 
}
?>