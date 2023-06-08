<?php 
include '../koneksi/koneksi.php';

    // membuat variabel untuk menampung data dari form
  $id = $_POST['id'];
  $nama = $_POST['nama_admin'];
  $nomor_telepon = $_POST['nomor_telepon'];
  $foto_admin = $_FILES['gambar'];
  $foto_lama=$_POST['gambar_lama'];
  //tangkap gambar
  $img_tmp = $_FILES['gambar']['tmp_name'];
  $img_name = $_FILES['gambar']['name'];

  // cek jika ada foto baru
 if($img_name){
  // jika ada gambar baru, maka hapus gambar yang lama
  unlink('../../pictures/'.$foto_lama);
  // menyimpan gambar secara permanen
  move_uploaded_file($img_tmp, '../../pictures/'.$img_name);

  $query  = "UPDATE admin SET nama_admin= '$nama', nomor_telepon_admin = '$nomor_telepon', foto_admin = '$img_name'";

}else{
$query  = "UPDATE admin SET nama_admin= '$nama', nomor_telepon_admin = '$nomor_telepon'";
}
 $query .= "WHERE id_admin = '$id'";
 $result = mysqli_query($koneksi, $query);
                  // periska query apakah ada error
if(!$result){
die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                           " - ".mysqli_error($koneksi));
} else {
//tampil alert dan akan redirect ke halaman index.php
//silahkan ganti index.php sesuai halaman yang akan dituju
echo "<script>alert('Data berhasil diubah.');window.location='users-profile.php';</script>";
}

 ?>