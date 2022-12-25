<?php
/* Connect to a MySQL database using driver invocation */
$dsn = 'mysql:dbname=dbpemesanan_tiket_bioskop;host=localhost';
$user = 'root';
$password = '';

try{    
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'Sukses Koneksi database';
}catch (PDOException $e){
    echo 'Terjadi kesalahan saat koneksi/query dgn sebab '.$e->getMessage();
}

?>