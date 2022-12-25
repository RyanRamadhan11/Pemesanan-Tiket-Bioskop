<?php
//ciptakan object dari class Pegawai
$model = new Studio();
//panggil fungsi untuk menampilkan data pegawai
$data_studio = $model->dataStudio(); 

$sesi = $_SESSION['USERS'];
if(isset($sesi) ){
?>


    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <ol>
            <li><a href="index.php?hal=home">Home</a></li>
            <li>Data Bioskop</li>
            <li>Data Studio</li>
            </ol>
            <h2>Daftar Studio</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="section schedule">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title mt-3 ">
                        <h2>DAFTAR <span class="alternate">Studio</span></h2>
                    </div>
                </div>
            </div>

            <div class="icontambah mb-5" style="margin-left: 50px;">
                <?php
                    if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
                ?>
                    <a class="btn btn-primary btn-sm" href="index.php?hal=studio_form" role="button"
                        title="Tambah Film">
                        &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Studio</label> </i>&nbsp;
                    </a>
                <?php } ?>
            </div>
            <!-- ======= Counts Section ======= -->
            <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <?php
                foreach($data_studio as $row){
                ?>
                <div class="col-lg-6">
                    <div class="testimonial-it" style="padding-bottom: 100px; margin-top: 40px;">
                        <img src="assets/img/studio/<?= $row['foto'] ?>" class="testi" alt="">
                        <h3>Studio : <?= $row['nama'] ?></h3>
                        <form action="controllers/studio_controller.php" method="POST">
                            <?php
                                if($sesi['role'] != 'pembeli'){
                            ?>
                            <a href="index.php?hal=studio_form_update&idedit=<?= $row['id'] ?>">
                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Studio">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </button>
                            </a>
                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Studio">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            <!-- hidden field untuk klausa where id=? -->
                            <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                            <?php } ?>
                        </form>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
        </section><!-- End Testimonials Section -->
        </div>
    </section>
    <?php 
    }
    else{
        echo '<script>alert("Anda Harus Login Dahulu!!!");history.back();</script>';
    }
    ?>