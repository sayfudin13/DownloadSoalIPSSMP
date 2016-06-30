<?php
	session_start();
  unset($_SESSION['usernameAdmin']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Logout | Admin Download Soal IPS SMP">
		<meta name="author" content="Download Soal IPS SMP">
		<meta name="keyword" content="">
		<meta http-equiv="refresh" content="3;URL='/admin/login'" />
		<link rel="shortcut icon" href="img/favicon.png">

		<title>Logout | Admin Download Soal IPS SMP</title>

		<!-- Bootstrap CSS -->    
		<link href="/admin/css/bootstrap.min.css" rel="stylesheet">
		<!-- bootstrap theme -->
		<link href="/admin/css/bootstrap-theme.css" rel="stylesheet">
		<!--external css-->
		<!-- font icon -->
		<link href="/admin/css/elegant-icons-style.css" rel="stylesheet" />
		<link href="/admin/css/font-awesome.css" rel="stylesheet" />
		<!-- Custom styles -->
		<link href="/admin/css/style.css" rel="stylesheet">
		<link href="/admin/css/style-responsive.css" rel="stylesheet" />

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->
</head><!--/head-->
<body id="login-body" class="login-img3-body-logout">
		
		<div class="container">

			<form class="login-form" method="post">        
				<div class="login-wrap">
					<p class="login-img"><i class="fa fa-sign-out"></i></p>
					<div class='alert alert-info text-center'>
						<h3>You are now sign out!</h3><br/>
						You will redirect to login page. <br/>
						<a href="/admin/login">Click here</a> if you not redirected.
					</div>
				</div>
			</form>
		</div>


	</body>
</html>