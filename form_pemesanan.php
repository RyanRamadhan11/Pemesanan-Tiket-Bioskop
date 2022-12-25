<?php
    //ciptakan object dari class Pegawai
    $obj_tiket = new Tiket();
    $obj_users = new Users();
    //panggil fungsi untuk menampilkan data jabatan dan divisi

    $data_tiket = $obj_tiket->dataTiket();
    $data_users = $obj_users->dataUsers();

    //beri session untuk hak akses halaman member
    $sesi = $_SESSION['USERS'];
    if(isset($sesi)){

?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title mt-5">
					<h3>Form Pemesanan Tiket</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Film</li>
                    <li class="breadcrumb-item active">Pesan Tiket</li>
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
					<h3>Form <span class="alternate">Pemesanan Tiket</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/pemesanan_controller.php" method="POST" class="row">
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Users ID</label>
                <div class="form-group">
                    <select class="form-control main" name="users_id">
                    <option selected>-- Pilih Users ID --</option>
                        <?php
                            foreach($data_users as $users){
                        ?>
                        <option value="<?= $users['id'] ?>"> <?= $users['username'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tiket ID & Harga</label>
                <div class="form-group">
                    <select class="form-control main" name="tiket_id">
                    <option selected>-- Pilih Tiket Id & Harga --</option>
                        <?php
                            foreach($data_tiket as $tiket){
                        ?>
                        <option value="<?= $tiket['id'] ?>"> Id : <?= $tiket['id'] ?> - <?= $tiket['harga'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Jumlah Tiket Beli</label>
				<input type="text" class="form-control main" name="jml_tiket" id="jml_tiket" placeholder="Jumlah Tiket">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Beli</label>
				<input type="date" class="form-control main" name="tgl" id="tgl" placeholder="Tanggal Beli">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Total Harga</label>
				<input type="text" class="form-control main" name="total_harga" id="total_harga" placeholder="Total Harga">
			</div>
			<div class="col-12 text-center mt-4">
				<button type="submit" name="proses" value="simpan" class="btn btn-success btn-md m-3">Pesan</button>
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