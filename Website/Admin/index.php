<?php 
session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../login.php");
        exit;
    }
    include_once('../koneksi/koneksi.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
  <link href="../../Pictures/PET.png" rel="icon">
    <link rel="stylesheet" href="style.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">


</head>

<body>

    <!-- ======= Header ======= -->
    <?php include 'header.php' ?>

    <!-- ======= Sidebar ======= -->
    <?php include 'sidebar.php' ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Beranda</h1>
            <nav>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Sales Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card sales-card">

                                <!-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> -->

                                <div class="card-body">
                                    <h5 class="card-title"> <span>Total Jumlah | </span>Produk</h5>
                                        <!-- | Today</span></h5> -->

                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fa-solid fa-utensils"></i>
                                        </div>
                                        <div class="ps-3">
                                    <?php
                                   // Menjalankan kueri untuk menghitung jumlah produk
                                    $query = "SELECT COUNT(*) FROM produk";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahProduk = $result->fetch_row()[0];

                                    // Menampilkan jumlah produk
                                    echo "<h6>" . $jumlahProduk . "</h6>";

                                    // Menutup koneksi database
                                    // $koneksi->close(); 
                                    ?>
                                     <?php
                                    $query = "SELECT COUNT(*) FROM produk where status_produk ='Aktif'";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahProdukAktif = $result->fetch_row()[0];
                                            echo "<span class='text-success small pt-1 fw-bold'>".$jumlahProdukAktif."</span>"; 
                                    ?>
                                            <span class="text-muted small pt-2 ps-1">Aktif</span>
                                            <br>
                                            <?php
                                    $query = "SELECT COUNT(*) FROM produk where status_produk ='Nonaktif'";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahProdukNonaktif = $result->fetch_row()[0];
                                            echo "<span class='text-success small pt-1 fw-bold'>".$jumlahProdukNonaktif."</span>"; 
                                    ?>
                                            <span class="text-muted small pt-2 ps-1">Nonaktif</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
                            <div class="card info-card revenue-card">

                                <!-- <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div> -->

                                <div class="card-body">
                                <h5 class="card-title"> <span>Total Jumlah | </span>Masukan </h5>


                                    <div class="d-flex align-items-center">
                                        <div
                                            class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-chat-right-text"></i>
                                        </div>
                                        <div class="ps-3">
                                        <?php
                                   // Menjalankan kueri untuk menghitung jumlah produk
                                    $query = "SELECT COUNT(*) FROM masukan";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahMasukan = $result->fetch_row()[0];

                                    // Menampilkan jumlah produk
                                    echo "<h6>" . $jumlahMasukan . "</h6>";
                                     ?>
                                       <?php
                                    $query = "SELECT COUNT(*) FROM masukan where status_masukan ='Diizinkan'";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahMasukanDiizinkan = $result->fetch_row()[0];
                                            echo "<span class='text-danger small pt-1 fw-bold'>".$jumlahMasukanDiizinkan."</span>"; 
                                    ?>
                                            <span class="text-muted small pt-2 ps-1">Diizinkan</span>
                                            <br>
                                            <?php
                                    $query = "SELECT COUNT(*) FROM masukan where status_masukan ='Diblokir'";
                                    $result = $koneksi->query($query);

                                    // Mendapatkan jumlah produk
                                    $jumlahMasukanDiblokir = $result->fetch_row()[0];
                                            echo "<span class='text-danger small pt-1 fw-bold'>".$jumlahMasukanDiblokir."</span>"; 
                                    ?>
                                            <span class="text-muted small pt-2 ps-1">Diblokir</span>
                                            <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                class="text-muted small pt-2 ps-1">decrease</span> -->

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                    


                    </div>
                </div><!-- End Left side columns -->

                <!-- Right side columns -->
                <div class="col-lg-4">






                </div><!-- End Right side columns -->

            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <?php include 'footer.php' ?>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="vendor/apexcharts/apexcharts.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/chart.umd.js"></script>
    <script src="vendor/echarts/echarts.min.js"></script>
    <script src="vendor/quill/quill.min.js"></script>
    <script src="vendor/simple-datatables/simple-datatables.js"></script>
    <script src="vendor/tinymce/tinymce.min.js"></script>
    <script src="vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="main.js"></script>

</body>

</html>