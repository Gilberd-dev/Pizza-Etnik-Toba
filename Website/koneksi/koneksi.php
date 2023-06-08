<?php
$servername = "127.0.0.1:3307";
$username = "root";
$password = "";
$dbname = "bake";

$koneksi = new mysqli($servername, $username, $password, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi Gagal: " . $koneksi->connect_error);
}
?>
