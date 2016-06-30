<?php
	session_start();
	include('db/config.inc.php');
	if (!isset($_SESSION['usernameAdmin']) && isset($_GET['hal'])) {
		include('404.php');
	} else if (!isset($_SESSION['usernameAdmin']) && !isset($_GET['hal'])) {
		header('Location: /admin/login');
		die();
	} else {
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Download Soal IPS SMP">
	<meta name="keyword" content="">
	<link rel="shortcut icon" href="/admin/img/favicon.png">
	<?php
		$title = "";

		if(!isset($_GET['hal'])){
			$hal = null;
		} else {
			$hal = $_GET['hal'];
		}
		switch ($hal) {
			case 'new-post':
				$title .= "New post";
				break;
			case 'show-post':
				$title .= "Show post";
				if(isset($_GET['search'])){
					$title .= " / search ".$_GET['search']." by ".$_GET['searchCategory'];
				}
				$title .= " / ".$_GET['order'];
				if (isset($_GET['page'])) {
					$title .= " / page ".$_GET['page'];
				} else {
					$title .= " / page 1";
				}
				break;
			case 'add-new-user':
				$title .= "New User";
				break;
			case 'show-users':
				$title .= "Show Users";
				break;
			case 'messages':
				$title .= "Messages";
				break;
			case 'edit-post':
				$title .= "Edit post ".$_GET['noSoal'];
				break;
			default:
				$title .= "Home";
				break;
		}

		// if(isset($_GET['hal'])){
		// 	$title .= $_GET['hal'];
		// } else {
		// 	$title .= "index";
		// }
		// if(isset($_GET['noSoal'])){
		// 	$title .= " ".$_GET['noSoal'];
		// } else if(isset($_GET['order'])){
		// 	$title .= " ".$_GET['order'];
		// }
	?>
	<title><?php echo $title;?> | Admin Download Soal IPS SMP</title>

	<!-- Bootstrap CSS -->    
	<link href="/admin/css/bootstrap.min.css" rel="stylesheet">
	<!-- bootstrap theme -->
	<link href="/admin/css/bootstrap-theme.css" rel="stylesheet">
	<!--external css-->
	<!-- font icon -->
	<link href="/admin/css/elegant-icons-style.css" rel="stylesheet" />
	<link href="/admin/css/font-awesome.css" rel="stylesheet" />    
	<link href="/admin/css/font-awesome.min.css" rel="stylesheet" />    
	<!-- full calendar css-->
	<link href="/admin/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="/admin/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
	<!-- easy pie chart-->
	<link href="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
	<!-- owl carousel -->
	<link rel="stylesheet" href="/admin/css/owl.carousel.css" type="text/css">
	<link href="/admin/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
	<!-- Custom styles -->
	<link rel="stylesheet" href="/admin/css/fullcalendar.css">
	<link href="/admin/css/widgets.css" rel="stylesheet">
	<link href="/admin/css/style.css" rel="stylesheet">
	<link href="/admin/css/style-responsive.css" rel="stylesheet" />
	<link href="/admin/css/xcharts.min.css" rel=" stylesheet">	
	<link href="/admin/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
	<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<script src="js/lte-ie7.js"></script>
	<![endif]-->
	</head>

	<body>

	<!-- container section start -->
	<section id="container" class="">
	 
		
		<header class="header dark-bg">
			<div class="toggle-nav">
				<div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
			</div>

			<!--logo start-->
			<a href="/admin" class="logo">CREATIVE <span class="lite">Admin</span></a>
			<!--logo end-->

			<div class="top-nav notification-row">                
				<!-- notificatoin dropdown start-->
				<ul class="nav pull-right top-menu">
					<!-- user login dropdown start-->
					<li class="dropdown">
						<a data-toggle="dropdown" class="dropdown-toggle" href="#">
							<span class="profile-ava">
								<img alt="" src="">
							</span>
							<span class="username"><?php echo $_SESSION['usernameAdmin'];?></span>
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu extended logout">
							<div class="log-arrow-up"></div>
							<li>
								<a href="" data-toggle='modal' data-target='#admin-change-pass'><i class="icon_key_alt"></i> Change Password</a>
							</li>
							<li>
								<a href="/admin/logout"><i class="fa fa-sign-out"></i> Log Out</a>
							</li>
						</ul>
					</li>
					<!-- user login dropdown end -->
				</ul>
				<!-- notificatoin dropdown end-->
			</div>
		</header>      
		<!--header end-->

		<!--sidebar start-->
		<aside>
			<div id="sidebar"  class="nav-collapse ">
				<!-- sidebar menu start-->
				<ul class="sidebar-menu">       
					<li class="active">
						<a class="" href="/admin/">
							<i class="icon_house_alt"></i>
							<span>Dashboard</span>
						</a>
					</li>             
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_document_alt"></i>
							<span>Posts</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="/admin/new-post/">New Post</a></li> 
							<li><a class="" href="/admin/show-post/no asc/10/">Show Post</a></li>
						</ul>
					</li> 
					<li class="sub-menu">
						<a href="javascript:;" class="">
							<i class="icon_group"></i>
							<span>Users</span>
							<span class="menu-arrow arrow_carrot-right"></span>
						</a>
						<ul class="sub">
							<li><a class="" href="/admin/add-new-user/">Add New User</a></li> 
							<li><a class="" href="/admin/show-users/">Show Users</a></li>
						</ul>
					</li> 
					<li class="">
						<a class="" href="/admin/messages/tanggal desc/">
							<i class="icon_mail_alt"></i>
							<span id="total-unread-messages" class="pull-right badge"></span>
							<span>Messages</span>
						</a>
					</li>
				</ul>
				<!-- sidebar menu end-->
			</div>
		</aside>
		<!--sidebar end-->
		
		<!--main content start-->
		<?php

			switch ($hal) {
				case 'new-post':
					include('menu/new-post.php');
					break;
				case 'show-post':
					include('menu/show-post.php');
					break;
				case 'add-new-user':
					include('menu/add-new-user.php');
					break;
				case 'show-users':
					include('menu/show-users.php');
					break;
				case 'messages':
					include('menu/messages.php');
					break;
				case 'detail-post':
					include('menu/detail-post.php');
					break;
				case 'edit-post':
					include('menu/edit-post.php');
					break;
				default:
					include('menu/home.php');
					break;
			}
		?>
		<!--main content end-->


	</section>
	<div class='modal fade' id='admin-change-pass' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
		<div class='modal-dialog'>
			<div class='modal-content'>
				<div class='modal-header'>
					<button id="admin-close-change-pass" type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'><i class="icon_key_alt"></i> Change Password </h4>
				</div>
				<div class='modal-body'>
					<div class="row">
						<div class="col-md-12">
							<div class="form-horizontal form">
								<div id="alert-change-password" class="alert alert-success hidden">
									<strong>Success!</strong> Success change password!
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Old Password</label>
									<div class="col-sm-8">
										<input type="password" id="oldpwd" name="oldpwd" class="form-control change-password">
										<span id='err0' class="err"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">New Password</label>
									<div class="col-sm-8">
										<input type="password" id="newpwd" name="newpwd" class="form-control change-password">
										<span id='err1' class="err"></span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-4 control-label">Retype New Password</label>
									<div class="col-sm-8">
										<input type="password" id="renewpwd" name="renewpwd" class="form-control change-password">
										<span id='err2' class="err"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<span class="pull-right">
						<a id="admin-button-change-password" class="btn btn-success"><i class="fa fa-key"></i> Change Password</a>
					</span>
	      </div>
			</div>
		</div>
	</div>
	<!-- container section start -->

	<!-- javascripts -->
	<script src="/admin/js/jquery.js"></script>
	<script src="/admin/js/bootstrap.min.js"></script>
	<!-- nice scroll -->
	<script src="/admin/js/jquery.scrollTo.min.js"></script>
	<script src="/admin/js/jquery.nicescroll.js" type="text/javascript"></script>

	<!-- jquery ui -->
	<script src="/admin/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom checkbox & radio-->
	<script type="text/javascript" src="/admin/js/ga.js"></script>
	<!--custom switch-->
	<script src="/admin/js/bootstrap-switch.js"></script>
	<!--custom tagsinput-->
	<script src="/admin/js/jquery.tagsinput.js"></script>
	
	<!-- colorpicker -->
	 
	<!-- bootstrap-wysiwyg -->
	<script src="/admin/js/jquery.hotkeys.js"></script>
	<script src="/admin/js/bootstrap-wysiwyg.js"></script>
	<script src="/admin/js/bootstrap-wysiwyg-custom.js"></script>
	<!-- ck editor -->
	<script type="text/javascript" src="/admin/assets/ckeditor/ckeditor.js"></script>
	<!-- custom form component script for this page-->
	<script src="/admin/js/form-component.js"></script>
  <script src="/admin/js/gritter.js" type="text/javascript"></script>
	<!-- custome script for all page -->
	<script src="/admin/js/scripts.js"></script>


	<script src="/admin/js/myscripts.js"></script>

	<!-- condense elipsis -->
	<script type="text/javascript" src="/admin/js/jquery.condense.js"></script>
	
	
	</body>
</html>
<?php
	}
?>