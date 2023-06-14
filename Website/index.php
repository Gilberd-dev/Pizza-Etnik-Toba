<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizza Etnik Toba Bakery</title>
    <link rel="stylesheet" href="../css/style2.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="icon" href="../Pictures/PET.png" type="image/jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ysabeau:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&  display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kalam&display=swap" rel="stylesheet">
    <style>
        

.carousel-control-prev,
.carousel-control-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
}

.carousel-control-prev {
    left: 0;
}

.carousel-control-next {
    right: 0;
}

.judul-beranda{
    font-family: 'Reem Kufi Fun', sans-serif;
    font-size: 300%; 
    letter-spacing: 1px; 
    font-weight: 300;   
}

@media screen and (max-width: 600px) {
    .judul-beranda {
        font-size: 200%; /* Ubah ukuran font menjadi 200% pada layar dengan lebar maksimum 600px */
    }
}
    </style>

</head>

<body>
    <!-- header -->

    <!-- body -->

    <main>
        <?php include 'koneksi/header.php' ?>

        <div class="bg_isi">
            <img src="../pictures/bck4.jpg" class="main">
        </div>

        <!-- carousel -->
        <br>
        <br>
        <center>
            <div>
                <h1 class="judul-beranda">BERANDA</h1>
            </div>
        </center>
        <br>
        <br>

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                include_once('koneksi/koneksi.php');
                // untuk client interface
                $query = "SELECT * FROM carousel";
                $result_set = $koneksi->query($query);
                $counter = 0;
                while ($row = $result_set->fetch_assoc()) {
                ?>
                    <div class="carousel-item <?php if ($counter == 0) echo "active"; ?>">
                        <img src="../pictures/<?php echo $row['gambar_carousel'] ?>" class="d-block w-100">
                        <div class="carousel-caption d-none d-md-block">
                            <h5><?php echo $row['judul_carousel'] ?></h5>
                            <p><?php echo $row['deskripsi_carousel'] ?></p>
                        </div>
                    </div>
                <?php $counter++;
                } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-xl-5 col-lg-5 d-flex justify-content-center align-items-stretch position-relative">
                        <a href="https://www.youtube.com/watch?v=2E9B4PBeB7M" class="glightbox play-btn mb-4"></a>
                        <a class="play-btn" href="https://www.youtube.com/watch?v=2E9B4PBeB7M"><img class="img-fluid" src="../Pict/play-icon.png" alt=""></a>
                        <img src="../Pict/pizza.jpg" alt="" class="iklan">
                    </div> -->
                    <div class="col-xl-5 col-lg-5 d-flex justify-content-center align-items-stretch position-relative ">
                        <iframe class="play" width="560" height="315" src="https://www.youtube.com/embed/2E9B4PBeB7M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-xl-7 col-lg-7 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-7 px-lg-5" style="max-width:100%;">
                        <h3 style="color: white;font-family: 'Courgette', cursive; margin-top: 50px; text-align: center; font-size:40px;">Pizza Etnik Toba</h3>
                        <br>
                        <p style="color: white; text-align: center; padding: 0 0 140px 0;font-family: 'Kalam', cursive; font-size:25px;">Pizza
                            Etnik Toba Bakery Memberi Pengalaman Makanan Internasional dengan citarasa Nasional.
                            Pizza Etnik Toba Bakery membawa olahan Khas Batak dalam Kancah Dunia
                            Kalau Anda mencari kuliner Batak, jangan ragu untuk mengunjungi Kami,
                            Pizza Etnik Toba Bakery</p>
                    </div>
                </div>
            </div>
        </section>
        <div style="padding: 40px 0 0 0;">
            <center>
                <h1 style="font-family: 'Reem Kufi Fun', sans-serif;">Apa Pendapat Pelanggan?</h1>
            </center>
        </div>

        <center>
            <hr class="col-lg-11" style="border-top:3px double;" width="80%">
        </center>
        <div class="row">
            <?php
            include_once('koneksi/koneksi.php');
            // untuk client interface
            $query = "SELECT * FROM masukan WHERE status_masukan = 'Diizinkan' ORDER BY id_masukan DESC LIMIT 4";
            $result_set = $koneksi->query($query);
            while ($row = $result_set->fetch_assoc()) {
            ?>
                <div class="column col-lg-6">
                    <div class="card">
                        <span class="tag"><?php echo $row['nama_pengunjung'] ?></span>

                        <hr>
                        <p class="comment"><?php echo  $row['teks_masukan'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <br> <br>
        <center>
            <a href="../Website/feedback.php"><button type="button" class="lain btn btn-outline-warning">Lihat Lainnya</button></a>
            <!-- <button type="button" class="btn btn-outline-warning"><a class="lain" href="../Website/feedback.php">Lihat Lainnya</a></button> -->
        </center>
        <br>
        <br>
        <center>
            <hr width="100%" class="col-lg-10">
        </center>
        <center>
            <h1 style="font-family: 'Reem Kufi Fun', sans-serif;">Lihat Lokasi</h1>
        </center>
        <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.507419065683!2d99.06613341467167!3d2.3343405982987155!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e053fb3f7e38d%3A0x4680c8c5c6cba834!2sPizza%20Etnik%20Toba!5e0!3m2!1sid!2sid!4v1679733386145!5m2!1sid!2sid" width="100%" height="450" style="border:0; margin-top: -200px; padding: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    <!-- footer -->
    <?php include 'koneksi/footer.php' ?>

    <script src="../js/glightbox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>

</body>

</html>