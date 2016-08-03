<?php
include_once("db/config.inc.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>How To Get Your Account | Download Soal IPS SMP</title>
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
          <h1>Cara Mendapatkan Akun</h1>
          <p></p>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb pull-right">
            <li><a href="/">Home</a></li>
            <li class="active">Cara Mendapatkan Akun</li>
          </ul>
        </div>
      </div>
    </div>
  </section><!--/#title-->

  <section id="faqs" class="container">
    <ul class="faq unstyled">
        <li>
            <span class="number">01</span>
            <div>
                <h4>Mengisi formulir pendaftaran secara lengkap.</h4>
                <p>Klik <a href="/registrasi">Di Sini</a> untuk mendaftar. Setelah pendaftaran terkirim, kami akan mengirimkan email tentang jumlah transfer, rekening tujuan, serta petunjuk lebih lanjut. Jadi pastikan menulis alamat email dengan benar.</p>
            </div>
        </li>
        <li>
            <span class="number">02</span>
            <div>
                <h4>Mentransfer biaya sebesar Rp 50.000,-</h4>
                <p>Transfer dapat dilakukan dengan datang langsung ke bank, mentransfer lewat ATM, atau menggunakan internet banking ke salah satu rekening berikut :</p>
                <ul>
                  <li>BCA No rek. 2797006960</li>
                  <li>Another bank account ...</li>
                </ul>
            </div>
        </li>
        <li>
            <span class="number">03</span>
            <div>
                <h4>Konfirmasi Pembayaran</h4>
                <p>Kemudian konfirmasi pembayaran Anda mengirim melalui media berikut ini:</p>
                <ul>
                  <li>SMS : 0898 666 6666</li>
                  <li>E-mail : support@mytempweb.tk</li>
                  <li>Another ways ...</li>
                </ul>
            </div>
        </li>
        <li>
            <span class="number">04</span>
            <div>
                <h4>Akun Anda Aktif</h4>
                <p>Setelah konfirmasi pembayaran, USERNAME dan PASSWORD yang digunakan akan segera kami aktifkan (paling lambat dalam 24 jam setelah konfirmasi). Jadi, tuliskan alamat email dengan benar di formulir pendaftaran.</p>
            </div>
        </li>
        <li>
            <span class="number">05</span>
            <div>
                <h4>Daftar Sekarang</h4>
                <p>Untuk melakukan pendaftaran sekarang, Klik <a href="/registrasi">Di Sini.</a></p>
            </div>
        </li>
    </ul>

  </section><!--/#terms-->


  <?php
  include('add/bottom.php');
  if(isset($_SESSION['username'])){
    include ("modal/modal-change-password.php");
  }
  ?>
</body>
</html>
