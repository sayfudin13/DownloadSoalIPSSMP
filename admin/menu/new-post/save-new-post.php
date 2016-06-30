<?php
   include_once("../../db/config.inc.php");
  $judul=$_POST['judul'];
  $dokumen="/soal/soal/".$_POST['dokumen'];
  $gambar="/gambar/".$_POST['gambar'];
  $status=$_POST['status'];
  $category=$_POST['category'];
  $deskripsi=$_POST['deskripsi'];
  $tagsinput=$_POST['tagsinput'];
   $q = "INSERT INTO `soal` (`no`, `nama`, `alamat_file`, `alamat_gambar`, `status`, `category`, `deskripsi`, `tanggal`, `tags`) VALUES (NULL, '$judul', '$dokumen', '$gambar', '$status', '$category', '$deskripsi', CURRENT_TIMESTAMP, '$tagsinput')";
   $res = mysqli_query($link,$q);
   echo $res;
?>
