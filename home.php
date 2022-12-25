<?php
//ciptakan object dari class Pegawai
$model = new Film();
//panggil fungsi untuk menampilkan data pegawai
$data_film = $model->dataFilm(); 
/*
foreach ($data_pegawai as $row) {
    print $row['nip'] . "\t";
    print $row['nama'] . "\t";
    print $row['alamat'] . "\n";
}
*/
?>
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" style="margin-top: -20px;">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">

          <!-- Slide 1 -->
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Welcome to <span>RR_TiketBioskop</span></h2>
                <p class="animate__animated animate__fadeInUp">Aplikasi Ticketing Bioskop Film terbaru dan terbaik pilihan kamu !</p>
                <a href="index.php?hal=about" class="btn-get-started animate__animated animate__fadeInUp">Read More About As</a>
              </div>
            </div>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-2.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated fanimate__adeInDown">Pesan Tiket <span> Sekarang</span></h2>
                <p class="animate__animated animate__fadeInUp">Nikmati film dan hiburan terbaik, tetap terbaru dengan berita terbaru, dan dapatkan penawaran dan promo menarik!</p>
                <a href="index.php?hal=form_pemesanan" class="btn-get-started animate__animated animate__fadeInUp">Pesan Tiket</a>
              </div>
            </div>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-item" style="background-image: url(assets/img/slide/slide-3.jpg)">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Lihat Update <span> Film</span></h2>
                <p class="animate__animated animate__fadeInUp">Pilihan film online terbaru dan seru buat kamu!, </p>
                <a href="index.php?hal=film" class="btn-get-started animate__animated animate__fadeInUp">Lihat Film</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="container">
        <?php
        foreach($data_film as $row){
        ?>
          <div class="icon-box text-center d-flex mt-4" >
            <div style="width: 30%;">
              <img style="width: 300px; height: 300px;" src="assets/img/card/<?= $row['cover'] ?>" alt="">
            </div>
            <div style="width: 70%;">
              <h2 class="mt-4"><?= $row['judul'] ?></h2>
              <p class="mb-3"><?= $row['tanggal_rilis'] ?></p>
              <p class=""><?= $row['sinopsis'] ?></p>
              <p class="p-4">Kepo kan yuk beli tiketnya sekarang !</p>
              <a href="index.php?hal=form_pemesanan" role="button" class="btn btn-success">Pesan Tiket</a>
            </div>
            
          </div>
        <?php
          }
        ?>
      </div>
    </section><!-- End Featured Section -->