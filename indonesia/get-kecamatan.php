<?php
  include_once("../db/config.inc.php");

  $kota=$_POST['kota'];
  $option = "";

  $query = mysqli_query($link, "SELECT * FROM districts where regency_id = '".$kota."' ORDER BY name");
  while ($data = mysqli_fetch_array($query)) {
    $option .= "<option value='".$data['id']."'>".$data['name']." </option>";
  }

  echo $option;
?>