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
		if(!isset($_GET['category'])){
			$_GET['category'] = "";
		}
		switch ($_GET['category']) {
			case "kelas-7":$category="Kelas 7";break;
			case "kelas-8":$category="Kelas 8";break;
			case "kelas-9":$category="Kelas 9";break;
			case "osn":$category="Olimpiade Sains Nasional";break;
			case "silabus-rpp":$category="SILABUS - RPP";break;
			case "ppt":$category="Power Point File";break;
			case "sample":$category="Free Sample";break;
			default:$category="-";break;
		}
		$title = $category;
		if(isset($_GET['page'])){
			$title .= " Page ".$_GET['page'];
		} else {
			$title .= " Page 1";
		}
		echo "
			<title>".$title." | Download Soal IPS SMP</title>
		";
	?>
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
					<li ><a href="/">Home</a></li>
					<li class="dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Soal dan Materi <i class="icon-angle-down"></i></a>
						<ul class="dropdown-menu">
						<?php
						echo "
							<li class=' ".activeLi('kelas-7')."'><a href='/soal-dan-materi/kelas-7/1/' >Kelas 7</a></li>
							<li class=' ".activeLi('kelas-8')."'><a href='/soal-dan-materi/kelas-8/1/' >Kelas 8</a></li>
							<li class=' ".activeLi('kelas-9')."'><a href='/soal-dan-materi/kelas-9/1/' >Kelas 9</a></li>
							<li class=' ".activeLi('osn')."'><a href='/soal-dan-materi/osn/1/' >OSN</a></li>
							<li class=' ".activeLi('silabus-rpp')."'><a href='/soal-dan-materi/silabus-rpp/1/' >Silabus/RPP</a></li>
							<li class=' ".activeLi('ppt')."'><a href='/soal-dan-materi/ppt/1/' >Power Point</a></li>
							<li class=' ".activeLi('sample')."'><a href='/soal-dan-materi/sample/1/' >Free Sample</a></li>
						";
						?>
						</ul>
					</li>
					<li><a href="/daftar-pustaka">Daftar Pustaka</a></li>
					<?php include('add/login.php'); ?>
				</ul>
			</div>
		</div>
	</header><!--/header-->

	<section id="title" class="emerald">
		<?php
		echo "
			<div class='container'>
				<div class='row'>
					<div class='col-sm-6'>
						<h1>".$category."</h1>
						<p></p>
					</div>
					<div class='col-sm-6'>
						<ul class='breadcrumb pull-right'>
							<li><a href='/index'>Home</a></li>
							<li><a href='#'>Soal dan Materi</a></li>
							<li class='active'>".$category."</li>
						</ul>
					</div>
				</div>
			</div>
		";

		?>
	</section><!--/#title-->

	<section id="portfolio" class="container">
		<?php
			include_once("db/config.inc.php");

			function activeLi($isi){
				if(isset($_GET['category'])){
					if($isi == $_GET['category'])
						return "active";
				}
			}

      function sembunyikanGambar(){
        if (isset($_SESSION['sembunyikanGambar'])) {
          return true;
        } else {
          return false;
        }
      }

			echo "
				<ul class='portfolio-filter'>
					<li><a class='btn btn-default ".activeLi('kelas-7')."' href='/soal-dan-materi/kelas-7/1/' >Kelas 7</a></li>
					<li><a class='btn btn-default ".activeLi('kelas-8')."' href='/soal-dan-materi/kelas-8/1/' >Kelas 8</a></li>
					<li><a class='btn btn-default ".activeLi('kelas-9')."' href='/soal-dan-materi/kelas-9/1/' >Kelas 9</a></li>
					<li><a class='btn btn-default ".activeLi('osn')."' href='/soal-dan-materi/osn/1/' >OSN</a></li>
					<li><a class='btn btn-default ".activeLi('silabus-rpp')."' href='/soal-dan-materi/silabus-rpp/1/' >Silabus/RPP</a></li>
					<li><a class='btn btn-default ".activeLi('ppt')."' href='/soal-dan-materi/ppt/1/' >Power Point</a></li>
					<li><a class='btn btn-default ".activeLi('sample')."' href='/soal-dan-materi/sample/1/' >Free Sample</a></li>
				</ul><!--/#portfolio-filter-->
			";

      $gambar = (sembunyikanGambar()) ? "checked" : "";
      echo '
        <div class="">
          <input id="sembunyikan-gambar" type="checkbox" '.$gambar.'> <label for="sembunyikan-gambar">Sembunyikan gambar</label>
        </div>
      ';

			$maxItemShownPerPage = 8;
			$maxPageNumberShownPerPage = 5;
			$halfOfMaxPageNumberShownPerPage = floor($maxPageNumberShownPerPage/2);
			$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
			$itemStart = $maxItemShownPerPage * ($page - 1);

			$query_item;
			if($_GET['category'] != 'sample'){
				$query_item = mysqli_query($link,"SELECT * FROM soal WHERE category = '".$_GET['category']."' ORDER BY tanggal desc LIMIT $itemStart,$maxItemShownPerPage");
			} else {
				$query_item = mysqli_query($link,"SELECT * FROM soal WHERE status = '".$_GET['category']."' ORDER BY tanggal desc LIMIT $itemStart,$maxItemShownPerPage");
			}


			$text_item = "<ul class='portfolio-items col-4'>";
			while($data_item = mysqli_fetch_array($query_item)){
				$text_item .= "
					<li class='portfolio-item'>
						<a href='http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".$data_item['no']."-".$data_item['nama']."/'>
							<div class='item-inner'>
          ";
				$text_item .= (sembunyikanGambar()) ? "" : "<img src='".$data_item['alamat_gambar']."' alt='".$data_item['nama']."'>";
				$text_item .=	"
                <h5>".$data_item['nama']."</h5>
								<div class='overlay'>
								</div>
							</div>
						</a>
					</li>
				";
			}
			$text_item .= "</ul>";
			echo $text_item;

			if($_GET['category'] != 'sample'){
				$query_item = mysqli_query($link,"SELECT * FROM soal WHERE category = '".$_GET['category']."' ORDER BY tanggal desc");
			} else {
				$query_item = mysqli_query($link,"SELECT * FROM soal WHERE status = '".$_GET['category']."' ORDER BY tanggal desc");
			}
			$totalPages = ceil(mysqli_num_rows($query_item) / $maxItemShownPerPage);
			$totalitems = mysqli_num_rows($query_item);

			echo getPaginationString($page,$totalitems,$maxItemShownPerPage,2,"/","?page=");

			function getPaginationString($page = 1, $totalitems, $limit = 15, $adjacents = 1, $targetpage = "/", $pagestring = "?page="){
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
						$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$prev."/'><i class='icon-angle-left'></i></a></li>";
					else
						$pagination .= "";

					//pages
					if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
					{
						for ($counter = 1; $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination .= "<li class='active'><a class='disabled' href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
							else
								$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
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
									$pagination .= "<li class='active'><a class='disabled' href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
								else
									$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
							}
							$pagination .= "<li><a class='disabled' href=''>...</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$lpm1."/'>$lpm1</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$lastpage."/'>$lastpage</a></li>";
						}
						//in middle; hide some front and some back
						elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
						{
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/1/'>1</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/2/'>2</a></li>";
							$pagination .= "<li><a class='disabled' href=''>...</a></li>";
							for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
							{
								if ($counter == $page)
									$pagination .= "<li class='active'><a class='disabled' href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
								else
									$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
							}
							$pagination .= "<li><a class='disabled' href=''>...</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$lpm1."/'>$lpm1</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$lastpage."/'>$lastpage</a></li>";
						}
						//close to end; only hide early pages
						else
						{
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/1/'>1</a></li>";
							$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/2/'>2</a></li>";
							$pagination .= "<li><a class='disabled' href=''>...</a></li>";
							for ($counter = $lastpage - (1 + ($adjacents * 3)); $counter <= $lastpage; $counter++)
							{
								if ($counter == $page)
									$pagination .= "<li class='active'><a class='disabled' href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
								else
									$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$counter."/'>$counter</a></li>";
							}
						}
					}

					//next button
					if ($page < $counter - 1)
						$pagination .= "<li><a href='/soal-dan-materi/".$_GET['category']."/".$next."/'><i class='icon-angle-right'></i></a></li>";
					else
						$pagination .= "";
					$pagination .= "</ul>";
				}

				return $pagination;
			}

		?>

	</section><!--/#portfolio-->

	<?php
	include('add/bottom.php');
	if(isset($_SESSION['username'])){
		include ("modal/modal-change-password.php");
	}
	?>
</body>
</html>
