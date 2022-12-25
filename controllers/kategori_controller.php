<?php

include_once '../koneksi.php';
include_once '../models/Kategori.php';

//step1 tangkap request form
$nama = $_POST['nama'];

//step2 simpan ke array
$data = [
    $nama // ? 1
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Kategori();

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
        header('location:../index.php?hal=kategori');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=kategori');
?>

