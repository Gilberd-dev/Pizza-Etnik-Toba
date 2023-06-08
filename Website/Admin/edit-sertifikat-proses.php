<?php 
include '../koneksi/koneksi.php';

    // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar'];
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

  $query  = "UPDATE sertifikat SET judul_sertifikat= '$judul', deskripsi_sertifikat = '$deskripsi', gambar_sertifikat = '$img_name'";

}else{
$query  = "UPDATE  sertifikat SET judul_sertifikat = '$judul', deskripsi_sertifikat = '$deskripsi'";
}
 $query .= "WHERE id_sertifikat = '$id'";
 $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
} else {
//tampil alert dan akan redirect ke halaman index.php
//silahkan ganti index.php sesuai halaman yang akan dituju
echo "<script>alert('Data berhasil diubah.');window.location='sertifikat.php';</script>";
}

 ?>
