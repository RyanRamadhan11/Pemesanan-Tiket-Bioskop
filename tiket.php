<?php
//ciptakan object dari class Pegawai
$model = new Tiket();
//panggil fungsi untuk menampilkan data pegawai
$data_tiket = $model->dataTiket(); 

//ciptakan object dari class Pegawai
$model = new Users();

//panggil fungsi untuk menampilkan data pegawai
$data_user = $model->dataUsers(); 

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
          <li>Data Tiket</li>
        </ol>
        <h2>Daftar Tiket</h2>

      </div>
    </section><!-- End Breadcrumbs -->


<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3 ">
                    <h2>DAFTAR <span class="alternate">TIKET</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php
                    if($sesi['role'] != 'pembeli'){ //--------- tidak untuk akses pembeli----------
                ?>
                    <a class="btn btn-primary btn-sm" href="index.php?hal=tiket_form" role="button"
                        title="Tambah Tiket">
                        &nbsp;<i class="fa fa-plus" aria-hidden="true"> <label class="p-2">Tambah Tiket</label> </i>&nbsp;
                    </a>
                <?php } ?>
                <br /><br />
                <table class="table table-primary">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Kursi_id</th>
                            <th scope="col">Film_id</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="p-4">
                        <?php
                        $no = 1;
                        foreach($data_tiket as $row){
                        ?>
                        <tr class="table-secondary">
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['harga'] ?></td>
                            <td><?= $row['stok'] ?></td>
                            <td><?= $row['nomor_kursi'] ?></td>
                            <td><?= $row['judul_film'] ?></td>
                            <td>
                                <form action="controllers/tiket_controller.php" method="POST">
                                    <?php
                                        if($sesi['role'] != 'pembeli'){
                                    ?>
                                    <a href="index.php?hal=tiket_form_update&idedit=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-warning btn-sm" title="Ubah Kategori">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus Kategori">
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
    echo '<script>alert("Anda Harus Login Dahulu !!!");history.back();</script>';
}
?>