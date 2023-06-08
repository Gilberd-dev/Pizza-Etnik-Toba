<?php 
include '../koneksi/koneksi.php';

    // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama_produk= $_POST['nama'];
  $harga_produk = $_POST['harga'];
  $kategori_produk = $_POST['id_kategori'];
  $deskripsi_produk = $_POST['deskripsi'];
  $gambar_produk = $_FILES['gambar'];
  $gambar_lama=$_POST['gambar_lama'];
  //tangkap gambar
  $img_tmp = $_FILES['gambar']['tmp_name'];
  $img_name = $_FILES['gambar']['name'];

  // cek jika ada foto baru
 if($img_name){
  // jika ada gambar baru, maka hapus gambar yang lama
  unlink('../../pictures/'.$gambar_lama);
  // menyimpan gambar secara permanen
  move_uploaded_file($img_tmp, '../../pictures/'.$img_name);

  $query  = "UPDATE produk SET nama_produk= '$nama_produk', harga_produk = '$harga_produk', deskripsi_produk = '$deskripsi_produk', gambar_produk = '$img_name', id_kategori = '$kategori_produk'";

}else{
$query  = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk', deskripsi_produk = '$deskripsi_produk', id_kategori = '$kategori_produk'";
}
 $query .= "WHERE id_produk = '$id'";
 $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
} else {
//tampil alert dan akan redirect ke halaman index.php
//silahkan ganti index.php sesuai halaman yang akan dituju
echo "<script>alert('Data berhasil diubah.');window.location='menu.php';</script>";
}

 ?>
