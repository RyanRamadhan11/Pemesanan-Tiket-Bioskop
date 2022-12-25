<?php

include_once '../koneksi.php';
include_once '../models/Tiket.php';

//step1 tangkap request form
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$kursi_id = $_POST['kursi_id'];
$film_id = $_POST['film_id'];

//step2 simpan ke array
$data = [
    $harga, // ? 1
    $stok, // ? 2
    $kursi_id, // ? 3
    $film_id // ? 4
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Tiket();

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
        header('location:../index.php?hal=tiket');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=tiket');
?>

