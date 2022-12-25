<?php
  //ciptakan object dari class Pegawai
  $model = new Film();
  //panggil fungsi untuk menampilkan data pegawai
  $data_film = $model->dataFilm(); 

  $sesi = $_SESSION['USERS'];

  //ciptakan object dari class Pegawai
  $model = new Users();

  //panggil fungsi untuk menampilkan data pegawai
  $data_user = $model->dataUsers(); 

  //beri session untuk hak akses halaman member
  $sesi = $_SESSION['USERS'];
  if(isset($sesi)){
?>

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>Data Bioskop</li>
          <li>Data Film</li>
        </ol>
        <h2>Daftar Film</h2>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Featured Section ======= -->
    <section id="featured" class="featured">
      <div class="icontambah mb-4" style="margin-left: 50px;">
            <?php
                if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
            ?>
                <a class="btn btn-primary btn-sm" href="index.php?hal=film_form" role="button"
                    title="Tambah Film">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Film</label> </i>&nbsp;
                </a>
            <?php } ?>
            </div>
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
            <?php
              if($sesi['role'] == 'admin'){ //---------hanya untuk admin----------
            ?>
            <div style="width: 10%;" class="form">
              <form action="film_controller.php" method="POST" class="icon">
                <a href="index.php?hal=film_detail&id=<?= $row['id'] ?>">
                  <button type="button" class="btn btn-info btn-sm mt-3" title="Detail Film" style="width: 60px; height: 60px;">
                    <i class="fa fa-info-circle pr-5 pt-3"></i>
                  </button>
                </a>
                <a href="index.php?hal=film_form_update&idedit=<?= $row['id'] ?>">
                  <button type="button" class="btn btn-warning btn-sm mt-3" title="Ubah Film" style="width: 60px; height: 60px;">
                    <i class="fa fa-pencil-square-o mt-4 mr-2 fa-lg"></i>
                  </button>
                </a>
                <button type="submit" class="btn btn-danger btn-sm mt-3" name="proses" value="hapus"
                  onclick="return confirm('Anda Yakin Data Akan di Hapus?')" title="Hapus Film" style="width: 60px; height: 60px;">
                  <i class="fa fa-trash-o mt-3 mr-2"></i>
                </button>
                <input type="hidden" name="idx" value="<?= $row['id'] ?>">
              </form>
            </div>
            <?php } ?>
          </div>
        <?php
          }
        ?>
      </div>
    </section><!-- End Featured Section -->
    <?php 
    }
    else{
      echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
    }
    ?>