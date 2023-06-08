<?php
session_start();

include_once('koneksi/koneksi.php');
include 'koneksi/header.php';
if (!isset($_SESSION['chart']) || empty($_SESSION['chart'])) {
    // Tambahkan pesan umpan balik di sini
    $error_message = "Anda belum memilih produk.";
    // Redirect ke halaman pemesanan.php dengan menyertakan parameter error
    header('Location: pemesanan.php?error=' . urlencode($error_message));
    exit; // Pastikan kode berhenti di sini setelah melakukan redirect
}
if (isset($_POST['page']) && $_POST['page'] == 'preview') {
    $pesan = 'Halo Pizza Etnik Toba Bakery

    Data diri saya: 
    Nama: *' . $_POST['nama'] . '*
    Alamat Pengiriman: *' . $_POST['alamat'] . '*
    Menu yang dipesan:
    [daftarbelanja]';
    if ($_POST['catatan'] != '') {
        $pesan .= '

    NOTES: *' . $_POST['catatan'] . '*

    Terimakasih';
    } else {
        $pesan .= '

    Terimakasih';
    }
    $belanja = '';
    foreach ($_SESSION['chart'] as $id => $value) {
        $query = "SELECT * FROM produk WHERE status_produk='aktif' AND id_produk = $id";
        $result_set = $koneksi->query($query);
        while ($row = $result_set->fetch_assoc()) {
            $belanja .= '
           *-' . $row['nama_produk'] . ' : ' . $value . '*';
        }
    }
    $pesan = str_replace('[daftarbelanja]', $belanja, $pesan);
    unset($_SESSION['chart']);
    $query = 'SELECT * FROM admin';
    $result_set = $koneksi->query($query);
    $row = $result_set->fetch_assoc();
    $nomor_telepon =  $row['nomor_telepon_admin'];
    $url = 'https://wa.me/' . $nomor_telepon . '?text=' . rawurlencode($pesan);
    header('location:' . $url);
}

?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="../css/style2.css">
<link rel="stylesheet" href="../css/responsive.css">
<link rel="stylesheet" href="../css/navbar.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://fonts.googleapis.com/css2?family=Magra&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Delius+Unicase&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Reem+Kufi+Fun:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


<div class="container" style="margin-top:70px">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-title text-center">
                <h1 style="font-family: 'Reem Kufi Fun', sans-serif;">Periksa Pesanan</h>
            </div>
        </div>
    </div>
</div>
<br><br><br>
<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <?php
            if (isset($_SESSION['chart']) && count($_SESSION['chart']) > 0) {

                echo '   

<h3>Daftar Pesanan</h3>

<table class="table">
<thead>
<tr>
<th>Nama Produk</th>
<th>Jumlah</th>
<th>Harga</th>
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
    </tr>';
                        $jumlah = $jumlah + ($row['harga_produk'] * $value);
                    }
                }
                echo '
    <tr><td colspan = "2" class="text-right"><b>Total Harga</b></td>
    <td class="text-right">Rp. ' . number_format($jumlah, 0, ',', '.') . '</td>
    </tr>
    </tbody>
    </table>
    </div>';
            }

            echo '
<div class="col-lg-5">
<h3>Informasi Pembeli</h3>

<table class="table">
<tr><td>Nama</td><td>' . $_POST['nama'] . '</td></tr>
<tr><td>Alamat</td><td>' . $_POST['alamat'] . '</td></tr>
<tr><td>Nomor Telepon</td><td>' . $_POST['nomor'] . '</td></tr>
<tr><td>Catatan</td><td>' . $_POST['catatan'] . '</td></tr>
</table
</div>
';
            ?>
        </div>

        <input type="hidden" name="pages" value="previews">
        <input type="hidden" name="nama" value="<?php echo $_POST['nama']; ?>">
        <input type="hidden" name="alamat" value="<?php echo $_POST['alamat']; ?>">
        <input type="hidden" name="nomor" value="<?php echo $_POST['nomor']; ?>">
        <input type="hidden" name="catatan" value="<?php echo $_POST['catatan']; ?>">
        <input type="hidden" name="page" value="preview">
        <div class="col-lg-12">
            <center>
                <button name="kirim">
                    <p>Kirim</p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
                        </path>
                    </svg>
                </button>
                <!-- <input style="font-family: 'Poppins';" type="submit" value="ORDER SEKARANG" class="btn btn-success"> -->
            </center>
        </div>
</form>



<?php include 'koneksi/footer.php' ?>
<!-- ALL JS FILES -->
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/menu.js"></script>