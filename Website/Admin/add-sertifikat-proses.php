<?php
// session_start();
include_once('../koneksi/koneksi.php');

// $tabel= $_GET['tabel'];
$judul = $_POST['judul'];
$deskripsi= $_POST['deskripsi'];
$gambar= $_FILES['gambar'];
$nama_gambar = $gambar['name'];

 $cek_judul_sertifikat = mysqli_query($koneksi, "SELECT * FROM sertifikat WHERE judul_sertifikat = '$judul'");
 $cek_gambar_sertifikat = mysqli_query($koneksi, "SELECT * FROM sertifikat WHERE gambar_sertifikat= '$nama_gambar'");

 $cek_sertifikat= mysqli_num_rows($cek_judul_sertifikat);
 $cek_gambar = mysqli_num_rows($cek_gambar_sertifikat);

        if($cek_sertifikat>= 1){
            echo "<script>
            alert('Sertifikat telah terdaftar');
            window.location = 'sertifikat.php';
            </script>";}
        elseif($cek_gambar >= 1){
            echo "<script>
            alert('Gambar telah terdaftar');
            window.location = 'sertifikat.php';
            </script>";}
else{

if($gambar != "") {
     $img_loc = $_FILES['gambar']['tmp_name'];
    $img_name = $_FILES['gambar']['name'];
    $img_des = $img_name;
    move_uploaded_file($img_loc,'../../pictures/'.$img_name);
                    $query = "INSERT INTO sertifikat (judul_sertifikat, deskripsi_sertifikat,gambar_sertifikat) VALUES ('$judul', '$deskripsi', '$img_des')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      echo "<script>alert('Data berhasil ditambah.');window.location='sertifikat.php';</script>";
                    }
                }
            }
?>