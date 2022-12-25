<?php
//ciptakan object dari class Pegawai
$model = new Users();
//panggil fungsi untuk menampilkan data pegawai
$data_user = $model->dataUsers(); 
//beri session untuk hak akses halaman member
$sesi = $_SESSION['USERS'];
if(isset($sesi) && $sesi['role'] != 'pembeli' ){
?>

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>Data Bioskop</li>
          <li>Data User</li>
        </ol>
        <h2>Daftar Users</h2>

      </div>
    </section><!-- End Breadcrumbs -->

<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3 ">
                    <h2>DAFTAR <span class="alternate">USERS</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary btn-sm" href="index.php?hal=user_form" role="button"
                    title="Tambah User">
                    &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah User</label></i>&nbsp;
                </a>
                <br /><br />
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Fullname</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Email</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Role</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="p-3">
                        <?php
                        $no = 1;
                        foreach($data_user as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['fullname'] ?></td>
                            <td><?= $row['jenis_kelamin'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['role'] ?></td>
                            <td><img src="assets/img/team/<?= $row['foto'] ?>" style="width: 50px; height: 50px;"></td>
                            <td>
                                <form action="controllers/user_controller.php" method="POST">
                                    <a href="index.php?hal=user_detail&id=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail User">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </a>
                                    <?php
                                    if($sesi['role'] != 'staff'){
                                    ?>
                                    <a href="index.php?hal=user_form_update&idedit=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-warning btn-sm" title="Ubah User">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus User">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                    <!-- hidden field untuk klausa where id=? -->
                                    <input type="hidden" name="idx" value="<?= $row['id'] ?>">
                                    <?php } ?>
                                </form>
                            </td>
                        </tr>
                        <?php
                        $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php 
}
else{
    echo '<script>alert("Anda dilarang akses halaman ini !!!");history.back();</script>';
}
?>