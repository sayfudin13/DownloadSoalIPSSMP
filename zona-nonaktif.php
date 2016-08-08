<?php
include("db/config.inc.php");
session_start();
if (isset($_SESSION['username'])) {
  header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Zona Nonaktif | Download Soal IPS SMP</title>
  <?php include('add/css-js-icon.php'); ?>
</head><!--/head-->
<body>
  <header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">DownloadSoalIPSSMP<span style="color:lightblue;">.com</span></a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><input type='search' class='form-control input-search visible-xs' placeholder='Search'></li>
          <li><a href="/">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Soal dan Materi <i class="icon-angle-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="/soal-dan-materi/kelas-7/1/">Kelas 7</a></li>
              <li><a href="/soal-dan-materi/kelas-8/1/">Kelas 8</a></li>
              <li><a href="/soal-dan-materi/kelas-9/1/">Kelas 9</a></li>
              <li><a href="/soal-dan-materi/osn/1/">OLIMPIADE SISWA NASIONAL</a></li>
              <li><a href="/soal-dan-materi/silabus-rpp/1/">SILABUS - RPP</a></li>
              <li><a href="/soal-dan-materi/ppt/1/">Power Point File</a></li>
              <li><a href='/soal-dan-materi/sample/1/' >Free Sample</a></li>
            </ul>
          </li>
          <li><a href="#">Daftar Pustaka</a></li>
          <?php include('add/login.php'); ?>
        </ul>
      </div>
    </div>
  </header><!--/header-->

  <section id="title" class="emerald">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1>Zona Nonaktif</h1>
          <p>Akun yang tidak aktif akan dialihkan ke halaman ini</p>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb pull-right">
            <li class="active">Zona nonaktif</li>
          </ul>
        </div>
      </div>
    </div>
  </section><!--/#title-->

  <section class="container">
    <p>Halo Bapak/Ibu,</p>
    <p>Anda dialihkan kehalaman ini karena akun Anda sedang dalam status tidak aktif.</p>
    <p>Ada beberapa kemungkinan akun Anda dalam kondisi ini, yaitu:</p>
    <ul>
      <li>Anda belum memberikan bukti pembayaran kepada kami sehingga akun Anda tidak kami aktifkan.</li>
      <li>Kami belum sempat mengaktifkan akun Anda karena kami harus mengkonfirmasi bukti pembayaran yang Anda berikan.</li>
      <li>Akun Anda kami nonaktifkan karena alasan tertentu.</li>
    </ul>
    <p>Kami mohon maaf atas ketidaknyamanan ini.</p>
    <p>Untuk pertanyaan lebih lanjut silahkan beritahu kami melalui email : <font color="orange">support@downloadsoalipssmp.com</font></p>
  </section><!--/#terms-->


  <?php
  include('add/bottom.php');
  if(isset($_SESSION['username'])){
    include ("modal/modal-change-password.php");
  }
  ?>
</body>
</html>
