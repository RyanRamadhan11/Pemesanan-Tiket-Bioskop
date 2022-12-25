<?php

include_once '../koneksi.php';
include_once '../models/Studio.php';

//step1 tangkap request form
$nama = $_POST['nama'];
$foto = $_POST['foto'];

//step2 simpan ke array
$data = [
    $nama, // ? 1
    $foto
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Studio();

$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data); 
        break;

    case 'ubah':
        $data[] = $_POST['idx']; 
        $model->ubah($data); 
        break;
        
    case 'hapus':
        unset($data);//hapus 9 ? di atas
        //panggil method hapus data disertai tangkap hidden filed idx untuk klausa where id
        $model->hapus($_POST['idx']); 
        break;
    
    default:
        header('location:../index.php?hal=studio');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=studio');
?>

