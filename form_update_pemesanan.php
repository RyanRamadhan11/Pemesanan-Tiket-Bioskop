<?php
    //ciptakan object dari class Pegawai
    $obj_tiket = new Tiket();
    $obj_users = new Users();
    //panggil fungsi untuk menampilkan data jabatan dan divisi

    $data_tiket = $obj_tiket->dataTiket();
    $data_users = $obj_users->dataUsers();

    //ciptakan object dari class Pegawai
    $obj_pesan = new Detail_Pemesanan();

    //panggil fungsi untuk menampilkan data pegawai

    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $idedit = $_REQUEST['idedit'];
    $pesan = !empty($idedit) ? $obj_pesan->getPemesanan($idedit) : array() ;

    //beri session untuk hak akses halaman member
    $sesi = $_SESSION['USERS'];
    if(isset($sesi)){

?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title mt-5">
					<h3>Update Pemesanan Tiket</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Film</li>
                    <li class="breadcrumb-item active">Update Pesan Tiket</li>
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
					<h3>Update <span class="alternate">Pemesanan Tiket</span></h3>
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
                            $usr = $pesan['users_id'] == $users['id'] ? 'selected' : '';
                        ?>
                        <option value="<?= $users['id'] ?>" <?= $usr ?>> <?= $users['username'] ?> </option>
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
                            $usr = $pesan['tiket_id'] == $tiket['id'] ? 'selected' : '';
                        ?>
                        <option value="<?= $tiket['id'] ?>" <?= $usr ?>> Id : <?= $tiket['id'] ?> - Harga : <?= $tiket['harga'] ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Jumlah Tiket Beli</label>
				<input type="text" class="form-control main" name="jml_tiket" id="jml_tiket" 
                placeholder="Jumlah Tiket" value="<?= $pesan['jml_tiket'] ?>">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Tanggal Beli</label>
				<input type="date" class="form-control main" name="tgl" id="tgl" 
                placeholder="Tanggal Beli" value="<?= $pesan['tgl'] ?>">
			</div>
            <div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Total Harga</label>
				<input type="text" class="form-control main" name="total_harga" id="total_harga"
                placeholder="Total Harga" value="<?= $pesan['total_harga'] ?>">
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