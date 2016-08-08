<?php
	if (!isset($_GET['e'])) {
		include '../404.php';
	} else {
		include '../db/config.inc.php';
		$email = $_GET['e'];
		$query = mysqli_query($link, "SELECT * FROM data where email = '$email' and status = 0");
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
	<title>Registrasi Success | Download Soal IPS SMP</title>
	<?php include('../add/css-js-icon.php'); ?>
</head><!--/head-->
<body>
	<input id="registrasi-email" type="hidden" name="name" value="<?=$email?>">
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
					<li><a href="/daftar-pustaka">Daftar Pustaka</a></li>
          <?php include('../add/login.php'); ?>
				</ul>
			</div>
		</div>
	</header><!--/header-->

	<div id="notification" style="max-width:400px;min-width:300px;position:absolute;left:50%;margin-top:20px">
  </div>

	<section id="error" class="container">
		<h1>Register Success</h1>
		<p>Anda akan menerima email pemberitahuan selanjutnya untuk mengaktifkan akun Anda.<br>Jika Anda tidak menerima email silahkan <font color="orange">cek folder spam</font> Anda atau klik tombol dibawah untuk mengirim ulang.</p>
		<button id="registrasi-resend-button" type="button" name="button" class="btn btn-info">KIRIM ULANG</button>
    <p></p>
		<a class="btn btn-success" href="/">CLICK HERE TO BACK TO HOMEPAGE</a>
	</section><!--/#error-->

	<?php include('../add/bottom.php'); ?>
</body>
</html>

<?php
	}
}

?>
