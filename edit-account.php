<?php
	if (!isset($_GET['h'])) {
		include("404.php");
	} else {
		include_once("db/config.inc.php");
		$query_user = mysqli_query($link,"SELECT * FROM data WHERE username = '".$_GET['h']."' and status = '0'");
		$row_user = mysqli_num_rows($query_user);
		if($row_user != 1){
			include("404.php");
		} else {
			session_start();
			$data_user = mysqli_fetch_array($query_user);
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Edit Account | Download Soal IPS SMP</title>
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
					<h1>Edit Account</h1>
					<p>Halaman ini hanya dapat digunakan 1 kali </p>
				</div>
				<div class="col-sm-6">
					<ul class="breadcrumb pull-right">
						<li class="active">Edit Account</li>
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
						<h2>Edit Account</h2>
					</div>
					<div class="gap">
					</div>
					<div id="comment-form">
						<div class='form-horizontal' role='form'>
							<div class='form-group'>
								<label class='col-sm-2 control-label'>Username :</label>
								<div class='col-sm-10'>
									<input id="register-h" type='hidden' class='form-control' name="register-h" value="<?php echo $data_user['username'];?>">
									<input id="register-username" type='text' class='form-control' placeholder='Username' name="username" maxlength="20" value="<?php echo $data_user['username'];?>">
									<span class='err' id='registererr0'></span>
									<i class="help-block">Note: username hanya dapat diubah 1 kali. Pastikan tidak ada kesalahan dalam memasukkan username baru. (username must be 6-20 characters. letters and numbers only)</i>
								</div>
							</div>
							<div class='form-group'>
								<label class='col-sm-2 control-label'>Password :</label>
								<div class='col-sm-10'>
						      <input id="register-password" type='password' class='form-control' placeholder='Password' name="password">
									<span class='err' id='registererr1'></span>
									<i class="help-block">Masukkan password anda. (password must be more than 6 characters. letters and numbers only)</i>
								</div>
							</div>
							<div class='form-group'>
								<label class='col-sm-2 control-label'>Retype password :</label>
								<div class='col-sm-10'>
						      <input id="register-repassword" type='password' class='form-control' placeholder='Retype password' name="repassword">
									<span class='err' id='registererr2'></span>
									<i class="help-block">Masukkan kembali password anda.</i>
								</div>
							</div>
							<div class='form-group'>
								<label class='col-sm-2 control-label'>Email :</label>
								<div class='col-sm-10'>
									<input id="register-email" type='email' class='form-control' placeholder='Email' name="email" maxlength="254">
									<span class='err' id='registererr3'></span>
									<i class="help-block">Email akan digunakan untuk konfirmasi jika ada request atau feedback yang anda berikan kepada kami.</i>
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
	
</body>
</html>
<?php
			}
		}
?>