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
	<title>Home | Download Soal IPS SMP</title>
	<?php include('add/css-js-icon.php'); ?>

</head><!--/head-->
<body>
	<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
		<div class="container">
			<div class="navbar-header">
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">DownloadSoalIPSSMP<span style="color:lightblue;">.com</span></a>
			</div>
			<div class='collapse navbar-collapse'>
				<ul class="nav navbar-nav navbar-right">
					<li><input type='search' class='form-control input-search visible-xs' placeholder='Search'></li>
					<li class="active"><a href="/">Home</a></li>
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
	<section id="main-slider" class="no-margin">
		<div class="carousel slide wet-asphalt">
			<ol class="carousel-indicators">
				<li data-target="#main-slider" data-slide-to="0" class="active"></li>
				<li data-target="#main-slider" data-slide-to="1"></li>
				<li data-target="#main-slider" data-slide-to="2"></li>
				<li data-target="#main-slider" data-slide-to="3"></li>
				<li data-target="#main-slider" data-slide-to="4"></li>
				<li data-target="#main-slider" data-slide-to="5"></li>
			</ol>
			<div class="carousel-inner">
				<div class="item active" style="background-image: url(images/slider/kelas-7.png)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">SOAL DAN MATERI KELAS 7</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/kelas-7/1/">Lihat Soal</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
				<div class="item" style="background-image: url(images/slider/kelas-8.png)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">SOAL DAN MATERI KELAS 8</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/kelas-8/1/">Lihat Soal</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
				<div class="item" style="background-image: url(images/slider/kelas-9.png)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">SOAL DAN MATERI KELAS 9</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/kelas-9/1/">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
				<div class="item" style="background-image: url(images/slider/osn.jpg)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">OLIMPIADE SISWA NASIONAL</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/osn/1/">Lihat Soal</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
				<div class="item" style="background-image: url(images/slider/silabus-rpp.png)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">SILABUS - RPP</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/silabus-rpp/1/">Lihat Soal</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
				<div class="item" style="background-image: url(images/slider/ppt.png)">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="carousel-content centered">
									<h2 class="boxed animation animated-item-1">POWER POINT FILE</h2>
									<br>
									<p class="boxed animation animated-item-2">Pellentesque habitant morbi tristique senectus et netus et malesuada fames</p>
									<br>
									<a class="btn btn-md animation animated-item-3" href="/soal-dan-materi/ppt/1/">Learn More</a>
								</div>
							</div>
						</div>
					</div>
				</div><!--/.item-->
			</div><!--/.carousel-inner-->
		</div><!--/.carousel-->
		<a class="prev hidden-xs" href="#main-slider" data-slide="prev">
			<i class="icon-angle-left"></i>
		</a>
		<a class="next hidden-xs" href="#main-slider" data-slide="next">
			<i class="icon-angle-right"></i>
		</a>
	</section><!--/#main-slider-->

	<section id="services" class="emerald">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="media">
						<div class="media-body">
							<h3 class="center media-heading">Welcome to Download Soal IPS SMP</h3>
							<div class="gap"></div>
							<p class="paragraph">Proin semper sapien eu vehicula hendrerit. Maecenas a iaculis magna, ultricies aliquet tellus. Praesent ac massa at justo porttitor ultricies ullamcorper et sapien. Vivamus at diam at justo condimentum sagittis ac ac eros. In rhoncus sapien elit, et consequat neque vulputate vitae. Suspendisse sit amet consectetur tellus. Suspendisse vel lectus tellus.</p>
							<p class="paragraph">Cras condimentum vel augue sit amet sagittis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin fringilla malesuada tellus vel scelerisque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ut fermentum quam, in scelerisque dui. Vivamus dui leo, ornare ac semper nec, convallis id nulla. Duis viverra risus ut orci suscipit semper. Pellentesque at rutrum nunc, sed auctor orci. Vivamus vitae congue odio, ut suscipit mauris. Donec sed rutrum diam. </p>
							<p class="paragraph">Curabitur ac pharetra ligula. Aenean ullamcorper metus et erat rhoncus, in fringilla massa consectetur. In egestas lectus eros, nec congue odio sollicitudin quis. Donec nec lorem a metus viverra consequat sed at lectus. Mauris auctor nec erat nec vulputate. Pellentesque finibus, odio et fringilla scelerisque, est tellus tempus lorem, sed efficitur nisi magna id enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
							<p class="paragraph">Donec nec tempus urna, et convallis turpis. Duis hendrerit lacus sed sapien ultricies blandit ac eget sem. Duis convallis blandit ex, eget vestibulum risus maximus facilisis. In porta eros eu tortor condimentum consequat. Maecenas porttitor volutpat dui, non tristique massa ornare ut. Integer dignissim, odio ut bibendum scelerisque, erat erat convallis quam, laoreet vestibulum ipsum nisi ut magna. Vivamus neque lacus, congue vitae elit sit amet, dapibus aliquet nisl.</p>
							<p class="paragraph">Sed placerat ipsum ut porttitor tincidunt. Ut scelerisque et nisi quis feugiat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nullam vestibulum nec tortor ut maximus. Nam eleifend magna urna, vitae finibus turpis ultricies vitae. In sit amet luctus velit. Praesent sagittis quam ut finibus fringilla. Sed vel leo risus. Etiam libero augue, consequat a molestie ut, dignissim tincidunt augue. Phasellus nisi metus, aliquam vel fringilla fringilla, elementum quis tellus. Pellentesque pharetra tempor tellus, eu porta enim convallis id. Integer gravida, ex a cursus pretium, mauris justo interdum eros, et aliquet dui sem sed odio. Morbi finibus sodales sapien sit amet auctor. Nulla nec neque efficitur, gravida mi quis, dictum odio. </p>
						</div>
					</div>
				</div><!--/.col-md-4-->
			</div>
		</div>
	</section><!--/#services-->

	<section id="recent-works">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<h3>Contoh Soal</h3>
					<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
					<a class="btn btn-danger" href="/soal-dan-materi/sample/1/">See all sample</a>
					<p class="gap"></p>
				</div>
				<div class="col-md-9">
					<div id="scroller" class="carousel slide">
						<div class="carousel-inner">
							<?php
								$query_sample = mysqli_query($link,"SELECT * FROM soal WHERE status = 'sample' LIMIT 0,3");
								$counter = 0;
								echo "
									<div class='item active'>
										<div class='row'>
											<ul class='portfolio-items col-3'>
								";
								while($data_sample = mysqli_fetch_array($query_sample)){
									echo "
														<li class='portfolio-item'>
															<a href='/soal-dan-materi/".$data_sample['category']."/1/".$data_sample['no']."-".$data_sample['nama']."/'>
																<div class='item-inner'>
																	<img src='".$data_sample['alamat_gambar']."' alt='".$data_sample['nama']."'>
																	<h5>".$data_sample['nama']."</h5>
																	<div class='overlay'>
																	</div>
																</div>
															</a>
														</li>
									";
								}
								echo "
													</ul>
												</div><!-- row -->
											</div><!-- item -->
								";

							?>


						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
	</section><!--/#recent-works-->



	<?php
	include('add/bottom.php');
	if(isset($_SESSION['username'])){
		include ("modal/modal-change-password.php");
	}
	?>

</body>
</html>
