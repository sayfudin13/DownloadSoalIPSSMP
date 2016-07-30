<?php
  include_once("../db/config.inc.php");

  $kecamatan=$_POST['kecamatan'];
  $option = "";

  $query = mysqli_query($link, "SELECT * FROM villages where district_id = '".$kecamatan."' ORDER BY name");
  while ($data = mysqli_fetch_array($query)) {
    $option .= "<option value='".$data['id']."'>".$data['name']." </option>";
  }

  echo $option;
?>