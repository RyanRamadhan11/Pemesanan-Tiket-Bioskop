<?php
//ciptakan object dari class Pegawai
$model = new Detail_Pemesanan();
//panggil fungsi untuk menampilkan data pegawai
$data_pemesanan = $model->dataPemesanan(); 

$sesi = $_SESSION['USERS'];
if(isset($sesi) ){
?>

 <!-- ======= Breadcrumbs ======= -->
 <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.php?hal=home">Home</a></li>
          <li>Data Bioskop</li>
          <li>Data Detail_Pemesanan</li>
        </ol>
        <h2>Daftar Pemesanan</h2>

      </div>
    </section><!-- End Breadcrumbs -->


<section class="section schedule">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title mt-3 ">
                    <h2>DAFTAR <span class="alternate">PEMESANAN</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a class="btn btn-primary btn-sm" href="index.php?hal=form_pemesanan" role="button"
                    title="Tambah Tiket">
                    &nbsp;<i class="fa fa-plus " aria-hidden="true"><label class="p-2">Pesan Tiket</label></i>&nbsp;
                </a>
                <br /><br />
                <table class="table table-primary">
                    <thead>
                        <tr class="table-dark">
                            <th scope="col">No</th>
                            <th scope="col">ID Users</th>
                            <th scope="col">ID Tiket</th>
                            <th scope="col">Jumlah Tiket Beli</th>
                            <th scope="col">Tanggal Beli</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="p-4">
                        <?php
                        $no = 1;
                        foreach($data_pemesanan as $row){
                        ?>
                        <tr class="table-secondary">
                            <th scope="row"><?= $no ?></th>
                            <td><?= $row['users_id'] ?></td>
                            <td><?= $row['tiket_id'] ?></td>
                            <td><?= $row['jml_tiket'] ?></td>
                            <td><?= $row['tgl'] ?></td>
                            <td><?= $row['total_harga'] ?></td>
                            <td>
                                <form action="controllers/pemesanan_controller.php" method="POST">
                                    <?php
                                        if($sesi['role'] != 'pembeli'){
                                    ?>
                                    <a href="index.php?hal=form_update_pemesanan&idedit=<?= $row['id'] ?>">
                                        <button type="button" class="btn btn-warning btn-sm" title="Ubah pesanan">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus"
                                        onclick="return confirm('Anda Yakin Data akan diHapus?')" title="Hapus pesanan">
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
    echo '<script>alert("Anda Harus Login Dahulu!!!");history.back();</script>';
}
?>