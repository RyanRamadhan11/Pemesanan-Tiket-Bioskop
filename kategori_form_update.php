<?php
    //ciptakan object dari class Pegawai
    $obj_kategori = new Kategori();

    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $idedit = $_REQUEST['idedit'];
    $kategori = !empty($idedit) ? $obj_kategori->getKategori($idedit) : array() ;

	$sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>


<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title mt-5">
					<h3>Update Data Kategori</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
                    <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                    <li class="breadcrumb-item active">Data Bioskop</li>
                    <li class="breadcrumb-item active">Data Kategori</li>
                    <li class="breadcrumb-item active">Update Data Kategori</li>
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
					<h3>Update <span class="alternate">Data Kategori</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/kategori_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
                <label class="form-label fw-bold">Nama Kategori</label>
				<input type="text" class="form-control main" name="nama" id="nama" placeholder="Nama"
                value="<?= $kategori['kategori'] ?>">
			</div>
			<div class="col-12 text-center mt-4">
				<button type="ubah" name="proses" value="ubah" class="btn btn-success btn-md m-3">Ubah</button>
                <!-- hidden field untuk klausa where id=? -->
                <input type="hidden" name="idx" value="<?= $idedit ?>">
                <button type="submit" name="proses" value="batal" class="btn btn-danger btn-md">Batal</button>
			</div>
		</form>
	</div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda dilarang akses halaman ini !!!");history.back();</script>';
}
?>