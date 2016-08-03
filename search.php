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
	<?php
		$title = "Search";
		if (isset($_GET['search'])) {
			$title .= " \"".$_GET['search']."\"";
		} else {
			$title .= " \"\"";
		}
		if (isset($_GET['page'])) {
			$title .= " Page ".$_GET['page'];
		} else {
			$title .= " Page 1";
		}
	?>
	<title><?php echo $title;?> | Download Soal IPS SMP</title>
	<?php include('add/css-js-icon.php'); ?>
</head><!--/head-->
<body>
	<div id="fb-root"></div>

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
					<?php
						$searchValue = (isset($_GET['search'])) ? $_GET['search'] : "";
					?>
					<li><input type='search' class='form-control visible-xs' placeholder='Search' value="<?=$searchValue?>"></li>
					<li ><a href="/">Home</a></li>
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
			<div class='container'>
				<div class='row'>
					<div class='col-sm-6'>
						<h1>Search</h1>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada</p>
					</div>
					<div class='col-sm-6'>
						<ul class='breadcrumb pull-right'>
							<li><a href='/'>Home</a></li>
							<li class='active'>Search</li>
						</ul>
					</div>
				</div>
			</div>
	</section><!--/#title-->

	<section id="blog" class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php


					$maxItemShownPerPage = 5;
					$maxPageNumberShownPerPage = 5;
					$halfOfMaxPageNumberShownPerPage = floor($maxPageNumberShownPerPage/2);
					$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
					$itemStart = $maxItemShownPerPage * ($page - 1);

					$search = (isset($_GET['search'])) ? $_GET['search'] : "";
					$explodedSearch = explode(' ', $search);
					$textQuerySearch = "nama LIKE '%".$explodedSearch[0]."%' OR status LIKE '%".$explodedSearch[0]."%' OR category LIKE '%".$explodedSearch[0]."%' OR deskripsi LIKE '%".$explodedSearch[0]."%' OR tags LIKE '%".$explodedSearch[0]."%'";
					for ($i=1; $i < count($explodedSearch); $i++) {
						$textQuerySearch .= " OR nama LIKE '%".$explodedSearch[$i]."%' OR status LIKE '%".$explodedSearch[$i]."%' OR category LIKE '%".$explodedSearch[$i]."%' OR deskripsi LIKE '%".$explodedSearch[$i]."%' OR tags LIKE '%".$explodedSearch[$i]."%'";
					}

					$query_soal = mysqli_query($link, "SELECT * FROM soal WHERE ".$textQuerySearch." LIMIT $itemStart,$maxItemShownPerPage");

					while($data_soal = mysqli_fetch_array($query_soal)){
						switch ($data_soal['category']) {
							case "kelas-7":$category="Kelas 7";break;
							case "kelas-8":$category="Kelas 8";break;
							case "kelas-9":$category="Kelas 9";break;
							case "osn":$category="Olimpiade Sains Nasional";break;
							case "silabus-rpp":$category="SILABUS - RPP";break;
							case "ppt":$category="Power Point File";break;
							default:$category="-";break;
						}

						$date = new DateTime($data_soal['tanggal']);

						$tags = explode(',', $data_soal['tags']);
						echo "
							<div class='blog'>
								<div class='blog-item'>
									<div class='blog-content'>
										<a href='/soal-dan-materi/".$data_soal['category']."/1/".$data_soal['no']."-".$data_soal['nama']."/'><h3>".$data_soal['nama']."</h3></a>
										<div class='entry-meta'>
											<span><i class='icon-user'></i> Admin</span>
											<span><i class='icon-folder-close'></i> <a href='/soal-dan-materi/".$data_soal['category']."/1/'>".$category."</a></span>
											<span><i class='icon-calendar'></i> ".$date->format('M jS, Y')."</span>
										</div>
									</div>
									<div class='blog-short-description col-lg-12'>
										".$data_soal['deskripsi'];

						if(isset($_SESSION['username']) || $data_soal['status'] == 'sample'){
							echo "
										Download source : <a class='err' href='/download/".sha1($data_soal['no'])."/'>".after_last('/',$data_soal['alamat_file'])."</a>
							";
						} else {
							echo "
										Download source : <a class='err' href='' data-toggle='modal' data-target='#not-login'>".after_last('/',$data_soal['alamat_file'])."</a>
							";
						}

						echo "
									</div>
									<div class='col-lg-12'>
										<a class='btn btn-default' href='/soal-dan-materi/".$data_soal['category']."/1/".$data_soal['no']."-".$data_soal['nama']."/'>Read More <i class='icon-angle-right'></i></a>
									</div>
									<div class='blog-content col-md-12 col-sm-12'>
										<hr>
										<div class='tags'>
											<i class='icon-tags'></i> Tags
						";

						for ($i=0; $i < count($tags); $i++) {
							if(!empty($tags[$i])){
								echo "
									<a href='/search/".$tags[$i]."/1/' class='btn btn-xs btn-primary'>".$tags[$i]."</a>
								";
							}
						}

						echo "
										</div>
									</div><!--/.blog-item-->
								</div>
						";

					}


					$query_soal = mysqli_query($link, "SELECT * FROM soal WHERE ".$textQuerySearch."");
					$totalPages = ceil(mysqli_num_rows($query_soal) / $maxItemShownPerPage);
					$totalitems = mysqli_num_rows($query_soal);

					echo getPaginationString($page, $totalitems, $maxItemShownPerPage, 2, "/", "?page=");

					//function to return the pagination string
					function getPaginationString($page = 1, $totalitems, $limit = 15, $adjacents = 1, $targetpage = "/", $pagestring = "?page=")
					{
						//tambahan
						$paginatingSearch = (isset($_GET['search'])) ? $_GET['search']."/" : "";

						//defaults
						if(!$adjacents) $adjacents = 1;
						if(!$limit) $limit = 15;
						if(!$page) $page = 1;
						if(!$targetpage) $targetpage = "/";

						//other vars
						$prev = $page - 1;									//previous page is page - 1
						$next = $page + 1;									//next page is page + 1
						$lastpage = ceil($totalitems / $limit);				//lastpage is = total items / items per page, rounded up.
						$lpm1 = $lastpage - 1;								//last page minus 1

						/*
							Now we apply our rules and draw the pagination object.
							We're actually saving the code to a variable in case we want to draw it more than once.
						*/
						$pagination = "";
						if($lastpage > 1)
						{
							$pagination .= "<ul class='pagination pagination-lg'>";

							//previous button
							if ($page > 1)
								$pagination .= "<li><a href='/search/".$paginatingSearch."".$prev."/'><i class='icon-angle-left'></i></a></li>";
							else
								$pagination .= "";

							//pages
							if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
							{
								for ($counter = 1; $counter <= $lastpage; $counter++)
								{
									if ($counter == $page)
										$pagination .= "<li class='active'><a class='disabled' href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
									else
										$pagination .= "<li><a href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
								}
							}
							elseif($lastpage >= 7 + ($adjacents * 2))	//enough pages to hide some
							{
								//close to beginning; only hide later pages
								if($page < 1 + ($adjacents * 3))
								{
									for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
									{
										if ($counter == $page)
											$pagination .= "<li class='active'><a class='disabled' href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
										else
											$pagination .= "<li><a href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
									}
									$pagination .= "<li><a class='disabled' href=''>...</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."".$lpm1."/'>$lpm1</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."".$lastpage."/'>$lastpage</a></li>";
								}
								//in middle; hide some front and some back
								elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
								{
									$pagination .= "<li><a href='/search/".$paginatingSearch."1/'>1</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."2/'>2</a></li>";
									$pagination .= "<li><a class='disabled' href=''>...</a></li>";
									for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
									{
										if ($counter == $page)
											$pagination .= "<li class='active'><a class='disabled' href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
										else
											$pagination .= "<li><a href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
									}
									$pagination .= "<li><a class='disabled' href=''>...</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."".$lpm1."/'>$lpm1</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."".$lastpage."/'>$lastpage</a></li>";
								}
								//close to end; only hide early pages
								else
								{
									$pagination .= "<li><a href='/search/".$paginatingSearch."1/'>1</a></li>";
									$pagination .= "<li><a href='/search/".$paginatingSearch."2/'>2</a></li>";
									$pagination .= "<li><a class='disabled' href=''>...</a></li>";
									for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++)
									{
										if ($counter == $page)
											$pagination .= "<li class='active'><a class='disabled' href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
										else
											$pagination .= "<li><a href='/search/".$paginatingSearch."".$counter."/'>$counter</a></li>";
									}
								}
							}

							//next button
							if ($page < $counter - 1)
								$pagination .= "<li><a href='/search/".$paginatingSearch."".$next."/'><i class='icon-angle-right'></i></a></li>";
							else
								$pagination .= "";
							$pagination .= "</ul>";
						}

						return $pagination;

					}


						function after ($this, $inthat)
						{
							if (!is_bool(strpos($inthat, $this)))
							return substr($inthat, strpos($inthat,$this)+strlen($this));
						};

						function after_last ($this, $inthat)
						{
							if (!is_bool(strrevpos($inthat, $this)))
							return substr($inthat, strrevpos($inthat, $this)+strlen($this));
						};

						function before ($this, $inthat)
						{
							return substr($inthat, 0, strpos($inthat, $this));
						};

						function before_last ($this, $inthat)
						{
							return substr($inthat, 0, strrevpos($inthat, $this));
						};

						function between ($this, $that, $inthat)
						{
							return before ($that, after($this, $inthat));
						};

						function between_last ($this, $that, $inthat)
						{
						 return after_last($this, before_last($that, $inthat));
						};
						// use strrevpos function in case your php version does not include it
						function strrevpos($instr, $needle)
						{
						  $rev_pos = strpos (strrev($instr), strrev($needle));
						  if ($rev_pos===false) return false;
						  else return strlen($instr) - $rev_pos - strlen($needle);
						};
				?>
			</div><!--/.col-md-8-->
		</div><!--/.row-->
	</section><!--/#blog-->

	<?php
	include('add/bottom.php');
	if(isset($_SESSION['username'])){
		include ("modal/modal-change-password.php");
	} else {
		include('modal/not-login-modal.php');
	}
	?>

</body>
</html>

	<script>
		$('.blog-short-description').condense({ellipsis:'&hellip;', condensedLength: 700});
	</script>
