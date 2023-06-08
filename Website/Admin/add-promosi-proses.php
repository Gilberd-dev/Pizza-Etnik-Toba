<?php
// session_start();
include_once('../koneksi/koneksi.php');


$judul = $_POST['judul'];
$deskripsi= $_POST['deskripsi'];
$gambar= $_FILES['gambar'];
$nama_gambar = $gambar['name'];

// mengecek judul dan nama gambar yang sama, jika sama maka produk gagal di tambah.(karena jika ada nama gambar yang sama namun gambar berbeda maka sistem akan bingung menginput yang mana, dan apa bila  dihapus akan menghapus gambar lain dengan nama yang sama)
//  $cek_judul_promosi = mysqli_query($koneksi, "SELECT * FROM carousel WHERE judul_carousel = '$judul' AND judul_carousel IS NOT NULL");
 $cek_gambar_produk = mysqli_query($koneksi, "SELECT * FROM carousel WHERE gambar_carousel= '$nama_gambar'");

//  $cek_promosi= mysqli_num_rows($cek_judul_promosi);
 $cek_gambar = mysqli_num_rows($cek_gambar_produk);

        // if($cek_promosi>= 1){
        //     echo "<script>
        //     alert('Promosi telah terdaftar');
        //     window.location = 'promosi.php';
        //     </script>";}
        if($cek_gambar >= 1){
            echo "<script>
            alert('Gambar telah terdaftar');
            window.location = 'promosi.php';
            </script>";}
else{
if($gambar != "") {
     $img_loc = $_FILES['gambar']['tmp_name'];
    $img_name = $_FILES['gambar']['name'];
    $img_des = $img_name;
    move_uploaded_file($img_loc,'../../pictures/'.$img_name);
                    $query = "INSERT INTO carousel (judul_carousel, deskripsi_carousel,gambar_carousel) VALUES ('$judul', '$deskripsi', '$img_des')";
                    $result = mysqli_query($koneksi, $query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      //tampil alert dan akan redirect ke halaman index.php
                      echo "<script>alert('Data berhasil ditambah.');window.location='promosi.php';</script>";
                    }
                }
            }
?>