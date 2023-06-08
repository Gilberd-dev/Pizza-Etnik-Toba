<?php
session_start();
include_once('koneksi/koneksi.php');
if (isset($_POST['kirim'])) {
	if (isset($_POST['pesanan'])) {
		$nama = trim($_POST['nama']);
		$nomor = trim($_POST['nomor']);
		$alamat = trim($_POST['alamat']);
		$catatan = trim($_POST['catatan']);
		$pesan = "";

		foreach ($_POST['pesanan'] as $pesanan) {
			$jumlah = $POST['jumlah' . str_replace(' ', '_', $pesanan)];

			if ($jumlah > 0) {
				$pesan .= "%0D*" . $pesanan . " : " . $jumlah . "*";
			}
		}

		if ($pesan != "") {
			$query = 'SELECT * FROM admin';
			$result_set = $koneksi->query($query);
			$row = $result_set->fetch_assoc();
			$nomor_telepon =  $row['nomor_telepon_admin'];
			header("location:https://api.whatsapp.com/send?phone=$nomor_telepon&text=Halo%20Pizza%20Etnik%20Toba%20Bakery%0D%0DData%20diri%20saya:%20%0DNama:%20*$nama*%0DAlamat%20Alamat%20Pengiriman:%20*$alamat*%0DMenu%20yang%20dipesan:$pesan%0D%0DNOTES:%20*$catatan*");
		} else {
			echo "<script>alert('Mohon pilih minimal satu pesanan.');
			window.location.href = '../menu.php';</script>";
		}
	} else {
		echo "<script>alert('Mohon pilih minimal satu pesanan.');
		window.location.href = '../menu.php';</script>";
	}
}
include_once('koneksi/koneksi.php');
if (isset($_GET['error'])) {
	$error_message = $_GET['error'];
	// Tampilkan pesan umpan balik kepada pengguna
	echo '<script>alert("' . $error_message . '");</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pizza Etnik Toba Bakery</title>
	<link rel="icon" href="../Pict/PET.png" type="image/jpg">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style2.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
	<script>
		function changeClassBasedOnScreenSize() {
			var element = document.getElementById("myElement");

			if (window.innerWidth < 1200) {
				element.classList.remove("col-5");
				element.classList.add("col-12");
			} else {
				element.classList.remove("col-12");
				element.classList.add("col-5");
			}
		}
	</script>

</head>

<!-- header -->
<?php include 'koneksi/header.php' ?>


<!-- Start Menu -->
<div class="menu-box">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="heading-title text-center">
					<h2 style="font-family: 'Reem Kufi Fun', sans-serif;">MENU</h2>
					<hr>
				</div>
			</div>
		</div>
		<div class="row">
			<section class="col-lg-7">
				<div class="row inner-menu-box">
					<center>
						<div class="col-8">
							<div class="nav nav-pills" id="v-pills-tab" role="tablist">
								<a class="nav-link active" id="v-pills-semua-tab" data-toggle="pill" href="#v-pills-semua" role="tab" aria-controls="v-pills-semua" aria-selected="true">Semua</a>
								<a class="nav-link" id="v-pills-makanan-tab" data-toggle="pill" href="#v-pills-makanan" role="tab" aria-controls="v-pills-makanan" aria-selected="true">Makanan</a>
								<a class="nav-link" id="v-pills-minuman-tab" data-toggle="pill" href="#v-pills-minuman" role="tab" aria-controls="v-pills-minuman" aria-selected="false">Minuman</a>
								<a class="nav-link" id="v-pills-roti-tab" data-toggle="pill" href="#v-pills-roti" role="tab" aria-controls="v-pills-roti" aria-selected="false">Roti dan Kue</a>
							</div>
						</div>
					</center>
					<br><br><br>
					<div class="col-12">
						<p class="pc"><em>*Arahkan kursor ke gambar produk untuk melihat detail produk</em></p>
						<p class="hp"><em>*Ketuk gambar produk untuk melihat detail produk</em></p>
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-semua" role="tabpanel" aria-labelledby="v-pills-semua-tab">
								<div class="row">
									<?php
									$jumlahDataPerHalaman = 6;
									$result = mysqli_query($koneksi, "SELECT * FROM produk WHERE status_produk='aktif'");
									$jumlahData = mysqli_num_rows($result);
									$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
									//   if(isset($_GET["halaman"])){
									// 	$halamanAktif= $_GET["halaman"];
									//   } else {
									// 	$halamanAktif = 1;
									//   }
									$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
									$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;


									$query = "SELECT * FROM produk WHERE status_produk='aktif' LIMIT $awalData,$jumlahDataPerHalaman";
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 col-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
											<div class="tombol">
												<i class="fa-solid fa-inbox"></i>
												<a href="?pilih=<?php echo $row['id_produk']; ?>&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button></a>
											</div>
										</div>
									<?php } ?>

								</div>
								<ul class="pagination justify-content-center pagination-black">
									<?php if ($halamanAktif > 1) : ?>
										<li class="page-item">
											<a class="page-link text-dark" href="?halaman=<?= $halamanAktif - 1; ?>" aria-label="Previous">
												<span aria-hidden="true">&laquo;</span>
											</a>
										</li>
									<?php endif; ?>

									<?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
										<?php if ($i == $halamanAktif) : ?>
											<li class="page-item active ">
												<a class="page-link bg-warning border border-warning shadow" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
											</li>
										<?php else : ?>
											<li class="page-item">
												<a class="page-link text-dark" href="?halaman=<?= $i; ?>"><?= $i; ?></a>
											</li>
										<?php endif; ?>
									<?php endfor; ?>

									<?php if ($halamanAktif < $jumlahHalaman) : ?>
										<li class="page-item">
											<a class="page-link text-dark" href="?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
												<span aria-hidden="true">&raquo;</span>
											</a>
										</li>
									<?php endif; ?>
								</ul>

							</div>
							<div class="tab-pane fade show" id="v-pills-makanan" role="tabpanel" aria-labelledby="v-pills-makanan-tab">
								<div class="row">
									<?php
									$query = 'SELECT * FROM produk WHERE status_produk="aktif" AND id_kategori=1';
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 col-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"> <i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
											<div class="tombol">
												<i class="fa-solid fa-inbox"></i>
												<a href="?pilih=<?php echo $row['id_produk']; ?>&jumlah=1"><button onclick="pilih()" style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button></a>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-minuman" role="tabpanel" aria-labelledby="v-pills-minuman-tab">
								<div class="row">
									<?php
									$query = 'SELECT * FROM produk WHERE status_produk="aktif" AND id_kategori=2';
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 col-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr>
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
											<div class="tombol">
												<i class="fa-solid fa-inbox"></i>
												<a href="?pilih=<?php echo $row['id_produk']; ?>&jumlah=1"><button style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button></a>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-roti" role="tabpanel" aria-labelledby="v-pills-roti-tab">
								<div class="row">
									<?php
									$query = 'SELECT * FROM produk WHERE status_produk="aktif" AND id_kategori=3';
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 col-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr>
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
											<div class="tombol">
												<i class="fa-solid fa-inbox"></i>
												<a href="?pilih=<?php echo $row['id_produk']; ?>&jumlah=1"><button style="width:70px; height:auto;" type="button" class="btn btn-warning">Pilih</button></a>
											</div>

										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<aside class="col-5" id="myElement">
				<?php
				if (isset($_GET['pilih']) && is_numeric($_GET['pilih']) && isset($_GET['jumlah']) && is_numeric($_GET['jumlah'])) {
					if (isset($_SESSION['chart'][$_GET['pilih']])) {
						$_SESSION['chart'][$_GET['pilih']] = $_SESSION['chart'][$_GET['pilih']] + $_GET['jumlah'];
					} else {
						$_SESSION['chart'][$_GET['pilih']] = $_GET['jumlah'];
					}
				} elseif (isset($_GET['tambah']) && is_numeric($_GET['tambah'])) {
					if (isset($_SESSION['chart'][$_GET['tambah']]) && $_SESSION['chart'][$_GET['tambah']] > 0) {
						$_SESSION['chart'][$_GET['tambah']]++;
					}
				} elseif (isset($_GET['kurangi']) && is_numeric($_GET['kurangi'])) {
					if (isset($_SESSION['chart'][$_GET['kurangi']])) {
						$_SESSION['chart'][$_GET['kurangi']]--;
						if ($_SESSION['chart'][$_GET['kurangi']] <= 0) {
							unset($_SESSION['chart'][$_GET['kurangi']]);
						}
					}
				} elseif (isset($_GET['hapus']) && is_numeric($_GET['hapus'])) {
					if (isset($_SESSION['chart'][$_GET['hapus']])) {
						unset($_SESSION['chart'][$_GET['hapus']]);
					}
				} elseif (isset($_GET['hapusall']) && $_GET['hapusall'] == 'ya') {
					unset($_SESSION['chart']);
				}

				if (isset($_SESSION['chart']) && count($_SESSION['chart']) > 0) {


					echo '
<h3>Daftar Pesanan</h3>
<table class="table">
<thead>
<tr>
<th>Nama Produk</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>';
					$jumlah = 0;
					foreach ($_SESSION['chart'] as $id => $value) {
						$query = "SELECT * FROM produk WHERE status_produk='aktif' AND id_produk = $id";
						$result_set = $koneksi->query($query);
						while ($row = $result_set->fetch_assoc()) {
							echo '<tr><td>' . $row['nama_produk'] . '</td>
    <td>' . $value . '</td>
    <td class="text-right">Rp. ' . number_format($row['harga_produk'] * $value, 0, ',', '.') . '</td>
    <td>
	<a href="?tambah=' . $id . '" title="Tambah"><i class="fa-solid fa-circle-plus fa-xl"></i></a>
    <a href="?kurangi=' . $id . '" title="Kurangi"><i class="fa-solid fa-circle-minus fa-xl"></i></a>
    <a href="?hapus=' . $id . '" title="Hapus"><i class="fa-solid fa-circle-xmark fa-xl"></i></a>
    </td>
    </tr>';
							$jumlah = $jumlah + ($row['harga_produk'] * $value);
						}
					}
					echo '
    <tr><td colspan = "2" class="text-right"><b>Total Harga</b></td>
    <td class="text-right">Rp. ' . number_format($jumlah, 0, ',', '.') . '</td>
<td></td>

    </tr>
    </tbody>
    </table>
	<a href="?hapusall=ya"><button type="button" style="height:40px;width:auto;" class="btn btn-danger">Hapus Semua</button></a>
	';
				}
				?>
				<br><br><br>
				<p class="pilih" id="elemen"><em>*Pilih menu terlebih dahulu sebelum mengisi formulir pemesanan</em></p>

				<h2>Formulir Pemesanan</h2>
				<form action="checkout.php" method="post">
					<div class="wrapper">
						<input type="text" name="nama" id="" required placeholder="Nama Anda">
						<input type="text" name="alamat" id="" required placeholder="Alamat Lengkap Anda">
						<input type="number" name="nomor" id="" required placeholder="No.Telepon" class="col-lg-12;" style="height:50px;width:100%;" min="0">
						<textarea name="catatan" id="" cols="30" rows="10" placeholder="Catatan (optional)" style="margin-top:3%"></textarea>
						<button name="kirim" class="btn btn-success" style="width:120px; height:35px; font-family:'Poppins';">Periksa</button>
						<a href="menu.php" class="btn btn-danger" style="width:100px; height:35px; font-family:'Poppins';">Batal</a>
					</div>
				</form>
			</aside>
		</div>
	</div>
</div>
</div>



<!-- form pesan -->





<!-- <center><button type="button" class="btn btn-warning" id="pesan" style="width:150px;font-family:magra;	">Pesan Sekarang</button></center> -->


<script>
	changeClassBasedOnScreenSize(); // Panggil fungsi setelah elemen "myElement" tersedia di DOM
	window.addEventListener("resize", changeClassBasedOnScreenSize);
</script>

<!-- footer -->
<?php include 'koneksi/footer.php' ?>

<script src="../js/nav.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<!-- ALL JS FILES -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/menu.js"></script>
<!-- ALL PLUGINS -->

</body>

</html>