<?php
    //ciptakan object dari class Pegawai
    $obj_kategori = new Kategori();

    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_kategori = $obj_kategori->dataKategori();

    $sesi = $_SESSION['USERS'];
      if(isset($sesi) ){
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>Data Bioskop</li>
          <li>Data Kategori</li>
        </ol>
        <h2>Daftar Kategori Film</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="icontambah mb-3">
        <?php
          if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
        ?>
          <a class="btn btn-primary btn-sm" href="index.php?hal=kategori_form" role="button"
            title="Tambah Film">
            &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Kategori</label> </i>&nbsp;
          </a>
        <?php } ?>
        </div>
          <table class="table table-striped">
            <thead>
              <tr class="table-dark">
                <th scope="col">No</th>
                <th scope="col">Fullname</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
          <tbody class="p-3">
            <?php
              $no = 1;
                foreach($data_kategori as $row){
            ?>
              <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $row['kategori'] ?></td>
                <td>
                  <form action="controllers/kategori_controller.php" method="POST">
                      <?php
                        if($sesi['role'] != 'pembeli'){
                        ?>
                        <a href="index.php?hal=kategori_form_update&idedit=<?= $row['id'] ?>">
                          <button type="button" class="btn btn-warning btn-sm" title="Ubah Kategori">
                              <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          </button>
                        </a>
                        <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                              onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Kategori">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                        <!-- hidden field untuk klausa where id=? -->
                        <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                        <?php } ?>
                    </form>
                  </td>
                </tr>
                <?php
                  $no++;
                  }
                ?>
          </tbody>
          </table>
      </div>
    </section><!-- End Portfolio Section -->

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

  </main><!-- End #main -->
  <?php 
  }
  else{
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
  }
  ?>