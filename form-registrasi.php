<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Form Regristrasi | Download Soal IPS SMP</title>
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
          <h1>Form Registrasi</h1>
          <p>Daftarkan diri anda untuk mendapatkan akun </p>
        </div>
        <div class="col-sm-6">
          <ul class="breadcrumb pull-right">
            <li class="active">Form Registrasi</li>
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
            <h2>Form Registrasi</h2>
          </div>
          <div class="gap">
          </div>
          <div id="comment-form">
            <div class='form-horizontal' role='form'>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Nama Lengkap <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <input id="register-nama" type='text' class='form-control' placeholder='Nama Lengkap' name="nama" maxlength="225" value="">
                  <span class='err' id='registererr0'></span>
                  <i class="help-block">Isi nama lengkap Anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Jenis Kelamin <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <select class="form-control" id="register-gender" name="gender">
                    <option value="0">Pilih : </option>
                    <option value="1">Pria</option>
                    <option value="2">Wanita</option>
                  </select>
                  <span class='err' id='registererr1'></span>
                  <i class="help-block">Jenis kelamin Anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Tanggal Lahir <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' id="register-tanggal-lahir" placeholder="DD-MM-YYYY" name="tanggal_lahir" />
                  <span class='err' id='registererr2'></span>
                  <i class="help-block">Tanggal lahir Anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Pendidikan Terakhir <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <input id="register-pendidikan" type='text' class='form-control' placeholder='Pendidikan Terakhir' name="pendidikan" value="">
                  <span class='err' id='registererr3'></span>
                  <i class="help-block">Pendidikan terakhir Anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Provinsi <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <select class="form-control" id="register-provinsi" name="provinsi">
                    <option value="0">Pilih : </option>

                    <?php
                      include_once("db/config.inc.php");
                      $query_provinces = mysqli_query($link,"SELECT * FROM provinces");
                      while ($data_provinces = mysqli_fetch_array($query_provinces)) {
                        echo "<option value='".$data_provinces['id']."'>".$data_provinces['name']." </option>";
                      }
                    ?>

                  </select>
                  <span class='err' id='registererr4'></span>
                  <i class="help-block">Provinsi.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Kota <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <select class="form-control" id="register-kota" name="kota">
                    <option value="0">Pilih : </option>
                  </select>
                  <span class='err' id='registererr5'></span>
                  <i class="help-block">Kota.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Kecamatan <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <select class="form-control" id="register-kecamatan" name="kecamatan">
                    <option value="0">Pilih : </option>
                  </select>
                  <span class='err' id='registererr6'></span>
                  <i class="help-block">Kecamatan.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Kelurahan <font color="darkred">*</font> :</label>
                <div class='col-sm-4'>
                  <select class="form-control" id="register-kelurahan" name="kelurahan">
                    <option value="0">Pilih : </option>
                  </select>
                  <span class='err' id='registererr7'></span>
                  <i class="help-block">Kelurahan.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Alamat <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <textarea id="register-alamat" rows='3' maxlength='300' class='form-control' placeholder="Alamat"></textarea>
                  <span class='err' id='registererr8'></span>
                  <i class="help-block">Alamat Anda.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Email <font color="darkred">*</font> : </label>
                <div class='col-sm-10'>
                  <input id="register-email" type='email' class='form-control' placeholder='Email' name="email" maxlength="254">
                  <span class='err' id='registererr9'></span>
                  <i class="help-block">Masukkan email yang aktif karena anda akan menerima pemberitahuan selanjutnya melalui email.</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Pilih username <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <input id="register-username" type='text' class='form-control' placeholder='Username' name="username">
                  <span class='err' id='registererr10'></span>
                  <i class="help-block">Masukkan username yang Anda inginkan. (username terdiri dari 6-20 karakter. Hanya huruf dan angka yang diperbolehkan.)</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Pilih password <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <input id="register-password" type='password' class='form-control' placeholder='Password' name="password">
                  <span class='err' id='registererr11'></span>
                  <i class="help-block">Masukkan password anda. (password minimal terdiri dari 6 karakter. Hanya huruf dan angka yang diperbolehkan.)</i>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Konfirmasi Password <font color="darkred">*</font> :</label>
                <div class='col-sm-10'>
                  <input id="register-repassword" type='password' class='form-control' placeholder='Konfirmasi Password' name="repassword">
                  <span class='err' id='registererr12'></span>
                  <i class="help-block">Masukkan kembali password anda.</i>
                </div>
              </div>

              <div class='form-group'>
                <label class='col-sm-2 control-label'></label>
                <div class='col-sm-10'>
                  <button id="register-button" class='btn btn-danger btn-lg'>Register</button>
                </div>
              </div>
            </div>
          </div><!--/#comment-form-->
        </div>
      </div>
    </div>
  </section>


  <?php
    include('add/bottom.php');
    if(isset($_SESSION['username'])){
      include ("modal/modal-change-password.php");
    }
  ?>
  <script type="text/javascript">
    //datepicker
  $('#register-tanggal-lahir').datetimepicker({
    yearOffset:0,
    lang:'it',
    timepicker:false,
    format:'d-m-Y',
    formatDate:'Y/m/d',
    maxDate:0
  });
  $.datetimepicker.setLocale('id');
  </script>

</body>
</html>
