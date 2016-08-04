<?php
include_once("../../db/config.inc.php");

$username = $_POST['username'];

$query_before = mysqli_query($link, "SELECT * FROM data WHERE username = '$username'");
$data_before = mysqli_fetch_array($query_before);
if ($data_before['status'] == 1) {
  echo mysqli_query($link, "UPDATE data SET status = 0 WHERE username = '$username'");
} else {
  echo mysqli_query($link, "UPDATE data SET status = 1 WHERE username = '$username'");
}
?>
