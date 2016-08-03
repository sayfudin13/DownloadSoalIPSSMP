<?php
if (!isset($_GET['u']) || !isset($_GET['k'])) {
  include '../404.php';
} else {
  include "../db/config.inc.php";
  $username = $_GET['u'];
  $changepass = $_GET['k'];
  $query = mysqli_query($link, "SELECT * FROM data where username = '$username' and status = 1 and changepass = '$changepass'");
  $row = mysqli_num_rows($query);
  if($row != 1){
    include '../404.php';
  } else {
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Forget Password | Download Soal IPS SMP</title>
  <?php include('../add/css-js-icon.php'); ?>
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
          <?php include('../add/login.php'); ?>
        </ul>
      </div>
    </div>
  </header><!--/header-->

  <section id="title" class="emerald">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <h1>Forget Password</h1>
          <p>Permintaan pemulihan password</p>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb pull-right">
            <li><a href="/">Home</a></li>
            <li class="active">Forget Password</li>
          </ul>
        </div>
      </div>
    </div>
  </section><!--/#title-->

  <section id="about-us" class="container">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="center">
            <h2>Forget Password</h2>
          </div>
          <div class="gap">
          </div>
          <div id="comment-form">
            <div class='form-horizontal' role='form'>
              <input id="reset-username" type="hidden" name="username" value="<?=$username?>">
              <input id="reset-key" type="hidden" name="key" value="<?=$changepass?>">
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Password :</label>
                <div class='col-sm-10'>
                  <input type='password' id="reset-newpwd" class='form-control' placeholder='Password' value=''>
                  <span class='err' id='reseterr0'></span>
                  <i class="help-block">Masukkan password baru anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Konfirmasi password :</label>
                <div class='col-sm-10'>
                  <input type='password' id="reset-renewpwd" class='form-control' placeholder='Konfirmasi password' value=''>
                  <span class='err' id='reseterr1'></span>
                  <i class="help-block">Masukkan kembali password baru anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <div class='col-sm-2'>
                  <label></label>
                </div>
                <div class='col-sm-10'>
                  <button id='reset-button' class='btn btn-danger btn-lg'>Reset</button>
                </div>
              </div>
            </div>
          </div><!--/#comment-form-->
        </div>
      </div>
    </div>
  </section>


  <?php
  include('../add/bottom.php');
  if(isset($_SESSION['username'])){
    include ("../modal/modal-change-password.php");
  }
  ?>
</body>
</html>
<?php
  }
}
 ?>
