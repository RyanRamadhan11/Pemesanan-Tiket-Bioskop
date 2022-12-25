<!-- Ryan Ramadhan || Fullstack web  -->

<?php

include_once '../koneksi.php';
include_once '../models/Film.php';

//step1 tangkap request form
$judul = $_POST['judul'];
$tanggal_rilis = $_POST['tanggal_rilis'];
$sinopsis = $_POST['sinopsis'];
$cover = $_POST['cover'];
$kategori_id = $_POST['kategori_id'];

//step2 simpan ke array
$data = [
    $judul, // ? 1
    $tanggal_rilis, // ? 2
    $sinopsis, // ? 3
    $cover, // ? 4
    $kategori_id // ? 5
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Film();

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
        header('location:../index.php?hal=film');
        break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=film');
?>

