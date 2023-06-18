<?php 
session_start();
    if(!isset($_SESSION["login"])){
        header("Location: ../LOGIN/login.php");
        exit;
    }
    include_once('../koneksi/koneksi.php');
    $query = 'SELECT * FROM admin';
    $result_set = $koneksi->query($query);
    $row = $result_set->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../Pictures/PET.png" rel="icon">
  <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include 'header.php' ?>

  <!-- ======= Sidebar ======= -->
  <?php include 'sidebar.php' ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../pictures/<?php echo $row['foto_admin'];?>" alt="Profile" class="rounded-circle">
              <h2><?php echo  $row['nama_admin'];?></h2>
              <h3>Owner</h3>
              <div class="social-links mt-2">
                <a href="https://web.facebook.com/pages/Pizza-Etnik-Toba/156817371650659" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://instagram.com/pizzaetniktoba5?igshid=YmMyMTA2M2Y=" class="instagram"><i class="bi bi-instagram"></i></a>

              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <!-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li> -->

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Tentang</h5>
                  <p class="small fst-italic">Takut akan Tuhan adalah kunci kesuksesan</p>

                  <h5 class="card-title">Profile Admin</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $row['nama_admin'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No. Telp</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $row['nomor_telepon_admin'];?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo  $row['email_admin'];?></div>
                  </div>

                </div>

                <a href="edit-user-profil.php?id=<?php echo $row['id_admin']; ?>&gambar=<?php echo $row['foto_admin'];?>"><button type="submit" class="btn btn-primary">Edit Profil</button></a>
                <a href="ubah_password.php?id=<?php echo $row['id_admin']; ?>"><button type="submit" class="btn btn-success">Ubah Password</button></a>

               <!-- edit  -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'footer.php' ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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