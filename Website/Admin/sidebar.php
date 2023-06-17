<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="index.php">
                <i class="bi bi-grid"></i>
                <span>Beranda</span>
            </a>
        </li><!-- End Dashboard Nav -->


        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>Profil</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="promosi.php">
                <i class="bi bi-columns-gap"></i>
                <span>Promosi</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="kategori.php">
            <i class="bi bi-intersect"></i>
                <span>Kategori</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="menu.php">
                <i class="ri ri-cake-3-line"></i>
                <span>Menu</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="petunjuk.php">
            <i class="bi bi-sign-turn-slight-right-fill"></i>
                <span>Petunjuk Pesanan</span>
            </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="prestasi.php">
                <i class="bi bi-stars"></i>
                <span>Prestasi</span>
            </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="sertifikat.php">
                <i class="bi bi-card-heading"></i>
                <span>Sertifikat</span>
            </a>
        </li><!-- End Sertifikat Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="masukan.php">
                <i class="bi bi-chat-square-text"></i>
                <span>Masukan</span>
            </a>
        </li><!-- End Masukan Page Nav -->



</aside><!-- End Sidebar-->
<script>
const navLinks = document.querySelectorAll('.nav-link');

navLinks.forEach(link => {
  link.addEventListener('click', function() {
    navLinks.forEach(link => {
      link.classList.add('collapsed');
    });
    this.classList.remove('collapsed');
  });
});
</script>