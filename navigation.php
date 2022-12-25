<?php
$sesi = $_SESSION['USERS'];
?>

<!-- ======= Top Bar ======= -->
  <!-- ======= Header ======= -->
  <section id="topbar" class="d-flex align-items-center bg-secondary" style="border-radius: 0; padding: 30px 15px 15px 15px;">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
      <i class="bi bi-envelope d-flex align-items-center"><a href="RR_tiket@gmail.com">RR_tiket@gmail.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+62 8561 2233 456</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <header id="header" class="d-flex fixed-top align-items-center" style="padding: 15px 15px 30px 15px; ">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">RR_TiketBioskop</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php?hal=home" class="link">Home</a></li>
          <li><a href="index.php?hal=about" class="link">About</a></li>
          <li><a href="index.php?hal=blog" class="link">Blog</a></li>
          
          <li><a href="index.php?hal=kontak">Contact</a></li>

          <?php
            if(!isset($sesi)){ //---------jika belum/gagal login-----------
          ?>
          <li class="nav-item">
            <a class="nav-link" href="login_form.php">Login</a>
          </li>
          <?php
            }
            else{ //---------jika berhasil login-----------
          ?>
          <li class="dropdown"><a href="#"><span>Data Bioskop</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php
                if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
              ?>
              <li><a href="index.php?hal=user">Data Users</a></li>
              <?php } ?>
              <li><a href="index.php?hal=kategori">Data Kategori</a></li>
              <li><a href="index.php?hal=studio">Data Studio</a></li>
              <li><a href="index.php?hal=film">Data Film</a></li>
              <li><a href="index.php?hal=tiket">Data Tiket</a></li>
              <li><a href="index.php?hal=jadwal">Data Jadwal</a></li>
              <li><a href="index.php?hal=kursi">Data Kursi</a></li>
              <li><a href="index.php?hal=pemesanan">Data Pemesanan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" data-toggle="dropdown"><?= $sesi['fullname'] ?> 
              <i class="bi bi-chevron-down"></i>
            </a>
              <!-- Dropdown list -->
            <ul class="dropdown-menu">
              <li><a href="index.php?hal=user_detail&id=<?= $sesi['id'] ?> ">Profile</a></li>
              <?php
               if($sesi['role'] != 'pembeli'){ //---------hanya untuk admin----------
              ?>
              <li><a class="dropdown-item" href="index.php?hal=user">Kelola User</a></li>
              <?php } ?>
              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <img src="assets/img/team/<?= $sesi['foto'] ?>" style="border-radius: 50%; margin-left: 10px; width: 50px; height: 50px; margin-top: 12px;">
            </img>
          </li>
          <?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->