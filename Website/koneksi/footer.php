

<footer class="footer" style="background-image: url(../Pictures/pisa3.jpg);">
    <div class="container">
        <div class="row">
            <div class="footer-col col-lg-2">
                <a href="login.php"><img src="../pictures/PET.png" style="width: 180px;"></a>
            </div>
            <div class="footer-col col-lg-3">
                <h4>Find Us</h4>
                <ul>
                    <li><a href="https://web.facebook.com/pages/Pizza-Etnik-Toba/156817371650659"> <img src="../pictures/facebook.png" style="width: 20px;"> Pizza Etnik Toba</a></li>
                    <li><a href="https://www.instagram.com/pizzaetniktoba5/?igshid=YmMyMTA2M2Y%3D"> <img src="../pictures/instagram.png" style="width: 20px;"> Pizza Etnik Toba</a>
                    </li>
                    <?php 
                    include_once('koneksi.php');
                    $query = 'SELECT * FROM admin';
                    $result_set = $koneksi->query($query);
                    $row = $result_set->fetch_assoc();
                    $nomor_telepon = $row['nomor_telepon_admin'];

                    $phone_number = preg_replace("/[^0-9]/", "", $nomor_telepon); // menghapus karakter selain angka pada nomor telepon

                    $api_url = "https://api.whatsapp.com/send?phone=$phone_number&text=";

                    ?>
                    <li><a href="<?php echo $api_url?>"> <img src="../pictures/whatsapp.png" style="width:20px;"> +<?php echo $nomor_telepon?></a></li>
                </ul>
            </div>
            <div class="footer-col col-lg-3">
                <h4>Location</h4>
                <ul>
                    <li><a href="#"> <img src="../pictures/gps.png" style="width: 20px;"> Jalan Sisingamangaraja 186
                            22312
                            Balige </a></li>
                    <li><a href="#"> <img src="../Pictures/clock.png" style="width:20px;"> Jam Operasi : <br> <br>
                            Setiap
                            Hari <br> 08.00 AM - 22.00 PM</a></li>
                </ul>
            </div>

        </div>
    </div>

    <center>
        <p style="margin: 0; padding: 0;">Copyright © Pizza Etnik Toba Bakery 2023</p>
    </center>
</footer>