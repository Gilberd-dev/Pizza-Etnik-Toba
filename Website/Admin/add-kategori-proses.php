<?php
// session_start();
include_once('../koneksi/koneksi.php');

// $tabel= $_GET['tabel'];
$nama = $_POST['nama'];

// mengecek judul dan nama gambar yang sama, jika sama maka produk gagal di tambah.(karena jika ada nama gambar yang sama namun gambar berbeda maka sistem akan bingung menginput yang mana, dan apa bila  dihapus akan menghapus gambar lain dengan nama yang sama)
 $cek_nama_kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE nama_kategori = '$nama'");
 $cek_kategori= mysqli_num_rows($cek_nama_kategori);


        if($cek_kategori>= 1){
            echo "<script>
            alert('Kategori telah terdaftar');
            window.location = 'kategori.php';
            </script>";}
else{
                    $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      echo "<script>alert('Data berhasil ditambah.');window.location='kategori.php';</script>";
                    }
                }
?>