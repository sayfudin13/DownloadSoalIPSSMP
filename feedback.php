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
	<title>Feedback | Download Soal IPS SMP</title>
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
					<li><a href="/daftar-pustaka">Daftar Pustaka</a></li>
					<?php include('add/login.php'); ?>
				</ul>
			</div>
		</div>
	</header><!--/header-->

	<section id="title" class="emerald">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<h1>Feedback</h1>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
				</div>
				<div class="col-sm-6">
					<ul class="breadcrumb pull-right">
						<li><a href="/">Home</a></li>
						<li class="active">Feedback</li>
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
						<h2>Kritik, Saran dan Request</h2>
					</div>
					<div class="gap">
					</div>
					<div id="comment-form">
						<?php
							$query_user = mysqli_query($link,"SELECT * FROM data WHERE username = '".$_SESSION['username']."'");
							$row_user = mysqli_num_rows($query_user);
							if($row_user == 1){
								$data_user = mysqli_fetch_array($query_user);
								echo "
									<div class='form-horizontal' role='form'>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Your username :</label>
											<div class='col-sm-10'>
												<input type='text' class='form-control' placeholder='Name' value='".$_SESSION['username']."' disabled=''>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-2 control-label'>Your email :</label>
											<div class='col-sm-10'>
												<input type='email' class='form-control' placeholder='Email' value='".$data_user['email']."' disabled=''>
											</div>
										</div>
										<div class='form-group'>
											<label class='col-sm-2 control-label'></label>
											<div class='col-sm-10'>
												<textarea id='isi-feedback' rows='8' maxlength='1000' class='form-control' placeholder='Kritik, Saran dan Request. (max 1000 characters)'></textarea>
												<span class='err' id='feedbackerr0'></span>
											</div>
										</div>
										<div class='form-group'>
											<div class='col-sm-2'>
												<label></label>
											</div>
											<div class='col-sm-10'>
												<button id='feedback-button' class='btn btn-danger btn-lg'>Send</button>
											</div>
										</div>
									</div>
								";
							}


						?>
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
