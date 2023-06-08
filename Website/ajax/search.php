<?php include_once('../koneksi/koneksi.php');?>
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/responsive.css">
	<link rel="stylesheet" href="../css/navbar.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
		integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
		<link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">

  <div class="menu-box">
	<div class="container">
    <div class="row inner-menu-box">
<div class="col-9">
<div class="tab-content" id="v-pills-tabContent">

<div class="tab-pane fade show active" id="v-pills-semua" role="tabpanel" aria-labelledby="v-pills-semua-tab">
							<div class="row">
					
			                  <?php 
                              $keyword = $_GET["keyword"];
			                  $query = "SELECT * FROM produk WHERE status='aktif' AND nama_produk LIKE '%$keyword%'";
			                  $result_set = $koneksi->query($query);
			                  while ($row = $result_set->fetch_assoc()){
			                  ?>
			                  <div class="col-lg-4 col-md-6 special-grid drinks">
			                    <div class="gallery-single fix">
			                      <img src="../pictures/<?php echo $row['gambar_produk'];?>" class="img-fluid" alt="Image" />
			                      <div class="why-text">
			                        <h4><?php echo  $row['nama_produk'];?></h4>
			                        <p>Sed id magna vitae eros sagittis euismod.</p>
			                        <h5>Rp <?php echo number_format($row['harga_produk'],0,',','.');?></h5>
			                      </div>
			                    </div>
			                  </div>
			                  <?php } ?>
                
							</div>
							
						</div>
                              </div>
                              </div>
                              </div>
                              </div>
                              </div>

                              <!-- ALL JS FILES -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/menu.js"></script>
