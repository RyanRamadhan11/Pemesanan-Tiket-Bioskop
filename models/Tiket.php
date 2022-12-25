<?php
class Tiket{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct(){
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataTiket(){
        $sql = "SELECT t.*, k.nomor AS nomor_kursi, f.judul AS judul_film
                FROM tiket t 
                INNER JOIN kursi k ON k.id = t.kursi_id
                INNER JOIN film f ON f.id = t.film_id
                ORDER BY t.id DESC";
        //$data_pegawai = $dbh->query($sql);
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll(); 
        return $rs;   
    }

    public function getTiket($id){
        $sql = "SELECT * FROM tiket
                WHERE id = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch(); 
        return $rs;   
    }

    public function simpan($data){
        $sql = "INSERT INTO tiket (harga, stok, kursi_id, film_id) VALUES (?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function ubah($data){
        $sql = "UPDATE tiket SET harga=?, stok=?, kursi_id=?, film_id=?
                WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);  
    }

    public function hapus($id){
        $sql = "DELETE FROM tiket WHERE id=?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);  
    }

}