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
					<li><a href="/daftar-pustaka">Daftar Pustaka</a></li>
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

	<section id="services" class="emerald" style="color:black;font-weight:initial">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="media">
						<div class="media-body">
							<h3 class="center media-heading" style="color:black;">Selamat Datang di Download Soal IPS SMP</h3>
							<div class="gap"></div>
							<p class="paragraph">Salah satu peran dari seorang guru adalah guru sebagai evaluator. Di dalam deskripsi Kompetensi Profesional Guru disebutkan salah satunya guru menilai hasil dan proses belajar mengajar yang telah dilaksanakan.</p>
							<p class="paragraph">Penilaian adalah suatu proses yang dilakukan untuk mengukur dan menilai pencapaian tujuan pembelajaran serta untuk mengetahui kekuatan dan kelemahan dalam proses pembelajaran. Penilaian hasil belajar oleh pendidik terdiri atas Ulangan Harian, Ulangan Tengah Semester, Ulangan Akhir Semester, dan Ulangan Kenaikan Kelas.</p>
							<p class="paragraph">Dalam rangka proses penilaian, untuk melaksanakan penilaian tersebut guru menyusun Teknik dan Instrumen Penilaian. Penyusunan Teknik dan Instrumen perlu di lakukan sebaik-baiknya sehingga dapat mengukur kompetensi siswa dan mencapai tujuan pembelajaran. Penyusunan Instrumen juga perlu memperhatikan keterselenggaraannya. Baik diperhatikan indikator pembelajarannya, tingkat berpikirnya, tingkat kesukaran dan daya pembeda yang nantinya akan di susun ke dalam tabel konstruksi soal yang disebut dengan kisi-kisi penyusunan soal.</p>
							<p class="paragraph">Tapi dalam pelaksanaannya, terdapat banyak kendala bagi guru untuk menyusun konstruksi soal dan penilaian. Hal ini disebabkan oleh banyaknya peran dan tugas guru yang lain selain mengajar dan melakukan penilaian. Menyusun perangkat pembelajaran, mengelola kelas bagi yang bertugas sebagai wali kelas, panggilan siswa dan penanganan kasus, kepanitiaan dalan event-event sekolah yang tentunya semua ini akan menyita waktu. Belum juga ada guru yang jam mengajarnya sangat banyak (dalam pengalaman saya 40 jam) sehingga akan menjadi kendala dalam menyusun instrumen soal dan penilaian yang ideal.</p>
							<p class="paragraph">Oleh karena itu, rekan-rekan guru dan pengajar sekalian. Perkenankanlah saya untuk berbagi pengalaman dengan rekan-rekan sekalian dimana saya Guru IPS SMP telah mengajar 10 tahun di SMP dan menjadi guru privat les membagikan soal-soal IPS SMP dari Kelas VII – IX hampir berjumlah 4.300 soal yang tentunya ini dapat membantu bapak/ibu rekan-rekan sekalian dalam penyusunan instrumen penilaian dan soal-soal. Jumlah soal sebanyak 4.300 tadi juga termasuk dengan soal Olimpiade IPS SMP yang tergolong “Langka” kita temui sebanyak 6 Jilid atau sebanyak 600 soal. Soal Olimpiade IPS SMP saya dapatkan secara pribadi pada saat pengalaman saya menjadi pembimbing OSN IPS Siswa sampai kepada tingkat provinsi.</p>
							<p class="paragraph">Secara umum, Isi Website ini antara lain :</p>
              <ol>
                <li><strong>Soal IPS SMP Kelas VII s.d Kelas IX, untuk daftar soal secara lengkap dilampirkan bagian content.</strong></li>
                <li>Try Out IPS Kelas IX.</li>
                <li>Ujian Sekolah (Sebanyak 5 Paket).</li>
                <li><strong>Soal Olimpiade Siswa Nasional (Sebanyak 6 Jilid).</strong></li>
                <li>Rangkuman Materi IPS kelas VII s.d  IX, berdasarkan bahan ajar saya selama mengajar IPS SMP yang awalnya diperuntukkan untuk Rangkuman Foto Copy siswa.Silabus dan RPP IPS Kelas VII s.d IX KTSP yang merupakan hasil tulisan tangan saya sendiri (bukan yang beredar dan dapat didownload / bukan versi alam takambang), Silabus dan RPP tersebut sudah diakui bagus oleh Pengawas Sekolah.</li>
                <li><strong>Silabus dan RPP IPS Kelas VII s.d IX KTSP</strong> yang merupakan hasil tulisan tangan saya sendiri (bukan yang beredar dan dapat didownload / bukan versi alam takambang), Silabus dan RPP tersebut sudah diakui bagus oleh Pengawas Sekolah.</li>
                <li><strong>RPP IPS Kelas 8 IPS Kurikulum 2013.</strong></li>
                <li>Powerpoint untuk mengajar hampir sejumlah 100 file dari berbagai sumber.</li>
              </ol>
							<p class="paragraph"><strong>Kelebihan File-file soal yang saya sediakan adalah semuanya berbentuk Office Word dan Power Point (Slide Mengajar).</strong> Saya berharap Website ini dapat membantu bapak/ibu dan rekan-rekan guru sekalian dalam menyusun instrumen soal dan penilaian. Menjadi One Stop Show dalam menyusun soal IPS SMP. Jangan tunggu lagi untuk mendaftar.</p>
							<p class="paragraph">Beberapa sample file bapak/ibu dan rekan-rekan sekalian bisa download <a href="/soal-dan-materi/sample/1/" style="color:red;"><u>disini</u></a>.</p>
							<p class="paragraph"><strong>Untuk administrasi pendaftaran, pemeliharaan dan hosting website, serta penyegaran materi. Kami meminta kesediaan bapak/ibu dan rekan-rekan sekalian untuk menyumbangkan dana sejumlah Rp35.000,- . Bapak/Ibu dan Rekan-rekan sekalian jangan berpikir sejumlah dana yang disumbangkan. Anggap saja ini sebagai jasa saya untuk mengetik soal-soal dan <i>web maintenance</i>. Jauh lebih banyak manfaat yang akan bapak/ibu dan rekan-rekan sekalian yang didapat. Untuk teknis pendaftaran bapak/ibu dan rekan-rekan sekalian dapat lihat di bagian syarat dan ketentuan pendaftaran.</strong></p>
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
