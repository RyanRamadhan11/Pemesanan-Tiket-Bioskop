

<?php
    //ciptakan object dari class Pegawai
    $obj_jadwal = new Jadwal();
    $obj_film = new Film();
    $obj_studio = new Studio();
    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_jadwal = $obj_jadwal->dataJadwal();
    $data_film = $obj_film->dataFilm();
    $data_studio = $obj_studio->dataStudio();

    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $idedit = $_REQUEST['idedit'];
    $jadwal = !empty($idedit) ? $obj_jadwal->getJadwal($idedit) : array() ;

	$sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Update Data Jadwal</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
					<li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
					<li class="breadcrumb-item active">Jadwal</li>
					<li class="breadcrumb-item active">Update Data Jadwal</li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="section contact-form">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h3>Update <span class="alternate">Data Jadwal</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/jadwal_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Jam Film</label>
				<input type="time" class="form-control main" name="waktu" id="waktu" placeholder="Waktu"
                value="<?= $jadwal['waktu']?>">
			</div>
            <div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Tanggal</label>
                <input type="date" class="form-control main" name="tanggal" id="tanggal" 
                placeholder="Tanggal" value="<?= $jadwal['tanggal']?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Film Id</label>
                <div class="form-group">
                    <select class="form-control main" name="film_id">
                    <option selected>-- Pilih Film ID --</option>
                        <?php
                            foreach($data_film as $film){
                            $jad = $jadwal['film_id'] == $film['id'] ? 'selected' : '';
                        ?>
                        <option value="<?= $film['id'] ?>" <?= $jad ?> > <?= $film['judul'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Studio Id</label>
                <div class="form-group">
                    <select class="form-control main" name="studio_id">
                    <option selected>-- Pilih Studio ID --</option>
                        <?php
                            foreach($data_studio as $studio){
                            $jad = $jadwal['studio_id'] == $studio['id'] ? 'selected' : '';
                        ?>
                        <option value="<?= $studio['id'] ?>" <?= $jad ?>> <?= $studio['nama'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
			</div>
			<div class="col-12 text-center mt-4">
                <button type="ubah" name="proses" value="ubah" class="btn btn-success btn-md m-3">Ubah</button>
                <!-- hidden field untuk klausa where id=? -->
                <input type="hidden" name="idx" value="<?= $idedit ?>">
                <button type="submit" name="proses" value="batal" class="btn btn-danger btn-md ">Batal</button>
			</div>
		</form>
	</div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda Dilarang Akses Halaman Ini !!!");history.back();</script>';
}
?>