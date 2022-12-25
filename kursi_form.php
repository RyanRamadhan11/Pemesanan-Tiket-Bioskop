

<?php
    //ciptakan object dari class Pegawai
    $obj_kursi = new Kursi();

    $obj_studio = new Studio();
    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_kursi = $obj_kursi->dataKursi();
    $data_studio = $obj_studio->dataStudio();

	$sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Input Data Kursi</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
					<li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
					<li class="breadcrumb-item active">Kursi</li>
					<li class="breadcrumb-item active">Input Data Kursi</li>
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
					<h3>Input <span class="alternate">Data Kursi</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/kursi_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Studio Id</label>
                <div class="form-group">
                    <select class="form-control main" name="studio_id">
                    <option selected>-- Pilih Studio ID --</option>
                        <?php
                            foreach($data_studio as $studio){
                        ?>
                        <option value="<?= $studio['id'] ?>"> <?= $studio['nama'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
			</div>
            <div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Nomor Kursi</label>
				<input type="text" class="form-control main" name="nomor" id="nomor" placeholder="Nomor">
			</div>
			<div class="col-12 text-center mt-4">
				<button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Simpan</button>
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