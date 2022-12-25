<?php
//ciptakan object dari class Pegawai
$model = new Users();
//panggil fungsi untuk menampilkan data pegawai
$data_users = $model->dataUsers(); 
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>About Us</li>
        </ol>
        <h2>About Us</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>Sistem Pemesanan Tiket Bioskop</h3>
            <p>Karawang, Jawa Barat</p>
            <p class="fst-italic">
              Aplikasi ini menyediakan beberapa informasi mengenai film terbaru dan sebagainya.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Terdapat beberapa pilihan film terbaru</li>
              <li><i class="bi bi-check-circle"></i> Pemesanan tiket lebih mudah</li>
              <li><i class="bi bi-check-circle"></i> Terdapat berbagai studio dan tiket dengan harga terjangkau</li>
            </ul>
            <p>
            Nikmati film dan hiburan terbaik, tetap terbaru dengan berita terbaru, dan dapatkan penawaran dan promo menarik!
            Pilihan film online terbaru dan seru buat kamu!, terdapat promo promo menarik juga lohhh,,, 
            </p>
            <p>yukk tunggu apalagi pesan tiket mu sekarang !!</p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row no-gutters">

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>User</strong> Bioskop</p>
              <a href="index.php?hal=user">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Studio</strong> Bioskop</p>
              <a href="index.php?hal=studio">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-headset"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Kategori</strong> Film Bioskop</p>
              <a href="index.php?hal=kategori">Find out more &raquo;</a>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1" class="purecounter"></span>
              <p><strong>Film</strong>Bioskop</p>
              <a href="index.php?hal=film">Find out more &raquo;</a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container">

        <div class="section-title">
          <h2>Our Clients</h2>
        </div>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/cinema.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/cinepolis.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/gotix.jpg" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="section-title">
          <h2>Testimonials</h2>
        </div>

        <div class="row">
          <?php
          foreach($data_users as $row){
          ?>
          <div class="col-lg-6">
            <div class="testimonial-item">
              <img src="assets/img/team/<?= $row['foto'] ?>" class="testimonial-img" alt="">
              <h3><?= $row['fullname'] ?></h4>
              <h6><?= $row['email'] ?></h6>
              <h6><?= $row['role'] ?></h6>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Luar Biasa Sangat Bermanfaat
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>
          <?php
          }
          ?>
        </div>

      </div>
    </section><!-- End Testimonials Section -->