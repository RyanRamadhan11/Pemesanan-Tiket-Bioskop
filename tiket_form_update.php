<?php
    //ciptakan object dari class Pegawai
    $obj_tiket = new Tiket();
    $obj_film = new Film();
    $obj_kursi = new Kursi();
    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_tiket = $obj_tiket->dataTiket();
    $data_film = $obj_film->dataFilm();
    $data_kursi = $obj_kursi->dataKursi();

    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $idedit = $_REQUEST['idedit'];
    $tiket = !empty($idedit) ? $obj_tiket->getTiket($idedit) : array() ;

    $sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title mt-5">
					<h3>Update Data Tiket</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                  <li class="breadcrumb-item active">Data Bioskop</li>
                  <li class="breadcrumb-item active">Data Tiket</li>
				  <li class="breadcrumb-item active">Update Data Tiket</li>
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
					<h3>Update <span class="alternate">Data Tiket</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/tiket_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Harga</label>
				<input type="text" class="form-control main" name="harga" id="harga" placeholder="Harga"
                value="<?= $tiket['harga'] ?>">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Stok</label>
				<input type="text" class="form-control main" name="stok" id="stok" placeholder="Stok"
                value="<?= $tiket['stok'] ?>">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Kursi ID</label>
                <div class="form-group">
                    <select class="form-control main" name="kursi_id">
                    <option selected>-- Pilih Kursi ID --</option>
                        <?php
                            foreach($data_kursi as $kursi){
                            $kur = $tiket['kursi_id'] == $kursi['id'] ? 'selected' : '';
                        ?>
                            <option value="<?= $kursi['id'] ?>" <?= $kur ?>> <?= $kursi['nomor'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Film ID</label>
                <div class="form-group">
                    <select class="form-control main" name="film_id">
                    <option selected>-- Pilih Film ID --</option>
                        <?php
                            foreach($data_film as $film){
                            $fil = $tiket['film_id'] == $film['id'] ? 'selected' : '';
                        ?>
                        <option value="<?= $film['id'] ?>" <?= $fil ?>> <?= $film['judul'] ?> </option>
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
        echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
    }
?>