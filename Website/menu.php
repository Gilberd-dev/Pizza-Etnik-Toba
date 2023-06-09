<?php include_once('koneksi/koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Menu</title>
	<link rel="icon" href="../Pictures/PET.png" type="image/jpg">

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


</head>

<!-- header -->
<?php include 'koneksi/header.php' ?>

<div id="pesansekarang">
	<!-- Start Menu -->
	<form action="" method="post">
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

				<div class="row inner-menu-box">
					<div class="col-3">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-semua-tab" data-toggle="pill" href="#v-pills-semua" role="tab" aria-controls="v-pills-semua" aria-selected="true">All</a>
							<a class="nav-link" id="v-pills-makanan-tab" data-toggle="pill" href="#v-pills-makanan" role="tab" aria-controls="v-pills-makanan" aria-selected="false">Makanan</a>
							<a class="nav-link" id="v-pills-minuman-tab" data-toggle="pill" href="#v-pills-minuman" role="tab" aria-controls="v-pills-minuman" aria-selected="false">Minuman</a>
							<a class="nav-link" id="v-pills-roti-tab" data-toggle="pill" href="#v-pills-roti" role="tab" aria-controls="v-pills-roti" aria-selected="false">Roti dan Kue</a>
						</div>
						<!-- Button trigger modal -->
						<button type="button" style="height:auto; width: auto; font-family: 'Poppins';" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
						<i class="fa-solid fa-circle-info"></i>Cara Pesan
						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Reem Kufi Fun', sans-serif;">Petunjuk Pemesanan</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<p>1. Tekan tombol <b>Pesan Sekarang</b></p>
										<p>2. Pilih produk yang ingin dipesan</p>
										<p>3. Isi formulir pemesanan dengan data asli</p>
										<p>4. Tekan tombol <b>Periksa</b> untuk memeriksa pesanan</p>
										<p>5. Pastikan <b>Daftar Pesanan</b> dan <b>Informasi Pembeli</b> sudah sesuai</p>
										<p>6. Tekan tombol kirim, maka pesanan anda akan dilanjutkan di aplikasi WhatsApp</p>

									</div>
									<div class="modal-footer">
										<button type="button" style="height:40px; width: auto;" class="btn btn-primary" data-bs-dismiss="modal">Mengerti</button>
									</div>
								</div>
							</div>
						</div>

					</div>

					<div class="col-9">
						<p class="pc"><em>*Arahkan kursor ke gambar produk untuk melihat detail produk</em></p>
						<p class="hp"><em>*Ketuk gambar produk untuk melihat detail produk</em></p>

						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-semua" role="tabpanel" aria-labelledby="v-pills-semua-tab">
								<div class="row">
									<?php
									$jumlahDataPerHalaman = 8;
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
										<div class="col-lg-3 col-md-6 special-grid drinks">
											<div class="gallery-single fix" style="width: 200px;">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" style="height: 300px;" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
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
							<div class="tab-pane fade" id="v-pills-makanan" role="tabpanel" aria-labelledby="v-pills-makanan-tab">
								<div class="row">
									<?php
									$query = 'SELECT * FROM produk WHERE status_produk="aktif" AND id_kategori=1';
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 special-grid drinks">
											<div class="gallery-single fix" style="width: 200px;">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" style="height: 300px;" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color: white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
											<!-- <p></p> -->
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
										<div class="col-lg-3 col-md-6 special-grid drinks">
											<div class="gallery-single fix" style="width: 200px;">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" style="height: 300px;" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
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
										<div class="col-lg-3 col-md-6 special-grid drinks">
											<div class="gallery-single fix" style="width: 200px;">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid"  style="height: 300px;"alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
												</div>
												<p class="nama"><i class="fa-solid fa-utensils" style="color: #272343; margin-right: 10px;"></i><?php echo  $row['nama_produk']; ?></p>
												<p class="harga"> <i class="fa-solid fa-money-bill-wave" style="color: #272343; margin-right:10px;"></i>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></p>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane fade" id="v-pills-pesan" role="tabpanel" aria-labelledby="v-pills-pesan-tab">
								<div class="row">
									<?php
									$query = 'SELECT * FROM produk WHERE status_produk="aktif"';
									$result_set = $koneksi->query($query);
									while ($row = $result_set->fetch_assoc()) {
									?>
										<div class="col-lg-3 col-md-6 special-grid drinks">
											<div class="gallery-single fix">
												<img src="../pictures/<?php echo $row['gambar_produk']; ?>" class="img-fluid" alt="Image" />
												<div class="why-text">
													<h4><?php echo  $row['nama_produk']; ?></h4>
													<hr style="color:white;">
													<p><?php echo  $row['deskripsi_produk']; ?></p>
													<h5>Rp <?php echo number_format($row['harga_produk'], 0, ',', '.'); ?></h5>
												</div>
											</div>
											<input type="checkbox" id="pizza-natinuknuk" name="pesanan[]" value="Pizza Natinuknuk">pesan
											<input type="number" id="jumlah-pizza-natinuknuk" name="jumlah_pizza_natinuknuk" value="0" min="0" max="500" style="width: 40px;">
										</div>
									<?php } ?>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Menu -->
	</form>
	<center>
		<a href="../Website/pemesanan.php" class="btn btn-warning" style="height:40px; width:200px; font-family:magra; margin-bottom:50px;">Pesan Sekarang</a>
	</center>
	<!-- <center><button type="button" class="btn btn-warning" id="pesan" style="width:150px;font-family:magra;	">Pesan Sekarang</button></center> -->
</div>



<!-- footer -->
<?php include 'koneksi/footer.php' ?>

<script src="../js/nav.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<!-- ALL JS FILES -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/menu.js"></script>
<!-- ALL PLUGINS -->

</body>

</html>