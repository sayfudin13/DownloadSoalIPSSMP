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
        echo "
            <title>".$_GET['namaSoal']." | Download Soal IPS SMP</title>
        ";
    ?>
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
                    <li><input type='search' class='form-control input-search visible-xs' placeholder='Search'></li>
                    <li ><a href="/">Home</a></li>
                    <li class="dropdown active">
                        <a class="dropdown-toggle" data-toggle="dropdown">Soal dan Materi <i class="icon-angle-down"></i></a>
                        <ul class="dropdown-menu">
                        <?php
                        function activeLi($isi){
                            if(isset($_GET['category'])){
                                if($isi == $_GET['category'])
                                    return "active";
                            }
                        }
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
                        <h1>".$_GET['namaSoal']."</h1>
                        <p></p>
                    </div>
                    <div class='col-sm-6'>
                        <ul class='breadcrumb pull-right'>
                            <li><a href='/'>Home</a></li>
                            <li><span>Soal dan Materi</span></li>
                            <li><a href='/soal-dan-materi/".$_GET['category']."/".$_GET['page']."/'>".$category."</a></li>
                            <li class='active'>".$_GET['namaSoal']."</li>
                        </ul>
                    </div>
                </div>
            </div>
        ";

        ?>
    </section><!--/#title-->

    <section id="blog" class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="blog">
                    <div class="blog-item">
                        <?php
                            $query_soal = mysqli_query($link, "SELECT * FROM soal WHERE no = '".$_GET['noSoal']."'");
                            $row = mysqli_num_rows($query_soal);
                            $data_soal = mysqli_fetch_array($query_soal);
                            if($row == 1){

                                $date = new DateTime($data_soal['tanggal']);

                                $tags = explode(',', $data_soal['tags']);
                                echo "
                                    <div class='blog-content'>
                                        <h3>".$data_soal['nama']."</h3>
                                        <div class='entry-meta'>
                                            <span><i class='icon-user'></i> Admin</span>
                                            <span><i class='icon-folder-close'></i> <a href='/soal-dan-materi/".$_GET['category']."/1/'>".$category."</a></span>
                                            <span><i class='icon-calendar'></i> ".$date->format('M jS, Y')."</span>
                                        </div>
                                    </div>
                                    <div class='blog-description col-lg-12'>
                                        <div class='col-sm-4'>
                                            <img class='img-responsive blog-img' src='".$data_soal['alamat_gambar']."' width='100%' alt='".$data_soal['nama']."' />
                                        </div>
                                        ".$data_soal['deskripsi'];

                                if(isset($_SESSION['username']) || $data_soal['status'] == 'sample'){
                                    echo "
                                        Download source : <a class='err' href='/download/".sha1($data_soal['no'])."/'>".after_last('/',$data_soal['alamat_file'])."</a>
                                    ";
                                } else {
                                    echo "
                                        Download source : <a class='pointer' data-toggle='modal' data-target='#not-login'>".after_last('/',$data_soal['alamat_file'])."</a>
                                    ";
                                }

                                echo "
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
                                ";


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
                    </div><!--/.blog-item-->
                </div>
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
