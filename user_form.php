

<?php
    //ciptakan object dari class Pegawai
    $obj_user = new Users();
    //panggil fungsi untuk menampilkan data jabatan dan divisi
    $data_user = $obj_user->dataUsers();

	$sesi = $_SESSION['USERS'];
	if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Input Data User</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
					<li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
					<li class="breadcrumb-item active">User</li>
					<li class="breadcrumb-item active">Input User</li>
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
					<h3>Input<span class="alternate">User</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/user_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Nama</label>
				<input type="text" class="form-control main" name="fullname" id="fullname" placeholder="Fullname">
			</div>
            <div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Jenis Kelamin</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="L">
                    <label class="form-check-label">
                        Laki-Laki
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="P">
                    <label class="form-check-label">
                        Perempuan
                    </label>
                </div>
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Email</label>
				<input type="text" class="form-control main" name="email" id="email" placeholder="Email">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Username</label>
				<input type="text" class="form-control main" name="username" id="username" placeholder="Username">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Password</label>
				<input type="text" class="form-control main" name="password" id="password" placeholder="Password">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">No HP</label>
				<input type="text" class="form-control main" name="no_hp" id="no_hp" placeholder="No HP">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Role</label>
				<input type="text" class="form-control main" name="role" id="role" placeholder="Role">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Foto</label>
				<input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto">
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
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>