<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Admin Johan Gideon">
	<meta name="author" content="Johan Gideon">
	<meta name="keyword" content="">
	<link rel="shortcut icon" href="img/favicon.png">

	<title>Login | Admin Download Soal IPS SMP</title>

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

	<?php
		session_start();
		include('db/config.inc.php');

		if(isset($_POST['login'])){
			if(isset($_POST['username']) && isset($_POST['password'])){
				$user = $_POST['username'];
				$pwd = sha1($_POST['password']);
				$query_admin = mysqli_query($link,"SELECT * FROM admin WHERE username = '$user' AND password = '$pwd'");
				$data_admin = mysqli_fetch_array($query_admin);
				$row_admin = mysqli_num_rows($query_admin);

				if($row_admin == 1){
					$_SESSION['usernameAdmin'] = $data_admin['username'];
				} else {
					$_POST['fail'] = 333;
				}
			}
		}
		if (isset($_SESSION['usernameAdmin'])) {
			header('Location: /admin/index');
			die();
		}

		function errMsg(){
			if(isset($_POST['fail'])){
				return "<div class='alert alert-danger'>Username or Password is incorrect!</div>";
			}
		}
	?>
	
</head>
	
	<body id="login-body" class="login-img3-body">
		
		<div class="container">

			<form class="login-form" method="post">        
				<div class="login-wrap">
					<p class="login-img"><i class="icon_lock_alt"></i></p>
					<?php echo errMsg(); ?>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_profile"></i></span>
						<input type="text" class="form-control" placeholder="Username" name="username" autofocus>
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="icon_key_alt"></i></span>
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<label class="checkbox">
					</label>
					<button class="btn btn-primary btn-lg btn-block" name="login" type="submit">Login</button>
				</div>
			</form>
		</div>


	</body>
</html>

