<?php

include_once '../koneksi.php';
include_once '../models/Kursi.php';

//step1 tangkap request form
$studio_id = $_POST['studio_id'];
$nomor = $_POST['nomor'];

//step2 simpan ke array
$data = [
    $studio_id, // ? 1
    $nomor,
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Kursi();

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
        header('location:../index.php?hal=kursi');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=kursi');
?>
