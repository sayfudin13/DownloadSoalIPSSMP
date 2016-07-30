<?php
  include_once("../db/config.inc.php");

  $provinsi=$_POST['provinsi'];
  $option = "";

  $query = mysqli_query($link, "SELECT * FROM regencies where province_id = '".$provinsi."' ORDER BY name");
  while ($data = mysqli_fetch_array($query)) {
    $option .= "<option value='".$data['id']."'>".$data['name']." </option>";
  }

  echo $option;
?>