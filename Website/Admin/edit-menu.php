<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}
include '../koneksi/koneksi.php';
if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM produk, kategori WHERE produk.id_kategori=kategori.id_kategori AND id_produk='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) .
            " - " . mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
    // apabila data tidak ada pada database maka akan dijalankan perintah ini
    if (!count($data)) {
        echo "<script>alert('Data tidak ditemukan pada database');window.location='menu.php';</script>";
    }
} else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='menu.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
  <link href="../../Pictures/PET.png" rel="icon">
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
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Menu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-6">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Edit Data Produk <?php $data['nama_produk'] ?></h5>

                        <!-- General Form Elements -->
                        <form role="form" action="edit-menu-proses.php" method="POST" enctype="multipart/form-data">
                            <input name="id" value="<?php echo $data['id_produk']; ?>" hidden>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $data['nama_produk'] ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Harga Produk</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" min="0" name="harga" value="<?php echo $data['harga_produk']; ?>" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" style="height: 100px" name="deskripsi" required><?php echo $data['deskripsi_produk']; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">Gambar Produk</label>
                                <div class="col-sm-10">
                                    <img src="../../pictures/<?php echo $data['gambar_produk'];?>" style="width: 200px;float: left;margin-bottom: 10px;">
                                    <input class="form-control" type="file" id="formFile" name="gambar">
                                    <input name="gambar_lama" value="<?php echo $data['gambar_produk']; ?>"  hidden>
                                    <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                                </div>
                            </div>
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kategori Produk</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="id_kategori">
                                <!-- <option align = "center">---Pilih Kategori---</option> -->
                                <?php
                                $query = "SELECT * FROM kategori WHERE status='Aktif'";
                                $result_set = $koneksi->query($query);
                                while ($kategori = $result_set->fetch_assoc()) {
                                    $selected = ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : '';
                                    echo "<option value='" . $kategori['id_kategori'] . "' $selected>" . $kategori['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit </button>
                        </div>
                    </div>

                    </form><!-- End General Form Elements -->

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