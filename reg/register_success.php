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
	<meta http-equiv="refresh" content="3;URL='/'" />
	<title>Edit Account Success | Download Soal IPS SMP</title>
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
					<li><a href="#">Site Map</a></li>
					<?php 
						function liOpen(){
							if(isset($_POST['fail'])){
								return "open";
							}
						}

						function divCollapsed(){
							if(!isset($_POST['fail'])){
								return "collapsed";
							}
						}

						function errMsg(){
							if(isset($_POST['fail'])){
								return "<span style='color:red;'>Username or Password is incorrect!</span><br>";
							}
						}

						include_once("../db/config.inc.php");

						if(isset($_COOKIE['username'])){
							$_SESSION['username'] = $_COOKIE['username'];
						}
						if(isset($_POST['login'])){
							if(isset($_POST['username']) && isset($_POST['password'])){
								$user = $_POST['username'];
								$pwd = sha1($_POST['password']);

								$query_user = mysqli_query($link,"SELECT * FROM data WHERE username = '$user' AND password = '$pwd'");
								$data_user = mysqli_fetch_array($query_user);
								$row_user = mysqli_num_rows($query_user);

								if($row_user == 1){
									$_SESSION['username'] = $data_user['username'];
									if(isset($_POST['remember'])){
										setcookie("username",$data_user['username'],time()+(86400 * 7),"","",0);
									}
								}
								else{
									$_POST['fail'] = 333;
								}
							}
						}

						if(!isset($_SESSION['username'])){
							echo "
								
								<li class='dropdown ".liOpen()."'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>Login <i class='icon-angle-down'></i></a>
									<ul class='dropdown-menu dropdown-login'>
										<li>
											<div class='form-login'>
												<div class='login'>
													<div class='inset'>
													<!---start-main-->
														<form method='post' action='$_SERVER[REQUEST_URI]'>
															".errMsg()."
															<div>
																<span><label>Username</label></span>
																<span><input type='text' class='textbox' name='username'></span>
															</div>
															<div>
																<span><label>Password</label></span>
																<span><input type='password' class='password' name='password'></span>
															</div>
															<div>
																<span><input name='remember' type='checkbox'> Remember Me</span>
															</div>
															<div class='sign'>
																<div class='submit'>
																	<input type='submit' value='LOGIN' name='login'>
																</div>
																<span class='forget-pass'>
																	<a href='#'>Forgot Password?</a><br>
																	<a href='/how-to-get-your-account'>not have an account?</a>
																</span>
																<div class='clear'> </div>
															</div>
														</form>
													<!---//end-main-->
													</div>
												</div>
											</div>
										</li>
									</ul>
								</li>";
						}
						else
						{
							echo "
								<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>".$_SESSION['username']." <i class='icon-angle-down'></i></a>
									<ul class='dropdown-menu'>
										<li><a href='' data-toggle='modal' data-target='#changepass'>Change Password</a></li>
										<li><a href='/logout'>Logout</a></li>
									</ul>
								</li>
								";
						}
					?>
				</ul>
			</div>
		</div>
	</header><!--/header-->

	<section id="error" class="container">
		<h1>Edit Account Success</h1>
		<p>You will automaticaly be redictered in 3 seconds..</p>
		<a class="btn btn-success" href="/">CLICK HERE TO BACK TO HOMEPAGE</a>
	</section><!--/#error-->

	<?php include('../add/bottom.php'); ?>
</body>
</html>