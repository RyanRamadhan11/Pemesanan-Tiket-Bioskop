<?php
    //ciptakan object dari class Pegawai

    $obj_user = new Users();
    //panggil fungsi untuk menampilkan data jabatan dan divisi

    //------------proses edit data------------
    //tangkap request idedit di url (setelah klik tombol edit/icon pencil)
    $idedit = $_REQUEST['idedit'];
    $user = !empty($idedit) ? $obj_user->getUsers($idedit) : array() ;
	
	$sesi = $_SESSION['USERS'];
	if(isset($sesi) ){
?>

<section class="page-title bg-title overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<div class="title">
					<h3>Update Data User</h3>
				</div>
				<ol class="breadcrumb justify-content-center p-0 m-0">
				  <li class="breadcrumb-item"><a href="index.php?hal=home">Home</a></li>
                  <li class="breadcrumb-item active">User</li>
				  <li class="breadcrumb-item active">Update User</li>
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
					<h3>Update<span class="alternate">User</span></h3>
				</div>
			</div>
		</div>
		<form action="controllers/user_controller.php" method="POST" class="row">
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Nama</label>
				<input type="text" class="form-control main" name="fullname" id="fullname" placeholder="Fullname" 
                value="<?= $user['fullname'] ?>">
			</div>

            <div class="col-md-6">
                <label class="form-label fw-bold"><b>Jenis Kelamin</b></label>
                <?php
                    $ar_jenisKelamin = ['L'=>'Laki-Laki', 'P'=>'Perempuan'];
                    foreach($ar_jenisKelamin as $k => $jk){
                        //proses edit gender
                        $cek = $user['jenis_kelamin'] == $k ? 'checked' : '';
                ?>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" value="<?= $k ?>" <?= $cek ?>>
                    <label class="form-check-label"><?= $jk ?></label>
                </div>
                <?php } ?>
            </div>

			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Email</label>
				<input type="text" class="form-control main" name="email" id="email" placeholder="Email"
                value="<?= $user['email'] ?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Username</label>
				<input type="text" class="form-control main" name="username" id="username" placeholder="Username"
                value="<?= $user['username'] ?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Password</label>
				<input type="text" class="form-control main" name="password" id="password" placeholder="Password"
                value="<?= $user['password'] ?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">No HP</label>
				<input type="text" class="form-control main" name="no_hp" id="no_hp" placeholder="No HP"
                value="<?= $user['no_hp'] ?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Role</label>
				<input type="text" class="form-control main" name="role" id="role" placeholder="Role"
                value="<?= $user['role'] ?>">
			</div>
			<div class="col-md-6 mt-5">
				<label class="form-label fw-bold">Foto</label>
				<input type="text" class="form-control main" name="foto" id="foto" placeholder="Foto"
                value="<?= $user['foto'] ?>">
			</div>
			<div class="col-12 text-center mt-4">
				<button type="submit" name="proses" value="ubah" class="btn btn-success btn-md m-3">Ubah</button>
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
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>