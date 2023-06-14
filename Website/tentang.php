<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Pictures/PET.png" type="image/jpg">
  <title>Tentang</title>
  <!-- link css -->
  <link rel="stylesheet" href="../css/tentang.css">
  <link rel="stylesheet" href="../css/navbar.css">
  <link href="../css/glightbox.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@600&display=swap" rel="stylesheet">
  <!-- end of link css -->
 
</head>

<body>
  <!-- header -->
  <?php include 'koneksi/header.php' ?>

  <h1 class="h1">TENTANG</h1>
  <br>


  <section>
    <div class="container">
      <div class="row">


        <div class="col-xl-6 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-7 px-lg-5" style="max-width:100%;">
          <br>
          <h2   class="h2">Sejarah</h2>
          <p style="color: black; text-align: center; padding: 0 0 140px 0;font-family: 'Poppins'; font-size:15px;">Toko Roti Pizza Etnik Toba beroperasi sejak tahun 2015 dengan keinginan untuk memajukan kuliner
            Toba.Pemilik toko memiliki ide untuk menciptakan variasi kuliner yang tak terlupakan bagi para tamu. Penikmat pizza
            ini tidak hanya warga lokal saja, bahkan tamu dari luar kota pun menyukainya. Keahlian suaminya sebagai seorang
            baker yang ahli dalam membuat pizza membantu ide dari pemilik toko yaitu ibu Helena J Pakpahan dapat terwujud.
            Daya Tarik produk dari bisnis yang mereka dirikan adalah varian toping dan menu istimewa yang berbahan baku unik
            seperti Dalinihorbo (susu kerbau yang dibekukan),andaliman, mujahir Toba dan Natinuktuk.Toko juga memiliki link website awal yang digunakan beberapa
            tahun yang lalu. Berikut adalah link website toko yang lama: <a href="https://new-delicious-pizza-etnik-toba.business.site/">Pizza Etnik Toba</a>
            <!-- Toko ini mengembangkan bisnisnya dengan menggunakan teknologi berupa media sosial dan website yang mana website
            mencakup info terbaru tentang toko, galeri yang berisi foto produk, kontak, alamat yang dilengkapi dengan rute
            menggunakan Google maps dan feedback dari customer.Namun, toko belum menyediakan pemesanan secara online dan fitur
            untuk penyampaian promosi dan informasi diskon produk. Toko juga memiliki link website awal yang digunakan beberapa
            tahun yang lalu. Berikut adalah link website toko yang lama: <a href="https://new-delicious-pizza-etnik-toba.business.site/">Pizza Etnik Toba</a> -->
          </p>
        </div>
        <div class="col-xl-6 col-lg-6 d-flex justify-content-center align-items-stretch position-relative">
          <img src="../Pictures/sej223.jpg" alt="" class="iklan">
        </div>
      </div>
    </div>
  </section>

  <!-- prestasi -->
  <h2 class="h2">Prestasi</h2>
  <div>
    <div class="accordion" id="accordionExample">
      <?php
      include_once('koneksi/koneksi.php');
      $query = "SELECT * FROM prestasi";
      $result = $koneksi->query($query);

      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        if ($i == 0) {
      ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $row['judul_prestasi'] ?>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-lg-2">
                    <img class="pres" src="../pictures/<?php echo $row['gambar_prestasi'] ?>" alt="">
                  </div>
                  <div class="col-lg-10">
                    <?php echo $row['deskripsi_prestasi'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else {
        ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['id_prestasi'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id_prestasi'] ?>">
                <?php echo $row['judul_prestasi'] ?>
              </button>
            </h2>
            <div id="collapse<?php echo $row['id_prestasi'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-lg-2">
                    <img class="pres" src="../pictures/<?php echo $row['gambar_prestasi'] ?>" alt="">
                  </div>
                  <div class="col-lg-10">
                    <?php echo $row['deskripsi_prestasi'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php }
        $i++;
      } ?>
    </div>
  </div>


  <h2 class="h2">Sertifikat</h2>
  <div>
    <div class="accordion" id="accordionExample">
      <?php
      include_once('koneksi/koneksi.php');
      $query = "SELECT * FROM sertifikat";
      $result = $koneksi->query($query);

      $i = 0;
      while ($row = mysqli_fetch_array($result)) {
        if ($i == 0) {
      ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <?php echo $row['judul_sertifikat'] ?>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-lg-2">
                    <img class="pres" src="../pictures/<?php echo $row['gambar_sertifikat'] ?>" alt="">
                  </div>
                  <div class="col-lg-10">
                    <?php echo $row['deskripsi_sertifikat'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else {
        ?>
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $row['id_sertifikat'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $row['id_sertifikat'] ?>">
                <?php echo $row['judul_sertifikat'] ?>
              </button>
            </h2>
            <div id="collapse<?php echo $row['id_sertifikat'] ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <div class="row">
                  <div class="col-lg-2">
                    <img class="pres" src="../pictures/<?php echo $row['gambar_sertifikat'] ?>" alt="">
                  </div>
                  <div class="col-lg-10">
                    <?php echo $row['deskripsi_sertifikat'] ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php }
        $i++;
      } ?>
    </div>
  </div>


  <!-- end of prestasi -->


  <!-- footer -->
  <footer>
    <?php include 'koneksi/footer.php' ?>
  </footer>
  <script src="../js/nav.js"></script>
  <!-- footer end -->

  <!-- link js -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- end of link js -->
</body>

</html>