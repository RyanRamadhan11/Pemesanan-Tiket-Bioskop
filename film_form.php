<?php
    //ciptakan object dari class Pegawai
    $obj_kategori = new Kategori();
    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_kategori = $obj_kategori->dataKategori();
	
	$sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mt-5">
				<div class="title">
					<h3>Input Data Film</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                  <li class="breadcrumb-item active">Data Film</li>
				  <li class="breadcrumb-item active">Input Data Film</li>
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
					<h3>Input<span class="alternate">Film</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/film_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Judul Film</label>
				<input type="text" class="form-control main" name="judul" id="judul" placeholder="Judul">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Tanggal Rilis</label>
				<input type="date" class="form-control main" name="tanggal_rilis" id="tanggal_rilis" placeholder="Tanggal Rilis">
			</div>
            <div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Sinopsis</label>
            	<textarea name="sinopsis" id="sinopsis" class="form-control main" rows="10" placeholder="Sinopsis"></textarea>
			</div>
			<div class="col-md-6 mt-5 ">
				<label class="form-label fw-bold">Cover</label>
				<input type="text" class="form-control main" name="cover" id="cover" placeholder="Cover">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Kategori ID</label>
                <div class="form-group">
                    <select class="form-control main" name="kategori_id">
                    <option selected>-- Pilih Kategori ID --</option>
                        <?php
                            foreach($data_kategori as $kat){
                        ?>
                        <option value="<?= $kat['id'] ?>"> <?= $kat['kategori'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
			<div class="col-12 text-center mt-4">
				<button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Simpan</button>
                <button type="submit" name="proses" value="batal" class="btn btn-danger btn-md">Batal</button>
			</div>
		</form>
	</div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>