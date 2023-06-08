<?php 
include_once('../koneksi/koneksi.php');
$id = $_GET['id'];
$status = $_GET['status'];

$query  = "UPDATE produk SET status_produk= $status WHERE id_produk = $id";
   $result = mysqli_query($koneksi, $query); 
	if(!$result){
  die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
  } else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
  echo "<script>window.location='menu.php';</script>";
 }
 ?>
