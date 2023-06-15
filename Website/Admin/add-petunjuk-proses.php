<?php
// session_start();
include_once('../koneksi/koneksi.php');

// $tabel= $_GET['tabel'];
$deskripsi= $_POST['deskripsi'];

// mengecek judul dan nama gambar yang sama, jika sama maka produk gagal di tambah.(karena jika ada nama gambar yang sama namun gambar berbeda maka sistem akan bingung menginput yang mana, dan apa bila  dihapus akan menghapus gambar lain dengan nama yang sama)
 $cek_deskripsi_petunjuk = mysqli_query($koneksi, "SELECT * FROM petunjuk WHERE deskripsi = '$deskripsi'");

 $cek_deskripsi= mysqli_num_rows($cek_deskripsi_petunjuk);
        if($cek_deskripsi>= 1){
            echo "<script>
            alert('Petunjuk telah terdaftar');
            window.location = 'petunjuk.php';
            </script>";}
else{
                    $query = "INSERT INTO petunjuk (deskripsi) VALUES ('$deskripsi')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      echo "<script>alert('Data berhasil ditambah.');window.location='petunjuk.php';</script>";
                    }
                }
?>