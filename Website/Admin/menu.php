<?php
session_start();
if (!isset($_SESSION["login"])) {
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
    <title>Menu</title>
    <link href="../../Pictures/PET.png" rel="icon">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="vendor/quill/quill.snow.css" rel="stylesheet">e
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
                <li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
                <li class="breadcrumb-item active">Menu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <?php
        // Koneksi ke database
        include_once('../koneksi/koneksi.php');
        // Ambil nilai yang dipilih dari dropdown setelah mengirimkan formulir
        $selectedCategory = isset($_POST['filter']) ? $_POST['filter'] : '';

        // Ubah query untuk mengambil data dari tabel 'produk' berdasarkan nilai yang dipilih dari dropdown
        $query = "SELECT * FROM produk";
        if (!empty($selectedCategory)) {
            $query .= " INNER JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE kategori.nama_kategori = '$selectedCategory'";
        }

        $result_set = mysqli_query($koneksi, $query);
        ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Produk</h5>
                        <form method="POST" action="">
                            <div class="form-group" style="display: inline-block; margin-right:40px;">
                                <label for="filter">Filter Kategori:</label>
                                <select class="form-control" id="filter" name="filter">
                                    <option value="">Semua</option>
                                    <?php
                                    $kategori_query = "SELECT * FROM kategori";
                                    $kategori_result = mysqli_query($koneksi, $kategori_query);
                                    while ($kategori = mysqli_fetch_assoc($kategori_result)) {
                                        $kategori_id = $kategori['id_kategori'];
                                        $kategori_nama = $kategori['nama_kategori'];
                                        $selected = ($_POST['filter'] == $kategori_nama) ? 'selected' : ''; // menambahkan pengecekan jika opsi dipilih
                                        echo "<option value='$kategori_nama' $selected>$kategori_nama</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="submit" name="submit" value="Pilih" class="btn btn-primary">
                        </form>
                        <br>

                        <a href="add-menu.php"><button type="button" class="btn btn-warning rounded-pill">Tambah</button></a>

                        <!-- Table with stripped rows -->
                        <div id="conatiner">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga Produk</th>
                                        <th scope="col">Deskripsi Produk</th>
                                        <th scope="col">Gambar Produk</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1; //variabel untuk membuat nomor urut
                                    if (mysqli_num_rows($result_set) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_set)) {
                                            $limitedData = substr($row['deskripsi_produk'], 0, 50);
                                    ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $row['nama_produk']; ?></td>
                                                <td>Rp <?= number_format($row['harga_produk'], 0, ',', '.'); ?></td>
                                                <td><?= $limitedData ?>...</td>
                                                <!-- <td><?= $row['kategori_produk']; ?></td> -->
                                                <td><img src="../../pictures/<?php echo $row['gambar_produk']; ?>" style="width:120px;"></td>
                                                <td><?= $row['status_produk']; ?></td>
                                                <td>
                                                    <!-- <button type="button" class="btn btn-success rounded-pill">Nonaktifkan</button>
                                        <button type="button" class="btn btn-danger rounded-pill">Aktifkan</button> -->
                                                    <a href="edit-menu.php?id=<?php echo $row['id_produk']; ?>&gambar=<?php echo $row['gambar_produk']; ?>"><button type="button" class="btn btn-info rounded-pill">Edit</button></a>
                                                    <?php if ($row['status_produk'] == 'Aktif') { ?>
                                                        <a href="status_menu.php?id=<?php echo $row['id_produk']; ?>&status='Nonaktif'"><button type="button" class="btn btn-danger rounded-pill">Nonaktifkan</button></a>
                                                    <?php } else { ?>
                                                        <a href="status_menu.php?id=<?php echo $row['id_produk']; ?>&status='Aktif'"><button type="button" class="btn btn-success rounded-pill">Aktifkan</button></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php $no++;
                                        }
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

<script>
    var btnPesan = document.getElementById("pesan");
    var pesansekarang = document.getElementById("pesansekarang");
    btnPesan.addEventListener("click", function() {
        // alert('Anda sedang memesan sekarang!');
        var xhr = new XMLHttpRequest();

        // Cek kesiapan ajax
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                pesansekarang.innerHTML = xhr.responseText;
            }
        };

        // eksekusi ajax
        xhr.open("GET", "ajax/pesan_sekarang.php", true);
        xhr.send();
    });
</script>

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