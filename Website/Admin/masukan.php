<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../LOGIN/login.php");
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
    <title>Masukan</title>
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


</head>
<?php include 'header.php' ?>

<!-- ======= Sidebar ======= -->
<?php include 'sidebar.php' ?>

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Masukan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Masukan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Masukan</h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Masukan</th>
                                    <th scope="col">Gambar/Video Masukan</th>
                                    <th scope="col">Status Masukan</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; //variabel untuk membuat nomor urut
                                $query = 'SELECT * FROM masukan';
                                $result_set = $koneksi->query($query);
                                while ($row = $result_set->fetch_assoc()) {
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama_pengunjung']; ?></td>
                                        <td><?= $row['email_pengunjung']; ?></td>
                                        <td><?= $row['teks_masukan']; ?></td>
                                        <td> <?php
                                                $media_type = mime_content_type('../../pictures/' . $row['gambar_video_masukan']);
                                                if (strpos($media_type, 'image') !== false) { ?>
                                                <img src="../../pictures/<?php echo $row['gambar_video_masukan'] ?>" class="card-img" alt="...">
                                            <?php
                                                } else if (strpos($media_type, 'video') !== false) { ?>
                                                <video controls class="card-img">
                                                    <source src="../../pictures/<?php echo $row['gambar_video_masukan'] ?>" type="video/mp4">
                                                </video>
                                            <?php } ?>
                                        </td>
                                        <td><?= $row['status_masukan']; ?></td>
                                        <td>
                                            <?php if ($row['status_masukan'] == 'Diizinkan') { ?>
                                                <a href="status_masukan.php?id=<?php echo $row['id_masukan']; ?>&status='Diblokir'"><button type="button" class="btn btn-danger rounded-pill">Blokir</button></a>
                                            <?php } else { ?>
                                                <a href="status_masukan.php?id=<?php echo $row['id_masukan']; ?>&status='Diizinkan'"><button type="button" class="btn btn-success rounded-pill">Unblokir</button></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        <!-- <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                          </nav>End Basic Pagination -->

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>

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