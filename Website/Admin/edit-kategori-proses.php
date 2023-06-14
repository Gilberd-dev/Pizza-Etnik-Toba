<?php 
include '../koneksi/koneksi.php';

    // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama = $_POST['nama'];
// update data
  $query  = "UPDATE kategori SET nama_kategori= '$nama' WHERE id_kategori = '$id'";
 $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
} else {
//tampil alert dan akan redirect ke halaman index.php
//silahkan ganti index.php sesuai halaman yang akan dituju
echo "<script>alert('Data berhasil diubah.');window.location='kategori.php';</script>";
}

 ?>