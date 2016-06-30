<?php
  include_once("../../db/config.inc.php");

  $no=$_POST['no'];
  $judul=$_POST['judul'];
  $dokumen="/soal/soal/".$_POST['dokumen'];
  $gambar="/gambar/".$_POST['gambar'];
  $status=$_POST['status'];
  $category=$_POST['category'];
  $deskripsi=$_POST['deskripsi'];
  $tagsinput=$_POST['tagsinput'];
   $q = "UPDATE `soal` SET `nama`='$judul', `alamat_file`='$dokumen', `alamat_gambar`='$gambar', `status`='$status', `category`='$category', `deskripsi`='$deskripsi', `tags`='$tagsinput' WHERE `no`='$no'";
   $res = mysqli_query($link,$q);
   echo $res;
?>
