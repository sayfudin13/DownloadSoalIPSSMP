<?php

  session_start();

  $value = $_POST['value'];

  switch ($value) {
    case 1:
      $_SESSION['showSoalMateri'] = "";
      break;
    case 2:
      $_SESSION['showSoalMateri'] = "soal";
      break;
    case 3:
      $_SESSION['showSoalMateri'] = "materi";
      break;
  }

?>
