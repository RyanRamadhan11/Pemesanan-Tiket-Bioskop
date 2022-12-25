<!-- Ryan Ramadhan || Fullstack web  -->

<?php

include_once '../koneksi.php';
include_once '../models/Jadwal.php';

//step1 tangkap request form
$waktu = $_POST['waktu'];
$tanggal = $_POST['tanggal'];
$film_id = $_POST['film_id'];
$studio_id = $_POST['studio_id'];

//step2 simpan ke array
$data = [
    $waktu, // ? 1
    $tanggal, // ? 2
    $film_id, // ? 3
    $studio_id, // ? 4
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Jadwal();

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
        header('location:../index.php?hal=jadwal');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=jadwal');
?>

