<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukan</title>
    <link rel="stylesheet" href="../css/feedback3.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="icon" href="../Pictures/PET.png" type="image/jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <style>
        input[type=text]{
  font-family: 'Poppins';
}

input[type=email]{
  font-family: 'Poppins';
}

textarea{
  font-family: 'Poppins';
  text-indent: 0.5em;
}
    </style>
</head>

<body>
    <!-- header -->
    <?php include 'koneksi/header.php' ?>

    <main>
        <div id="form_masukan">
            <br><br><br>

            <button type="button" class="btn btn-warning" id="tulis_masukan" style="  position: relative;
  left: 76.5%;">Tulis Masukan</button>

        </div>
        <center>
            <h1 style="font-family: 'Reem Kufi Fun', sans-serif;">Apa Pendapat Pelanggan?</h1>
        </center>

        <!-- feedback  -->
        <?php
        include_once('koneksi/koneksi.php');
        // untuk client interface
        $query = "SELECT * FROM masukan WHERE status_masukan = 'Diizinkan'";
        $result_set = $koneksi->query($query);
        while ($row = $result_set->fetch_assoc()) {
        ?>
            <div class="card mb-3" style="max-width: 70%;">
                <div class="row no-gutters">
                    <div class="col-md-2">
                        <?php
                        $media_type = mime_content_type('../pictures/' . $row['gambar_video_masukan']);
                        if (strpos($media_type, 'image') !== false) {
                        ?>
                            <img src="../pictures/<?php echo $row['gambar_video_masukan'] ?>" class="card-img" alt="...">
                        <?php
                        } else if (strpos($media_type, 'video') !== false) {
                        ?>
                            <video controls class="card-img">
                                <source src="../pictures/<?php echo $row['gambar_video_masukan'] ?>" type="video/mp4">
                            </video>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['nama_pengunjung'] ?></h5>
                            <p class="card-text"><?php echo  $row['teks_masukan'] ?></p>
                            <p class="card-text"><small class="text-muted"><?php echo $row['tanggal_post_masukan'] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
    </main>

    <!-- footer -->
    <?php include 'koneksi/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="../js/feedback.js"></script>
    <script>
        var btnMasukan = document.getElementById("tulis_masukan");
        var masukan = document.getElementById("form_masukan");
        btnMasukan.addEventListener("click", function() {
            // alert('Anda sedang memesan sekarang!');
            var xhr = new XMLHttpRequest();

            // Cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    masukan.innerHTML = xhr.responseText;
                }
            };

            // eksekusi ajax
            xhr.open("GET", "ajax/form_masukan.php", true);
            xhr.send();
        });
    </script>
</body>


</html>