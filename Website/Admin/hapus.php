<?php
include '../koneksi/koneksi.php';
$id = $_GET["id"];
$gambar = $_GET['gambar'];
$tabel = $_GET['tabel'];

//mengambil id yang ingin dihapus
if(isset($_GET['halaman'])){
$halaman = $_GET['halaman'];
// mengambil jumlah data pada tabel carousell
$query_jumlah = "SELECT COUNT(*) AS jumlah FROM carousell";
$hasil_jumlah = mysqli_query($koneksi, $query_jumlah);
$data_jumlah = mysqli_fetch_assoc($hasil_jumlah);
if ($data_jumlah['jumlah'] <= 2) {
  echo "<script>alert('Data tidak dapat dihapus karena hanya tersisa 2 data.');window.location='$halaman.php';</script>";
}else {
unlink('../../pictures/'.$gambar);
//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM $tabel WHERE id_$tabel='$id'";
$hasil_query = mysqli_query($koneksi, $query);
// if($id){
//  unlink('gambar/'.$gambar);
// } 
//periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='$halaman.php';</script>";
}}
}else{
  unlink('../../pictures/'.$gambar);
//jalankan query DELETE untuk menghapus data
$query = "DELETE FROM $tabel WHERE id_$tabel='$id'";
$hasil_query = mysqli_query($koneksi, $query);
// if($id){
//  unlink('gambar/'.$gambar);
// } 
//periksa query, apakah ada kesalahan
if(!$hasil_query) {
  die ("Gagal menghapus data: ".mysqli_errno($koneksi).
   " - ".mysqli_error($koneksi));
} else {
  echo "<script>alert('Data berhasil dihapus.');window.location='$tabel.php';</script>";
}
}
?>
