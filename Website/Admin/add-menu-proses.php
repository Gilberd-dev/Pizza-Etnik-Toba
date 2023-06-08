<?php
// session_start();
include_once('../koneksi/koneksi.php');

$nama_produk = $_POST['nama'];
$harga_produk= $_POST['harga'];
$kategori_produk = $_POST['id_kategori'];
$deskripsi_produk = $_POST['deskripsi'];
$gambar_produk = $_FILES['gambar'];
// mendapatkan nama file gambar yang diupload
$nama_gambar = $gambar_produk['name'];
 
// mengecek judul dan nama gambar yang sama, jika sama maka produk gagal di tambah.(karena jika ada nama gambar yang sama namun gambar berbeda maka sistem akan bingung menginput yang mana, dan apa bila  dihapus akan menghapus gambar lain dengan nama yang sama)
 $cek_nama_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk = '$nama_produk'");
 $cek_gambar_produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE gambar_produk = '$nama_gambar'");

 $cek_nama = mysqli_num_rows($cek_nama_produk);
 $cek_gambar = mysqli_num_rows($cek_gambar_produk);

        if($cek_nama >= 1){
            echo "<script>
            alert('Produk telah terdaftar');
            window.location = 'menu.php';
            </script>";}
        elseif($cek_gambar >= 1){
          echo "<script>
          alert('Gambar telah terdaftar');
          window.location = 'menu.php';
          </script>";
        }
else{
if($gambar_produk != "") {
     $img_loc = $_FILES['gambar']['tmp_name'];
    $img_name = $_FILES['gambar']['name'];
    $img_des = $img_name;
    move_uploaded_file($img_loc,'../../pictures/'.$img_name);

    // $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    // $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    // $ekstensi = strtolower(end($x));
    // $file_tmp = $_FILES['gambar']['tmp_name'];   
    // $angka_acak     = rand(1,999);
    // $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
          
    // if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {     
    //     move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
    //                 // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
                    $query = "INSERT INTO produk (nama_produk, harga_produk, deskripsi_produk, gambar_produk, id_kategori) VALUES ('$nama_produk', '$harga_produk','$deskripsi_produk','$img_des', '$kategori_produk')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      //silahkan ganti index.php sesuai halaman yang akan dituju
                      echo "<script>alert('Data berhasil ditambah.');window.location='menu.php';</script>";
                    }
              //       else {     
              //  //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
              //     echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='produk_tambah.php';</script>";
              // }
  }}
  ?>