<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class Pegawai
$model = new Users();
//panggil fungsi untuk menampilkan data pegawai
$user = $model->getUsers($id); 

  $sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>User</li>
        </ol>
        <h2>Users Details</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">

        <div class="row">
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="membere">
              <img src="assets/img/team/bios.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-5 col-md-6 d-flex align-items-stretch">
            <div class="member">
              <img src="assets/img/team/<?= $user['foto'] ?>" alt="">
              <h4><?= $user['fullname'] ?></h4>
              <span><?= $user['email'] ?></span>
              <span><?= $user['role'] ?></span>
              <p>
                <?= $user['no_hp'] ?>
              </p>
              <div class="social">
                <a href=""><i class="bi bi-twitter"></i></a>
                <a href=""><i class="bi bi-facebook"></i></a>
                <a href=""><i class="bi bi-instagram"></i></a>
                <a href=""><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="membere">
              <img src="assets/img/team/bios.jpg" alt="">
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
  <?php 
  }
  else{
    echo '<script>alert("Anda dilarang akses halaman Ini !!!");history.back();</script>';
  }
  ?>