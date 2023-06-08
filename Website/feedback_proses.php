<?php
// session_start();
include_once('koneksi/koneksi.php');
$nama= $_POST['nama'];
$email= $_POST['email'];
$masukan= $_POST['masukan'];
$gambar_produk = $_FILES['gambar_video_masukan'];


if ($gambar_produk != "") {
  $img_loc = $_FILES['gambar_video_masukan']['tmp_name'];
  $img_name = $_FILES['gambar_video_masukan']['name'];
  $img_des = $img_name;
  
  $file_size = $_FILES['gambar_video_masukan']['size']; // Ukuran file dalam bytes
  
  // Mengatur ukuran maksimum yang diizinkan (misalnya 5MB)
  $max_file_size = 10 * 1024 * 1024; // 2 MB
  
  // Memeriksa ukuran file
  if ($file_size > $max_file_size) {
      // File terlalu besar, tindakan yang diperlukan (misalnya menampilkan pesan kesalahan)
      echo "<script>alert('File terlalu besar.');window.location='feedback.php';</script>";
  } else {
      // Mendapatkan ekstensi file
      $file_extension = pathinfo($img_name, PATHINFO_EXTENSION);
      
      // Menentukan ekstensi yang diperbolehkan (misalnya .jpg, .jpeg, .png, .gif, .mov, .mp4)
      $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif', 'mov', 'mp4');
      
      // Memeriksa ekstensi file
      if (!in_array(strtolower($file_extension), $allowed_extensions)) {
          // Ekstensi file tidak diperbolehkan, tindakan yang diperlukan (misalnya menampilkan pesan kesalahan)
          echo "<script>alert('File tidak dapat diterima. Hanya menerima foto ataupun video');window.location='feedback.php';</script>";
      } else {
          // Memindahkan file jika ukuran file dan ekstensi file sesuai dengan batasan
          move_uploaded_file($img_loc, '../pictures/' . $img_name);
          
          $query = "INSERT INTO masukan (nama_pengunjung, email_pengunjung, teks_masukan, gambar_video_masukan) VALUES ('$nama', '$email', '$masukan', '$img_des')";
          $result = mysqli_query($koneksi, $query);
          
          // Periksa apakah query berhasil dijalankan
          if (!$result) {
              die("Query gagal dijalankan: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
          } else {
              echo "<script>alert('Masukan berhasil ditambah.');window.location='feedback.php';</script>";
          }
      }
  }
}


?>

