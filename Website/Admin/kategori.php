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
    <title>Kategori Produk</title>
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
        <h1>Kategori Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Kategori Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Kategori Produk</h5>
                        <a href="add-kategori.php"><button type="button" class="btn btn-warning rounded-pill">Tambah</button></a>


                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; //variabel untuk membuat nomor urut
                                $query = 'SELECT * FROM kategori';
                                $result_set = $koneksi->query($query);
                                while ($row = $result_set->fetch_assoc()) {
                                ?>
                                
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $row['nama_kategori']; ?></td>
                                        <td><?= $row['status']; ?></td>
                                        <td>
                                        <a href="edit-kategori.php?id=<?php echo $row['id_kategori']; ?>"><button type="button" class="btn btn-info rounded-pill">Edit</button></a>
                                                        <?php if ($row['status'] == 'Aktif') { ?>
                                                            <a href="status.php?id=<?php echo $row['id_kategori']; ?>&status_kategori='Nonaktif'"><button type="button" class="btn btn-danger rounded-pill">Nonaktifkan</button></a>
                                                        <?php } else { ?>
                                                            <a href="status.php?id=<?php echo $row['id_kategori']; ?>&status_kategori='Aktif'"><button type="button" class="btn btn-success rounded-pill">Aktifkan</button></a>
                                                        <?php } ?>
                                        </td>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                        </div>

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