<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class Pegawai
$model = new Film();
//panggil fungsi untuk menampilkan data pegawai
$film = $model->getFilm($id); 

$sesi = $_SESSION['USERS'];
	if(isset($sesi) ){
?>

<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
        <ol>
            <li><a href="index.html">Home</a></li>
            <li>Data Bioskop</li>
            <li>Data Film</li>
        </ol>
        <h2>Film Details</h2>
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
                <div class="member1">
                <img src="assets/img/card/<?= $film['cover'] ?>" alt="">
                <h4><?= $film['judul'] ?></h4>
                <span><?= $film['tanggal_rilis'] ?></span>
                <p>
                    <?= $film['sinopsis'] ?>
                </p>
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
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>