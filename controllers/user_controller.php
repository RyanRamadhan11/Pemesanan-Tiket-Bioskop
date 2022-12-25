<?php

include_once '../koneksi.php';
include_once '../models/Users.php';

//step1 tangkap request form
$nama = $_POST['fullname'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$no_hp = $_POST['no_hp'];
$role = $_POST['role'];
$foto = $_POST['foto'];

//step2 simpan ke array
$data = [
    $nama, // ? 1
    $jenis_kelamin, // ? 2
    $email, // ? 3
    $username, // ? 4
    $password, // ? 5
    $no_hp, // ? 6
    $role, // ? 7
    $foto, // ? 8
];

//step3 eksekusi tombol dengan mekanisme pdo
$model = new Users();

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
            header('location:../index.php?hal=user');
            break;
}

//step4 diarahkan ke suatu halaman, jika sudah selesai prosesnya 4.landing page
header('location:../index.php?hal=user');
?>

