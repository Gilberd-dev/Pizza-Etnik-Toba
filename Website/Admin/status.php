<?php 
include_once('../koneksi/koneksi.php');

if(isset($_GET['status'])){


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
}

if(isset($_GET['status_kategori'])){


   $id = $_GET['id'];
   $status = $_GET['status_kategori'];
   
   $query  = "UPDATE kategori SET status = $status WHERE id_kategori = $id";
      $result = mysqli_query($koneksi, $query); 
      if(!$result){
     die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                                " - ".mysqli_error($koneksi));
     } else {
     //tampil alert dan akan redirect ke halaman index.php
     //silahkan ganti index.php sesuai halaman yang akan dituju
     echo "<script>window.location='kategori.php';</script>";
    }
   }
 ?>