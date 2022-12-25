<?php
//ciptakan object dari class Pegawai
$model = new Jadwal();
//panggil fungsi untuk menampilkan data pegawai
$data_jadwal = $model->dataJadwal(); 
//beri session untuk hak akses halaman member
$sesi = $_SESSION['USERS'];
if(isset($sesi)){
?>

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>Data Bioskop</li>
          <li>Data Jadwal</li>
        </ol>
        <h2>Daftar Jadwal Film</h2>

      </div>
    </section><!-- End Breadcrumbs -->

<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3 ">
                    <h2>DAFTAR <span class="alternate">Jadwal Film</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                    if($sesi['role'] != 'pembeli'){
                ?>
                    <a class="btn btn-primary btn-sm" href="index.php?hal=jadwal_form" role="button"
                        title="Tambah User">
                        &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Jadwal</label></i>&nbsp;
                    </a>
                    <?php } ?>
                <br /><br />
                <table class="table table-striped">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Jam</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Film</th>
                            <th scope="col">Studio</th>
                            <th scope="col">Cover</th>
                            <?php
                                if($sesi['role'] != 'pembeli'){
                            ?>
                            <th scope="col">Aksi</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody class="p-3">
                        <?php
                        $no = 1;
                        foreach($data_jadwal as $row){
                        ?>
                        <tr>
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['waktu'] ?></td>
                            <td><?= $row['tanggal'] ?></td>
                            <td><?= $row['judul_film'] ?></td>
                            <td><?= $row['nama_studio'] ?></td>
                            <td><img src="assets/img/card/<?= $row['foto'] ?>" style="width: 100px; height: 100px;"></td>
                            <td>
                                <form action="controllers/jadwal_controller.php" method="POST">
                                    <?php
                                    if($sesi['role'] != 'pembeli'){
                                    ?>
                                    <a href="index.php?hal=jadwal_form_update&idedit=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Jadwal">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Jadwal">
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