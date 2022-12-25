

<?php

include_once '../koneksi.php';
include_once '../models/Detail_Pemesanan.php';

//step1 tangkap request form
$users_id = $_POST['users_id'];
$tiket_id = $_POST['tiket_id'];
$jml_tiket = $_POST['jml_tiket'];
$tgl = $_POST['tgl'];
$total_harga = $_POST['total_harga'];

//step2 simpan ke array
$data = [
    $users_id, // ? 1
    $tiket_id, // ? 2
    $jml_tiket, // ? 3
    $tgl, // ? 4
    $total_harga // ? 5
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Detail_Pemesanan();

$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data); 
        break;

    case 'ubah':
        //tangkap hidden field idx untuk klausa where id
        // ? 10 (klausa where id = ?)
        $data[] = $_POST['idx']; 
        $model->ubah($data); 
        break;

    case 'hapus':
        unset($data);//hapus 9 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); 
        break;
    
    default:
        header('location:../index.php?hal=pemesanan');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=pemesanan');
?>

